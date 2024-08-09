<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    public function index()
    {
        // Obtiene el carrito de la sesión
        $carrito = session()->get('carrito', []);
        $total = array_sum(array_map(function($item) {
            return $item['precio'] * $item['cantidad'];
        }, $carrito));

        return view('carrito.index', ['carrito' => $carrito, 'total' => $total]);
    }
    public function agregar(Request $request)
    {
        $producto = Producto::findOrFail($request->producto_id);
        $carrito = session()->get('carrito', []);
    
        $cantidadDisponible = $producto->cantidadEnInventario();
    
        // Verificar si la cantidad solicitada excede la cantidad disponible
        if ($request->cantidad > $cantidadDisponible) {
            return redirect()->back()->withErrors(['cantidad' => 'No hay suficiente cantidad disponible para agregar este producto.']);
        }
    
        if (isset($carrito[$producto->id])) {
            $carrito[$producto->id]['cantidad'] += $request->cantidad;
        } else {
            $carrito[$producto->id] = [
                'nombre' => $producto->nombre,
                'precio' => $producto->precio,
                'cantidad' => $request->cantidad,
                'imagen' => $producto->imagen,
                'descripcion' => $producto->descripcion
            ];
        }
    
        session()->put('carrito', $carrito);
    
        return redirect()->route('carrito.index');
    }
    
    

    public function eliminar($id)
    {
        $carrito = session()->get('carrito', []);

        if (isset($carrito[$id])) {
            unset($carrito[$id]);
        }

        session()->put('carrito', $carrito);

        return redirect()->route('carrito.index');
    }
}