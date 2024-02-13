<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Producto::create([
            'nombre' => 'Samsung S22',
            'categoria' => 'Smartphones'
        ]);

        Producto::create([
            'nombre' => 'Iphone 15 PRO MAX',
            'categoria' => 'Smartphones'
        ]);

        Producto::create([
            'nombre' => 'Laravora Samsung 15kg',
            'categoria' => 'Linea Blanca'
        ]);

        Producto::create([
            'nombre' => 'Refrigerador Mabe',
            'categoria' => 'Linea Blanca'
        ]);

        Producto::create([
            'nombre' => 'Macbook Chipset M1',
            'categoria' => 'Computo'
        ]);

        Producto::create([
            'nombre' => 'HP Pro book',
            'categoria' => 'Computo'
        ]);
    }
}
