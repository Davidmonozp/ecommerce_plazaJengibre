<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\Producto;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    // Mostrar una lista de los inventarios
    public function index()
    {
        // Cambia `all()` por `paginate()` para habilitar la paginación
        $inventarios = Inventario::paginate(15); // 15 es el número de elementos por página
    
        return view('inventario.index', compact('inventarios'));
    }
    
    // Mostrar el formulario para crear un nuevo inventario
    public function create()
    {
        $productos = Producto::all(); // Obtener todos los productos para el formulario
        return view('inventario.create', compact('productos'));
    }

    // Almacenar un nuevo inventario en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'id_producto' => 'required|exists:productos,id',
            'tamaño' => 'required|string',
            'cantidad' => 'required|integer|min:0',
        ]);

        Inventario::create($request->all());

        return redirect()->route('inventario.index')->with('success', 'Inventario creado correctamente.');
    }

    // Mostrar el formulario para editar un inventario existente
    public function edit(Inventario $inventario)
    {
        $productos = Producto::all(); // Obtener todos los productos para el formulario
        return view('inventario.edit', compact('inventario', 'productos'));
    }

    // Actualizar un inventario existente en la base de datos
    public function update(Request $request, Inventario $inventario)
    {
        $request->validate([
          
            'cantidad' => 'required|integer|min:0',
        ]);

        $inventario->update($request->all());

        return redirect()->route('inventario.index')->with('success', 'Inventario actualizado correctamente.');
    }

    // Eliminar un inventario de la base de datos
    public function destroy(Inventario $inventario)
    {
        $inventario->delete();

        return redirect()->route('inventario.index')->with('success', 'Inventario eliminado correctamente.');
    }
}
