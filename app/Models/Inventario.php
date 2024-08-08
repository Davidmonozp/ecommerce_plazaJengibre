<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;

    // El nombre de la tabla asociada al modelo (opcional si sigue la convención)
    protected $table = 'inventario';

    // Los atributos que son asignables en masa
    protected $fillable = [
        'id_producto',
        'tamaño', 
        'cantidad',
    ];

    // Definir las relaciones con otros modelos
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
}
