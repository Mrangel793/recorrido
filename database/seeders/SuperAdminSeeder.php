<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Super Admin',
            'lastName' => 'Admin',
            'document' => '1234567890',
            'phone' => '3001234567',
            'email' => 'superadmin@example.com',
            'password' => bcrypt('12345678'), 
            'id_role' => 1, 
        ]);
    }
}
