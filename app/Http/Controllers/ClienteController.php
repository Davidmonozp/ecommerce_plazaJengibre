<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

   
    public function create()
    {
        return view('clientes.create');
    }   
 
    
        public function store(Request $request)
        {
            // Validar los datos
            $validacion = $request->validate([
                'cedula' => 'required|numeric|unique:clientes,cedula', // Verifica si la cédula es única en la tabla 'clientes'
                'nombre' => 'required|string|max:255',
                'apellido' => 'required|string|max:255',
                'email' => 'required|email|unique:clientes,email' // Verifica si el email es único en la tabla 'clientes'
            ]);
    
            // Crear una nueva instancia del modelo Cliente y asignar los valores
            $cliente = new Cliente;
            $cliente->cedula = $request->cedula;
            $cliente->nombre = $request->nombre;
            $cliente->apellido = $request->apellido;
            $cliente->email = $request->email;
            $cliente->save(); // Guardar el cliente en la base de datos
    
            // Redirigir a la ruta 'clientes' con un mensaje de éxito
            return redirect()->route('clientes.index')->with('success', 'Cliente creado correctamente');
        }
    
    

   
    public function show(string $id)
    {
        
    }

   
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
