<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends Factory
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape([
            'user_id' => "\Illuminate\Support\HigherOrderCollectionProxy|mixed",
            'name' => "string",
            'email' => "string",
            'subject' => "string",
            'message' => "string",
            'status' => "int"
        ]
    )]
    public function definition(): array
    {
        return [
            'user_id' => User::all()->random()->id,
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'subject' => $this->faker->jobTitle,
            'message' => $this->faker->text,
            'status' => $this->faker->numberBetween(0, 1),
        ];
    }
}
