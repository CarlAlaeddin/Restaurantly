<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Profile::factory(30)->create();
        \App\Models\Choose::factory(6)->create();
        \App\Models\Tag::factory(5)->create();
        \App\Models\Menu::factory(50)->create();
        \App\Models\Category::factory(5)->create();
        \App\Models\Special::factory(5)->create();
        \App\Models\Event::factory(20)->create();
        \App\Models\Gallery::factory(60)->create();
        \App\Models\Chef::factory(60)->create();
        \App\Models\Contact::factory(20)->create();

        \App\Models\User::factory()->create([
            'name' => 'Carl Alaeddin',
            'email' => 'Carl.Alaeddin@gmail.com',
        ]);

        \App\Models\Profile::factory()->create([
            'user_id' => 31,
            'image' => 'images/profiles/8763487638.jpg',
            'phone_number' => '09198382834',
            'address' => 'Iran ,Tehran, TehranPars, number 75',
            'beloved' => 'Football',
            'biography' => 'Im web developer !',
            'status' => 1,
            'role' => 1,
        ]);
    }
}
