<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Detallespedido;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalController extends Controller
{
    public function createpaypal()
    {
        // return view('paypal_view');
        return view('checkout');
    }


    public function processPaypal(Request $request)
    {
        // Obtener el usuario autenticado
        $user = Auth::user();

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $total = $request->input('total');
        // Almacenar el total en una variable de sesión
        $request->session()->put('total', $total);

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('processSuccess'),
                "cancel_url" => route('processCancel'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $total
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {

            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->route('createpaypal')
                ->with('error', 'Something went wrong.');
        } else {
            return redirect()
                ->route('createpaypal')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }


    public function processSuccess(Request $request)
    {
        $user = Auth::user();
        $userId = $user->id;

        $cliente_id = $userId;
        $fecha_pedido = now();

        // Obtener el total de la variable de sesión
        $total = $request->session()->get('total');
        $estado = 0;

        // Create a new Pedido record
        $pedido = Pedido::create([
            'cliente_id' => $cliente_id,
            'fecha_pedido' => $fecha_pedido,
            'total' => $total,
            'estado' => $estado,
        ]);

        // Obtener el ID del pedido recién creado
        $pedidoId = $pedido->id;

        // Obtener el carrito de la solicitud
        $carrito = json_decode($request->input('carrito'), true);

        // Verificar si $carrito es null antes de iterar sobre él
        if ($carrito) {
            // Iterar sobre los productos en el carrito
            foreach ($carrito as $producto) {
                $productoId = $producto['id'];
                $cantidad = $producto['cantidad'];
                $subtotal = $producto['precio'] * $cantidad;

                // Crear un nuevo registro en la tabla detallespedidos
                Detallespedido::create([
                    'pedido_id' => $pedidoId,
                    'producto_id' => $productoId,
                    'cantidad' => $cantidad,
                    'subtotal' => $subtotal,
                ]);
            }
        }

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {

            return redirect()
                ->route('createpaypal')
                ->with('success', 'Transaction complete.');
        } else {
            return redirect()
                ->route('createpaypal')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }


    public function processCancel(Request $request)
    {
        return redirect()
            ->route('createpaypal')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }
}
