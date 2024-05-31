<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Contracts\View\View;

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


    public function show($id): View
    {
        $cliente = Cliente::find($id);
        return view('clientes.show', compact('cliente'));
    }


    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }


    public function update(Request $request, Cliente $cliente)
    {
        // Validar los datos
        $validacion = $request->validate([

            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email'
        ]);

        // Actualizar los datos del cliente
        $cliente->update([

            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email
        ]);

        // Redirigir a la ruta 'clientes.index' con un mensaje de éxito
        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente');
    }


    public function destroy($id)
    {
        $cliente = Cliente::find($id);

        // Verificar si el perfil existe antes de intentar eliminarlo
        if ($cliente) {
            $cliente->delete();
            return redirect()->route('clientes.index')->with('success', 'Cliente eliminado correctamente.');
        } else {

            return redirect()->route('clientes.index')->with('error', 'Cliente no encontrado.');
        }
    }


    public function buscarPorNumeroIdentificacion(Request $request)
    {
        $cedula = $request->get('cedula');

        // Buscar clientes por número de identificación
        $clientes = Cliente::where('cedula', 'like', '%' . $cedula . '%')->paginate(20);

        return view('clientes.index', compact('clientes'));
    }
}
