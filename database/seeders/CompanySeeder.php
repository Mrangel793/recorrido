<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'name' => 'Ejemplo Company',
            'description' => 'Esta es una empresa de ejemplo.',
            'logo' => 'logos/company_logo.jpg', 
            'social_links' => json_encode([
                'facebook' => 'https://facebook.com/ejemplo',
                'twitter' => 'https://twitter.com/ejemplo',
            ]),
            'id_user' => 1, 
        ]);
    }
}
