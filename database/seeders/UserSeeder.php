<?php

namespace Database\Seeders;

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
            'name' => 'Regular User',
            'lastName' => 'Doe',
            'document' => '9876543210',
            'phone' => '3011234567',
            'email' => 'user@example.com',
            'password' => bcrypt('12345678'), 
            'id_role' => 2, 
        ]);
    }
}
