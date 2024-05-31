<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    
    public function create()
    {
        return view('productos.create');
    }

   
    public function store(Request $request)
    {
        {
            // Validar los datos
            $validacion = $request->validate([

                'nombre' => 'required|string|max:255',
                'descripcion' => 'required|string',
                'id_categoria' => 'required|numeric',
                'precio' => 'required|numeric'
            ]);

            // Crear una nueva instancia del modelo Cliente y asignar los valores
            $producto = new Producto;
            $producto->nombre = $request->nombre;
            $producto->descripcion = $request->descripcion;
            $producto->id_categoria = $request->id_categoria;
            $producto->precio = $request->precio;
            $producto->save();

            // Redirigir a la ruta 'clientes' con un mensaje de éxito
            return redirect()->route('productos.index')->with('success', 'Producto creado correctamente');
        }
    }

   
    public function show( $id): View
    {
        $producto = Producto::find($id);
        return view('productos.show', compact('producto'));
    }

    
    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    
    public function update(Request $request, Producto $producto)
    {
        $validacion = $request->validate([
            
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'id_categoria' => 'required|numeric',
            'precio' => 'required|numeric'
        ]);
    
        // Actualizar los datos del cliente
        $producto->update([
          
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'id_categoria' => $request->id_categoria,
            'precio' => $request->precio,
            
        ]);
    
        // Redirigir a la ruta 'clientes.index' con un mensaje de éxito
        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente');
    }

    
    public function destroy($id)
    {
        $producto = Producto::find($id);

        // Verificar si el perfil existe antes de intentar eliminarlo
        if ($producto) {
            $producto->delete();
            return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente.');
        } else {

            return redirect()->route('productos.index')->with('error', 'Producto no encontrado.');
        }
    }

    
    public function buscarProducto(Request $request)
    {
        $nombre = $request->get('nombre');

        // Buscar clientes por número de identificación
        $productos = Producto::where('nombre', 'like', '%' . $nombre . '%')->paginate(20);

        return view('productos.index', compact('productos'));
    }
}
