<?php

namespace Database\Seeders;

use App\Models\M_User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        M_User::create([
            'name' => 'Admin',
            'nik' => '1234567812',
            'email' => 'admin@gmail.com',
            'level' => '1',
            'status' => 'active',
            'password' => bcrypt('12345678')
        ]);


    }
}