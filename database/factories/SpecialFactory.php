<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Special>
 */
class SpecialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'       =>      User::all()->random()->id,
            'menu_name'     =>      $this->faker->slug(),
            'title'         =>      $this->faker->unique()->jobTitle,
            'image'         =>      $this->faker->imageUrl,
            'description'   =>      $this->faker->text,
            'status'        =>      $this->faker->numberBetween(0,1)
        ];
    }
}
