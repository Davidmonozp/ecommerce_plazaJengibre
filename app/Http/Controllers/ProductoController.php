<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{

    public function index()
    {
        $productos = Producto::orderBy('nombre')->paginate(8);
        return view('productos.index', compact('productos'));
    }
    
    public function show($id)
    {
        // Buscar el producto por su ID
        $producto = Producto::findOrFail($id);
        
        // Devolver la vista 'productos.show' con los datos del producto
        return view('productos.show', compact('producto'));
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
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Crear una nueva instancia del modelo Producto y asignar los valores
        $producto = new Producto;
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->id_categoria = $request->id_categoria;
        $producto->precio = $request->precio;
        $producto->tamaño = $request->tamaño;
    
        // Manejar la imagen
        if ($request->hasFile('imagen')) {
            $image = $request->file('imagen');
            
            // Generar un nombre único para la imagen
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            
            // Almacenar la imagen en el directorio 'public/productos'
            $imagePath = $image->storeAs('public/productos', $imageName);
            
            // Asignar la ruta relativa a la propiedad imagen del producto
            $producto->imagen = 'productos/' . $imageName;
        }
    
        // Intentar guardar el producto y verificar si se guarda correctamente
        if ($producto->save()) {
            // Éxito al guardar el producto
            return redirect()->route('productos.index')->with('success', 'Producto creado correctamente');
        } else {
            // Manejo de errores, si es necesario
            return back()->withInput()->withErrors('Error al guardar el producto');
        }
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
            'id_categoria' => 'required|exists:categorias,id',
            'precio' => 'required|numeric',
            'tamaño' => 'required|string|in:45g,120g,170g,250g,450g,500g,600g',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación para la imagen
        ]);
    
        // Actualizar los datos del producto (excepto la imagen)
        $producto->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'id_categoria' => $request->id_categoria,
            'precio' => $request->precio,
            'tamaño' => $request->input('tamaño'),
        ]);
    
        // Manejar la actualización de la imagen
        if ($request->hasFile('imagen')) {
            // Eliminar la imagen existente si existe
            if ($producto->imagen && file_exists(storage_path('app/public/' . $producto->imagen))) {
                unlink(storage_path('app/public/' . $producto->imagen));
            }
    
            // Subir la nueva imagen
            $imagen = $request->file('imagen')->store('productos', 'public');
            $producto->imagen = $imagen;
            $producto->save();
        }
    
        // Redirigir de vuelta a la vista de productos con un mensaje de éxito
        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente');
    }
    
    



    public function destroy($id)
    {
        // Buscar el producto por su ID
        $producto = Producto::find($id);
    
        // Verificar si el producto existe antes de intentar eliminarlo
        if ($producto) {
            // Eliminar la imagen del almacenamiento si existe
            if ($producto->imagen && file_exists(storage_path('app/public/' . $producto->imagen))) {
                // Eliminar el archivo de imagen
                unlink(storage_path('app/public/' . $producto->imagen));
            }
    
            // Eliminar el producto
            $producto->delete();
    
            // Redirigir con un mensaje de éxito
            return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente.');
        } else {
            // Redirigir con un mensaje de error si el producto no se encuentra
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
    // ProductoController.php

 
}
    