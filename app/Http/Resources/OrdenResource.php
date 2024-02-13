<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrdenResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'precioUnitario' => $this->precio_unitario, 
            'importeTotal' => $this->importe_total, 
            'cantidad' => $this->cantidad,
            'productoId' => $this->producto->id, 
            'nombre' => $this->producto->nombre,
            'categoria' => $this->producto->categoria,
            'fecha' => $this->created_at
        ];
    }
}
