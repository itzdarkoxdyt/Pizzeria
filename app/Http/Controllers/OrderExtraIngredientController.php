<?php

namespace App\Http\Controllers;

use App\Models\OrderExtraIngredient;
use Illuminate\Http\Request;

class OrderExtraIngredientController extends Controller
{
    public function index()
    {
        $orderExtraIngredients = OrderExtraIngredient::all();
        return view('order-extra-ingredients.index', compact('orderExtraIngredients'));
    }

    public function create()
    {
        return view('order-extra-ingredients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'extra_ingredient_id' => 'required|exists:extra_ingredients,id',
            'quantity' => 'required|integer|min:1',
        ]);

        OrderExtraIngredient::create($request->all());
        return redirect()->route('order-extra-ingredients.index')->with('success', 'Ingrediente extra agregado al pedido exitosamente');
    }

    public function show($id)
    {
        $orderExtraIngredient = OrderExtraIngredient::findOrFail($id);
        return view('order-extra-ingredients.show', compact('orderExtraIngredient'));
    }

    public function edit($id)
    {
        $orderExtraIngredient = OrderExtraIngredient::findOrFail($id);
        return view('order-extra-ingredients.edit', compact('orderExtraIngredient'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'extra_ingredient_id' => 'required|exists:extra_ingredients,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $orderExtraIngredient = OrderExtraIngredient::findOrFail($id);
        $orderExtraIngredient->update($request->all());

        return redirect()->route('order-extra-ingredients.index')->with('success', 'Ingrediente extra en el pedido actualizado exitosamente');
    }

    public function destroy($id)
    {
        $orderExtraIngredient = OrderExtraIngredient::findOrFail($id);
        $orderExtraIngredient->delete();
        return redirect()->route('order-extra-ingredients.index')->with('success', 'Ingrediente extra eliminado del pedido exitosamente');
    }
}
