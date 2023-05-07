<?php

namespace Database\Factories;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['tag' => 'string', 'status' => 'int'])]
     public function definition(): array
    {
        return [
            'tag'       =>  $this->faker->unique()->jobTitle,
            'status'    =>  $this->faker->numberBetween(0,1),
        ];
        
    }
}
