<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    
    public function index()
    {
        $productos = Producto::paginate(5); // Paginación con 1 item por página
        return view('productos.index', compact('productos'));
    }
    

    
    public function create()
    {
        $categorias = Categoria::all(); // Obtener todas las categorías

        return view('productos.create', compact('categorias'));
    }
    public function store(Request $request)
    {
        // Validar los datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'id_categoria' => 'required|exists:categorias,id',
            'precio' => 'required|numeric',
            'tamaño' => 'required|string',
        ]);
    
        // Crear una nueva instancia del modelo Producto y asignar los valores
        $producto = new Producto;
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        // $producto->id_categoria = $request->id_categoria;
        $producto->precio = $request->precio;
        $producto->tamaño = $request->tamaño;
    
        // Intentar guardar el producto y verificar si se guarda correctamente
        if ($producto->save()) {
            // Éxito al guardar el producto
            return redirect()->route('productos.index')->with('success', 'Producto creado correctamente');
        } else {
            // Manejo de errores, si es necesario
            return back()->withInput()->withErrors('Error al guardar el producto');
        }
    }
    
    
   
    public function show( $id): View
    {
        $producto = Producto::find($id);
        return view('productos.show', compact('producto'));
    }

    
    public function edit($id)
    {
        // return view('productos.edit', compact('producto'));
        $producto = Producto::findOrFail($id);
    $categorias = Categoria::all(); // Obtener todas las categorías disponibles

    return view('productos.edit', compact('producto', 'categorias'));
    }

    public function update(Request $request, Producto $producto)
    {
        // Validar los datos del formulario
        $validacion = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            // 'id_categoria' => 'required|exists:categorias,id', // Verificar que la categoría exista en la tabla 'categorias'
            'precio' => 'required|numeric',
            // 'tamaño' => 'required|integer', // Asegurarse de que sea un número entero
        ]);
    
        // Actualizar los datos del producto
        $producto->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            // 'id_categoria' => $request->id_categoria,
            'precio' => $request->precio,
            // 'tamaño' => $request->tamaño,
        ]);
    
        // Redirigir de vuelta a la vista de productos con un mensaje de éxito
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
