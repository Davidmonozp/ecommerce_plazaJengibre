<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = ['nombre', 'descripcion', 'id_categoria', 'precio', 'tamaño', 'imagen'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }
    
      // Relación con la tabla Inventario
      public function inventarios()
      {
          return $this->hasMany(Inventario::class, 'id_producto');
      }

        // Método para obtener la cantidad total en inventario
    public function cantidadEnInventario()
    {
        return $this->inventarios->sum('cantidad');
    }
}
