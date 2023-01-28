<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

            \App\Models\Trainer::create([
                'name' => fake()->name,
                'email' => fake()->unique()->safeEmail(),
                'specialization' => fake()->randomElement(['Cardio', 'Body Building', 'Fit']),
                'phone' => fake()->phoneNumber,
            ]);

    }
}
