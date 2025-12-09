<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductosSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('productos')->insert([

            [
                'category_id' => 1,
                'nombre' => 'Cojin',
                'descripcion' => 'Cojín en forma de U para apoyar al bebé durante la lactancia.',
                'precio' => 39.99,
                'foto' => 'cojin_lactancia.jpg',
                'gallery_images' => json_encode([
                    'cojin_lactancia_1.jpg',
                    'cojin_lactancia_2.jpg'
                ]),
                'brand' => 'MamiCare',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'category_id' => 1,
                'nombre' => 'Cochecito de Bebé Recién Nacido',
                'descripcion' => 'Cochecito con capazo, plegado rápido y ruedas todoterreno.',
                'precio' => 299.99,
                'foto' => 'cochecito_bebe.jpg',
                'gallery_images' => json_encode([
                    'cochecito_bebe_1.jpg',
                    'cochecito_bebe_2.jpg',
                    'cochecito_bebe_3.jpg'
                ]),
                'brand' => 'BabyTravel',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'category_id' => 2,
                'nombre' => 'Bolsa de Hospital para Maternidad',
                'descripcion' => 'Bolsa completa con artículos esenciales para el día del parto.',
                'precio' => 79.90,
                'foto' => 'bolsa_maternidad.jpg',
                'gallery_images' => json_encode([
                    'bolsa_maternidad_1.jpg'
                ]),
                'brand' => 'MamiKit',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'category_id' => 2,
                'nombre' => 'Monitor de Bebé con Cámara HD',
                'descripcion' => 'Monitor inalámbrico con visión nocturna y audio bidireccional.',
                'precio' => 129.50,
                'foto' => 'monitor_bebe.jpg',
                'gallery_images' => json_encode([
                    'monitor_bebe_1.jpg',
                    'monitor_bebe_2.jpg'
                ]),
                'brand' => 'SafeBaby',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'category_id' => 3,
                'nombre' => 'Set de Ropa para Recién Nacido (5 piezas)',
                'descripcion' => 'Incluye body, gorrito, pantalón, babero y manoplas.',
                'precio' => 24.99,
                'foto' => 'set_ropa_bebe.jpg',
                'gallery_images' => json_encode([
                    'set_ropa_bebe_1.jpg'
                ]),
                'brand' => 'SoftBabies',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
