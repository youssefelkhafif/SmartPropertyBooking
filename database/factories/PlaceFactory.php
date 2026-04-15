<?php

namespace Database\Factories;

use App\Models\Place;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Place>
 */
class PlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    $images = [
        'https://images.unsplash.com/photo-1507089947368-19c1da9775ae',
        'https://images.unsplash.com/photo-1564013799919-ab600027ffc6',
        'https://images.unsplash.com/photo-1497366216548-37526070297c',
        'https://images.unsplash.com/photo-1522708323590-d24dbb6b0267',
    ];

    $locations = [
        'Casablanca, Morocco',
        'Marrakech, Morocco',
        'Rabat, Morocco',
        'Tangier, Morocco',
    ];

    return [
        'name' => fake()->randomElement([
            'Modern Apartment',
            'Luxury Villa',
            'Office Space',
            'Cozy Studio',
            'Beach House',
            'Penthouse Suite'
        ]),
        'description' => fake()->sentence(10),
        'location' => fake()->randomElement($locations),
        'image' => fake()->randomElement($images),
    ];
}
}
