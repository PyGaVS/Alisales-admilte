<?php

namespace Database\Seeders;

use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'truc',
            'email' => 'dgs@t.fr',
            'password' => '12345678',
        ]);
        User::factory()
            ->count(30)
            ->create();
    }
}
