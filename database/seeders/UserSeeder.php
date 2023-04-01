<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'user_name' => 'Mohamed Ahmed',
            'mobile_number' => '01123218274',
            'password' => bcrypt('01123218274')
        ]);

    }
}
