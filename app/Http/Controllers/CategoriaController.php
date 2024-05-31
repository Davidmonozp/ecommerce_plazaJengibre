<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\View\View;



class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }


    public function create()
    {
        return view('categorias.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);

        $categoria = new Categoria;
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->save();

        return redirect()->route('categorias.index')->with('success', 'Categoria ha sido creada correctamente');
    }


    public function show($id): View
    {
        $categoria = Categoria::find($id);
        return view('categorias.show', compact('categoria'));
    }

    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }


    public function update(Request $request, Categoria $categoria)
    {
        $validacion = $request->validate([

            'nombre' => 'required',
            'descripcion' => 'required',
        ]);


        $categoria->update([

            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('categorias.index')->with('success', 'Categoria actualizada correctamente');
    }


    public function destroy($id)
    {
        $categoria = Categoria::find($id);

        if ($categoria) {
            $categoria->delete();
            return redirect()->route('categorias.index')->with('success', 'La Categoria se ha eliminado correctamente.');
        } else {

            return redirect()->route('categorias.index')->with('error', 'La Categoria no se ha encontrado.');
        }
    }

   
    public function buscarCategoria(Request $request)
    {
        $nombre = $request->get('nombre');    
       
        $categorias = Categoria::where('nombre', $nombre)->paginate(20);    
     
        return view('categorias.index', compact('categorias'));
    }
    
}