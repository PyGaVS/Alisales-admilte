<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    const NB_USERS = 9;
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        foreach (range(1, self::NB_USERS) as $i){
        User::factory()
            ->count(1)
            ->hasCustomers(5)
            ->create([
                'name' => 'saler0'.$i,
                'email' => 'saler0'.$i.'@alizon.fr',
                'password'=>Hash::make('12345678')
            ]);
        }
        /*
        User::factory(10)->create();
        User::factory()->create([
            'name' => 'usersio',
            'email' => 'usersio@test.fr',
            'password' => '12345678',
        ]);
        Customer::factory(50)->create();
        */

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
