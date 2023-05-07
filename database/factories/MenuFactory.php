<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['user_id' => "\Illuminate\Support\HigherOrderCollectionProxy|mixed", 'category_id' => "mixed", 'name' => "string", 'price' => "int", 'image' => "string", 'status' => "int"])] public function definition(): array
    {
        return [
            'user_id'       =>   User::all()->random()->id,
            'category_id'   =>   Category::all()->random()->id,
            'name'          =>   $this->faker->unique()->name,
            'price'         =>   $this->faker->numberBetween(100,1000),
            'image'         =>   $this->faker->imageUrl,
            'status'        =>   $this->faker->numberBetween(0,1),
        ];
    }
}
