<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisitController extends Controller
{
    // 📊 GET VISITS
    public function index()
    {
        $visits = Visit::where('user_id', Auth::id())->get();

        return response()->json(
            $visits->map(function ($visit) {
                return [
                    'id' => $visit->id,
                    'title' => $visit->status,
                    'start' => $visit->start_time,
                    'end' => $visit->end_time,
                    'color' => $visit->status === 'confirmed' ? 'green' : 'orange'
                ];
            })
        );
    }

    // ➕ CREATE VISIT
    public function store(Request $request)
    {
        $request->validate([
            'start_time' => 'required|date|after:now',
            'end_time'   => 'required|date|after:start_time',
        ]);

        $visit = Visit::create([
            'user_id' => Auth::id(),
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'status' => 'pending'
        ]);

        return response()->json($visit);
    }

    // 💳 SHOW PAYMENT PAGE
    public function paymentPage(Visit $visit)
    {
        $this->authorizeVisit($visit);

        return view('payment', compact('visit'));
    }

    // 💳 PROCESS FAKE PAYMENT
    public function processPayment(Request $request, Visit $visit)
    {
        $this->authorizeVisit($visit);

        // Fake validation
        $request->validate([
            'card_number' => 'required|min:16',
            'expiry' => 'required',
            'cvv' => 'required|min:3'
        ]);

        // ✅ Mark as confirmed
        $visit->update([
            'status' => 'confirmed'
        ]);

        return redirect('/calendar')->with('success', 'Payment successful!');
    }

    // ✏️ UPDATE
    public function update(Request $request, Visit $visit)
    {
        $this->authorizeVisit($visit);

        if ($visit->start_time < now()) {
            abort(403, 'Cannot modify past visits');
        }

        $visit->update($request->only(['start_time', 'end_time']));

        return response()->json($visit);
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