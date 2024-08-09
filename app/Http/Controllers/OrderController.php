<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // Obtener pedidos con productos relacionados, ordenados por id de mayor a menor
        $orders = Order::with('orderItems.product')->orderBy('id', 'desc')->paginate(8); 
    
        return view('orders.index', compact('orders'));
    }
    
    

    // Mostrar los detalles de un pedido específico
    public function show($id)
    {
        // Asegúrate de que el ID sea el correcto
        $order = Order::with('orderItems.product')->find($id);

        if (!$order) {
            return redirect()->route('orders.index')->with('error', 'Pedido no encontrado.');
        }

        return view('orders.show', compact('order'));
    }

          // Función para buscar pedidos por número de cédula
    public function searchByIdNumber(Request $request)
    {
        $request->validate([
            'id_number' => 'required|string|max:255',
        ]);

        $idNumber = $request->input('id_number');

        // Buscar pedidos que coincidan con el número de cédula
        $orders = Order::where('id_number', 'like', '%' . $idNumber . '%')->with('orderItems.product')->paginate(20);

        // Redirigir a la vista con los resultados
        return view('orders.index', compact('orders'));
    }

}