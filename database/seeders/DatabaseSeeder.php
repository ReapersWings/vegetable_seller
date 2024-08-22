<?php

namespace Database\Seeders;

use App\Models\address;
use App\Models\products;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'email_verify_token'=>'123456'
        ]);
        User::create([
            'name'=>'a',
            'email'=>'ooi98872@gmail.com',
            'email_verify_token'=>'910459',
            'email_verified_at'=>'2024-08-22 02:43:09',
            'password'=>'1'
        ]);
        address::create([
            'name_location'=>'Home',
            'user_id'=>'2',
            'addres_1'=>'taman chung yany',
            'addres_2'=>'Lorong chua 3',
            'city'=>'Butterworth',
            'state'=>'Peneng',
            'post_code'=>'13500'
        ]);
        products::create([
            'image'=>'images/IbDYCSK525TOOBHA7UgTQJYG5ApCY3LTeqSusUze.jpg',
            'p_name'=>'test',
            'p_total_quantity'=>'1231541000',
            'p_price'=>'1000'
        ]);
        products::create([
            'image'=>'images/NitOi4wKnYmTXNMBb3JRqwjVZD7iqHjxNGAT3z3w.jpg',
            'p_name'=>'test1',
            'p_total_quantity'=>'123141414000',
            'p_price'=>'100'
        ]);
    }
}
