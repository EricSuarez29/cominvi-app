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
            'precio_unitario' => 15000,
            'categoria' => 'Smartphones'
        ]);

        Producto::create([
            'nombre' => 'Iphone 15 PRO MAX',
            'precio_unitario' => 25000,
            'categoria' => 'Smartphones'
        ]);

        Producto::create([
            'nombre' => 'Laravora Samsung 15kg',
            'precio_unitario' => 20000,
            'categoria' => 'Smartphones'
        ]);
    }
}
