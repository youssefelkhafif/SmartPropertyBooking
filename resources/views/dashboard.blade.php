@php
   $places = collect([
    (object)[
        'id' => 1,
        'name' => 'Modern Apartment',
        'description' => 'Beautiful modern apartment with city view.',
        'location' => 'Casablanca, Morocco',
        'image' => 'https://images.unsplash.com/photo-1507089947368-19c1da9775ae'
    ],
    (object)[
        'id' => 2,
        'name' => 'Luxury Villa',
        'description' => 'Spacious villa with private pool.',
        'location' => 'Marrakech, Morocco',
        'image' => 'https://images.unsplash.com/photo-1564013799919-ab600027ffc6'
    ],
    (object)[
        'id' => 3,
        'name' => 'Office Space',
        'description' => 'Perfect place for startups.',
        'location' => 'Rabat, Morocco',
        'image' => 'https://images.unsplash.com/photo-1497366216548-37526070297c'
    ],
    (object)[
        'id' => 4,
        'name' => 'Cozy Studio',
        'description' => 'Small but comfortable studio.',
        'location' => 'Tangier, Morocco',
        'image' => 'https://images.unsplash.com/photo-1522708323590-d24dbb6b0267'
    ],
]); 
@endphp



<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">
            Explore & Book
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 px-6">

        <div class="grid md:grid-cols-2 gap-8">

            @foreach($places as $place)
                <div class="bg-white rounded-2xl shadow-md flex overflow-hidden hover:shadow-xl transition">

                    <!-- IMAGE -->
                    <div class="w-1/2">
                        <img src="{{ $place->image }}"
                             class="h-full w-full object-cover">
                    </div>

                    <!-- CONTENT -->
                    <div class="w-1/2 p-5 flex flex-col justify-between">

                        <div>
                            <p class="text-sm text-blue-600 font-semibold">
                                YDooM Places
                            </p>

                            <h3 class="text-xl font-bold text-gray-800 mt-1">
                                {{ $place->name }}
                            </h3>

                            <p class="text-sm text-gray-500 mt-2">
                                {{ $place->description }}
                            </p>

                            <p class="text-sm text-gray-400 mt-2">
                                📍 {{ $place->location }}
                            </p>
                        </div>

                        <!-- BUTTON -->
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-xs bg-gray-100 px-3 py-1 rounded-full">
                                #Booking
                            </span>

                            <a href="{{ route('calendar', ['place_id' => $place->id]) }}"
                               class="bg-red-500 text-white px-4 py-2 rounded-full hover:bg-red-600 transition">
                                View
                            </a>
                        </div>

                    </div>

                </div>
            @endforeach

        </div>

    </div>
</x-app-layout>