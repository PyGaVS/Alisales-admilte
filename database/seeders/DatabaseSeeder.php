<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Customer;
use \App\Models\Order;
use \App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    const NB_USERS = 9;
    const NB_ORDERS = 100;
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

        Customer::factory()->create([
            'name' => 'Me',
            'address' => '65 Rue de la Chenelière 85670',
            'postalCode' => '85670',
            'city' => 'Saint Etienne du bois',
            'email' => 'test@alizon.fr',
            'url' => 'https://portfolio-phi-eight-17.vercel.app',
            'user_id' => 9,
        ]);
        Category::factory(5)->create();

        foreach (range(1, self::NB_ORDERS) as $j) {
            $amountET = rand(400, 10000)+(rand(0,100)/100);
            Order::factory(1)->create([
                'amountET' => $amountET,
                'amountVTA' => $amountET/5,
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
