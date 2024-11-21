<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\OrderPizza;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrderPizzaController extends Controller
{
    public function index()
    {
        $orderPizzas = OrderPizza::all();
        return view('order-pizzas.index', compact('orderPizzas'));
    }

    public function create()
    {
        return view('order-pizzas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'pizza_size_id' => 'required|exists:pizza_sizes,id',
            'quantity' => 'required|integer|min:1',
        ]);

        OrderPizza::create($request->all());
        return redirect()->route('order-pizzas.index')->with('success', 'Pizza agregada al pedido exitosamente');
    }

    public function show($id)
    {
        $orderPizza = OrderPizza::findOrFail($id);
        return view('order-pizzas.show', compact('orderPizza'));
    }

    public function edit($id)
    {
        $orderPizza = OrderPizza::findOrFail($id);
        return view('order-pizzas.edit', compact('orderPizza'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pizza_size_id' => 'required|exists:pizza_sizes,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $orderPizza = OrderPizza::findOrFail($id);
        $orderPizza->update($request->all());

        return redirect()->route('order-pizzas.index')->with('success', 'Pizza en el pedido actualizada exitosamente');
    }

    public function destroy($id)
    {
        $orderPizza = OrderPizza::findOrFail($id);
        $orderPizza->delete();
        return redirect()->route('order-pizzas.index')->with('success', 'Pizza eliminada del pedido exitosamente');
    }
}
