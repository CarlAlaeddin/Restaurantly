<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'user_id'  =>   User::all()->random()->id,
            'name'     =>   $this->faker->name,
            'email'    =>   $this->faker->email,
            'subject'  =>   $this->faker->titleMale,
            'message'  =>   $this->faker->realText,
            'status'   =>   $this->faker->numberBetween(0, 1)
        ];
    }
}
