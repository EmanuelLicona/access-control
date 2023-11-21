<?php

namespace Database\Seeders;

use App\Models\Access;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'first_name' => 'admin',
            'last_name' => 'admin',
            'code' => '1010',
            'is_admin' => true
        ]);

        // $access = new Access();
        // $access->date = now();
        // $access->user_id = 1;
        // $access->save();

    }
}
