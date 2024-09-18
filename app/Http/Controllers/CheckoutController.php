<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Producto;

class CheckoutController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $cart = session()->get('carrito', []);

        if (empty($cart)) {
            return redirect()->route('carrito.index')->with('error', 'Tu carrito está vacío.');
        }

        // Calcular el total del carrito
        $total = array_sum(array_map(function ($item) {
            return $item['precio'] * $item['cantidad'];
        }, $cart));

        return view('checkout.index', compact('cart', 'user', 'total'));
    }



    public function store(Request $request)
    {
        // Validar los datos del pedido
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'payment_method' => 'required|string',
            'id_number' => 'required|string|max:20', // Añadido el campo id_number
        ]);

        // Obtener el carrito de la sesión
        $cart = session()->get('carrito', []);
        $total = array_sum(array_map(function ($item) {
            return $item['precio'] * $item['cantidad'];
        }, $cart));

        // Crear una nueva orden
        $order = Order::create([
            'user_id' => Auth::id(),
            'name' => $data['name'],
            'address' => $data['address'],
            'city' => $data['city'],
            'payment_method' => $data['payment_method'],
            'total' => $total,
            'id_number' => $data['id_number'], // Añadido el campo id_number
        ]);

        // Guardar los productos en la orden
        foreach ($cart as $id => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $item['cantidad'],
                'price' => $item['precio'],
            ]);

            // Obtener el producto
            $producto = Producto::find($id);

            // Verificar si el producto existe
            if ($producto) {
                // Obtener la cantidad solicitada
                $cantidadSolicitada = $item['cantidad'];

                // Descontar la cantidad del inventario
                $inventarios = $producto->inventarios()->orderBy('created_at')->get();
                foreach ($inventarios as $inventario) {
                    if ($cantidadSolicitada <= 0) break;

                    if ($inventario->cantidad >= $cantidadSolicitada) {
                        $inventario->cantidad -= $cantidadSolicitada;
                        $inventario->save();
                        $cantidadSolicitada = 0;
                    } else {
                        $cantidadSolicitada -= $inventario->cantidad;
                        $inventario->cantidad = 0;
                        $inventario->save();
                    }
                }
            }
        }

        // Limpiar el carrito
        session()->forget('carrito');

        // Construir el mensaje de WhatsApp
        $message = "Hola, quiero confirmar mi pedido con los siguientes detalles:\n";

        // Iterar sobre los elementos del pedido
        foreach ($order->orderItems as $item) {
            $message .= $item->product->nombre . ": " . $item->quantity . " x $" . $item->price . " = $" . ($item->quantity * $item->price) . "\n";
        }

        // Agregar el total
        $message .= "Total: $" . $order->total . "\n";

        // Agregar información del cliente
        $message .= "Nombre: " . $order->name . "\n";
        $message .= "Dirección: " . $order->address . "\n";
        $message .= "Ciudad: " . $order->city . "\n";
        $message .= "Número de Cédula: " . $order->id_number . "\n";
        $message .= "Método de Pago: " . $order->payment_method;

        // Codificar el mensaje para URL
        $encodedMessage = urlencode($message);

        // Redirigir al enlace de WhatsApp
        $whatsappNumber = '573214662896'; // Reemplaza con el número de WhatsApp de la empresa
        $whatsappUrl = "https://wa.me/{$whatsappNumber}?text={$encodedMessage}";

        return redirect()->to($whatsappUrl);
    }
}
