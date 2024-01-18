<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $bookingTypes = ['Full Day', 'Half Day'];
        $bookingSlots = ['Morning', 'Evening'];
    
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'booking_type' => $this->faker->randomElement($bookingTypes),
            'booking_date' => $this->faker->date,
            'booking_slot' => $this->faker->randomElement($bookingSlots),
            'booking_time' => $this->faker->time,
        ];
    }
}
