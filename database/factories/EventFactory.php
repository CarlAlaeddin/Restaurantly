<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'      =>       User::all()->random()->id,
            'image'        =>       $this->faker->imageUrl,
            'title'        =>       $this->faker->unique()->jobTitle,
            'slug'         =>       $this->faker->slug,
            'price'        =>       $this->faker->numberBetween(100,900),
            'body'         =>       $this->faker->text,
            'status'       =>       $this->faker->numberBetween(0,1),
        ];
    }
}
