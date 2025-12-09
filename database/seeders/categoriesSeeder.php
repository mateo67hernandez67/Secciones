<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([

            [
                'name' => 'Ropa',
                'description' => 'Vestimenta para',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Juguetes',
                'description' => 'Juguetes para el desarrollo de nuestros bebes',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Madres',
                'description' => 'Todo para nuestras madres ',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
