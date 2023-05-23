<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Eren Yoga E',
            'email' => 'eye@gmail.com',
            'password' => Hash::make('eye@gmail.com'),
        ]);
    }
}
