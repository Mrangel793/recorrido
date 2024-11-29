<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('media')->insert([
            [
                'file_path' => 'products/media1_image.jpg', // Asegúrate de que este archivo exista en storage/app/public/products
                'id_company' => 1, // Relacionado con el Company ID
                
            ],
            [
                'file_path' => 'products/media2_image.jpg', // Asegúrate de que este archivo exista en storage/app/public/products
                'id_company' => 1,
                
            ],
            [
                'file_path' => 'products/media3_image.jpg', // Asegúrate de que este archivo exista en storage/app/public/products
                'id_company' => 1, // Relacionado con el Company ID
                
            ],
        ]);
    }
    
}
