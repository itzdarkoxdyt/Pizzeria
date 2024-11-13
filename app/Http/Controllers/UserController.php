<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use App\Models\Order;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Ver todas las pizzas para el usuario
    public function showPizzas()
    {
        $pizzas = Pizza::all();
        return view('user.pizzas.index', compact('pizzas'));
    }

    // Hacer un pedido
    public function orderPizza(Request $request)
    {
        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'quantity' => 'required|integer|min:1',
        ]);

        Order::create([
            'user_id' => auth()->user()->id,
            'pizza_id' => $request->pizza_id,
            'quantity' => $request->quantity,
            'status' => 'en proceso',  // Estado inicial
        ]);

        return redirect()->route('user.orders.index')->with('success', 'Pedido realizado');
    }

    // Ver el estado del pedido
    public function showOrderStatus()
    {
        $orders = Order::where('user_id', auth()->user()->id)->get();
        return view('user.orders.index', compact('orders'));
    }
}
