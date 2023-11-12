<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function mostrarCart()
    {
        $productos = Producto::all();
        return view('cart', compact('productos'));
    }
    
    public function mostrarCheckout()
    {
        return view('checkout');
    }

    public function finalizarPedido(Request $request)
    {
        $carritoJSON = $request->carrito;
        $carrito = json_decode($carritoJSON, true);
    }
}
