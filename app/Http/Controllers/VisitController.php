<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\Place;

class VisitController extends Controller
{
    // 📅 CALENDAR PAGE
    public function index(Request $request)
    {
        $places = Place::latest()->get();

        $selectedPlace = null;

        if ($request->has('place_id')) {
            $selectedPlace = Place::find($request->place_id);
        }

        return view('calendar', compact('places', 'selectedPlace'));
    }

    // 🔥 GET EVENTS FOR FULLCALENDAR (VERY IMPORTANT)
    public function getVisits()
    {
        $visits = Visit::where('user_id', Auth::id())->get();

        return response()->json(
            $visits->map(function ($visit) {
                return [
                    'id' => $visit->id,
                    'title' => $visit->status,
                    'start' => $visit->start_time,
                    'end' => $visit->end_time,
                    'color' => $visit->status === 'confirmed' ? 'green' : 'orange',
                ];
            })
        );
    }

    // ➕ CREATE VISIT
    public function store(Request $request)
    {
        $request->validate([
            'start_time' => 'required|date',
            'end_time'   => 'required|date|after:start_time',
            'place_id'   => 'required|exists:places,id',
        ]);

        $visit = Visit::create([
            'user_id' => Auth::id(),
            'place_id'   => $request->place_id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'status' => 'pending'
        ]);

        return response()->json($visit);
    }

    // 💳 STRIPE
    public function checkout(Visit $visit)
    {
        $this->authorizeVisit($visit);

        Stripe::setApiKey(config('services.stripe.secret'));

        $session = Session::create([
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Visit Booking',
                        'description' => 'Visit on ' . $visit->start_time,
                    ],
                    'unit_amount' => 2000,
                ],
                'quantity' => 1
            ]],
            'mode' => 'payment',

            'metadata' => [
                'visit_id' => $visit->id,
                'place_id' => $visit->place_id,
            ],

            'success_url' => route('payment.success', $visit->id),
            'cancel_url' => route('payment.cancel', $visit->id),
        ]);

        return redirect($session->url);
    }

    // ✅ SUCCESS
    public function success(Visit $visit)
    {
        $this->authorizeVisit($visit);

        $visit->update([
            'status' => 'confirmed'
        ]);

        return redirect('/calendar')->with('success', 'Payment successful!');
    }

    // ❌ CANCEL
    public function cancel(Visit $visit)
    {
        $this->authorizeVisit($visit);

        return redirect('/calendar')->with('error', 'Payment cancelled.');
    }

    // 🗑 DELETE
    public function destroy(Visit $visit)
    {
        $this->authorizeVisit($visit);

        $visit->delete();

        return response()->json(['message' => 'Deleted']);
    }

    // 🔒 SECURITY
    private function authorizeVisit($visit)
    {
        if ($visit->user_id !== Auth::id()) {
            abort(403);
        }
    }
}