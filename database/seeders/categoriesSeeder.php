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
                'name' => 'Madres',
                'description' => 'Todo lo que necesitan nuestras madres',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Bebes',
                'description' => 'Todo para el cuidado y bienestar de nuestros bebes',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Juguetes',
                'description' => 'Todo para el desarrollo de nuestros bebes ',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
