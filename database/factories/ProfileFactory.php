<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['user_id' => "mixed", 'image' => "string", 'phone_number' => "string", 'address' => "string", 'beloved' => "string", 'biography' => "string", 'status' => "int", 'role' => "int"])]
    public function definition(): array
    {
        return [
            'user_id'           =>      User::factory(),
            'image'             =>      $this->faker->imageUrl,
            'phone_number'      =>      $this->faker->unique()->phoneNumber,
            'address'           =>      $this->faker->address,
            'beloved'           =>      $this->faker->titleMale,
            'biography'         =>      $this->faker->text,
            'status'            =>      $this->faker->numberBetween(0,1),
            'role'            =>      $this->faker->numberBetween(0,3),
        ];
    }
}
