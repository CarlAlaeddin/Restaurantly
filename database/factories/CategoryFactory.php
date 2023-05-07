<?php

namespace Database\Factories;

use App\Models\Menu;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['user_id' => "\Illuminate\Support\HigherOrderCollectionProxy|mixed", 'name' => "string", 'status' => "int"])] public function definition(): array
    {
        return [
            'user_id'   =>  User::all()->random()->id,
            'name'      =>  $this->faker->unique()->title,
            'status'    =>  $this->faker->numberBetween(0,1)
        ];
    }
}
