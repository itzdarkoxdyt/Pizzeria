<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use App\Models\Ingredient;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Mostrar todas las pizzas
    public function managePizzas()
    {
        $pizzas = Pizza::all();
        return view('admin.pizzas.index', compact('pizzas'));
    }

    // Crear una pizza
    public function createPizza()
    {
        $ingredients = Ingredient::all();
        return view('admin.pizzas.create', compact('ingredients'));
    }

    // Guardar una nueva pizza
    public function storePizza(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'ingredients' => 'array|required',
        ]);

        $pizza = Pizza::create($request->only(['name', 'price']));
        $pizza->ingredients()->sync($request->ingredients);

        return redirect()->route('admin.pizzas.index')->with('success', 'Pizza creada exitosamente');
    }

    // CRUD de órdenes
    public function manageOrders()
    {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    // Cambiar estado de la orden
    public function updateOrderStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->status; // 'completada', 'en proceso', 'anulada'
        $order->save();

        return redirect()->route('admin.orders.index')->with('success', 'Estado de la orden actualizado');
    }

    // Eliminar una orden
    public function deleteOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', 'Orden eliminada');
    }
}
