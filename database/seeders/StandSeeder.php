<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $stands = [];
        $companyIds = DB::table('companies')->pluck('id')->toArray(); // IDs de las compañías existentes

        for ($i = 1; $i <= 30; $i++) {
            $stands[] = [
                'name' => "Stand $i",
                'company_id' => $companyIds[array_rand($companyIds)], // Cambia a 'company_id'
            ];
        }

        DB::table('stands')->insert($stands);
    }
}
