<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Choose>
 */
class ChooseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['user_id' => "\Illuminate\Support\HigherOrderCollectionProxy|mixed", 'title' => "string", 'description' => "string", 'status' => "int"])] public function definition(): array
    {
        return [
            'user_id'        => User::all()->random()->id,
            'title'          => $this->faker->unique()->jobTitle,
            'description'    => $this->faker->text,
            'status'         => $this->faker->numberBetween(0,1),
        ];
    }
}
