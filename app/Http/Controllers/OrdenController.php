<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrdenResource;
use App\Models\Orden;
use Illuminate\Http\Request;

class OrdenController extends Controller
{
    /**
     * @queryParam categoria string Permite filtrar las ordenes por categoría Example: Smartphones
     */
    public function index(Request $request)
    {
        $ordenes = Orden::query();
        if ($request->has('categoria')) {
            $categoria = $request->query('categoria');
            $ordenes = $ordenes->whereHas('producto', function($q) use ($categoria) {
                $q->where('categoria', $categoria);
            });
        }
        return OrdenResource::collection($ordenes->get());
    }

    /**
     * @bodyParam precio_unitario number Example: 100.00
     * @bodyParam cantidad integer Example: 5
     * @bodyParam producto_id integer Example: 2
     */
    public function store(Request $request)
    {
        $orden = $request->validate([
            'precio_unitario' => 'required|numeric', 
            'cantidad' => 'required|integer',
            'producto_id' => 'required|integer'
        ]);

        $importe = $orden['precio_unitario'] * $orden['cantidad'];
        $ordenCreada = Orden::create([
            ...$orden,
            'importe_total' => $importe
        ]);

        return new OrdenResource($ordenCreada);
    }
}
