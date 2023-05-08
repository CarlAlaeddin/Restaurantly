<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chef>
 */
class ChefFactory extends Factory
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
            'image'         =>      $this->faker->imageUrl,
            'name'          =>      $this->faker->unique()->name,
            'position'      =>      $this->faker->numberBetween(1,3),
            'twitter'       =>      $this->faker->url,
            'facebook'      =>      $this->faker->url,
            'instagram'     =>      $this->faker->url,
            'linkedin'      =>      $this->faker->url,
            'status'        =>      $this->faker->numberBetween(0,1),
        ];
    }
}
