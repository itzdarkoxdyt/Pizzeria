<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\PizzaSize;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PizzaSizeController extends Controller
{
    public function index()
    {
        $pizzaSizes = PizzaSize::all();
        return view('pizza-sizes.index', compact('pizzaSizes'));
    }

    public function create()
    {
        return view('pizza-sizes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'size' => 'required|in:pequeña,mediana,grande',
            'price' => 'required|numeric|min:0',
        ]);

        PizzaSize::create($request->all());
        return redirect()->route('pizza-sizes.index')->with('success', 'Tamaño de pizza creado exitosamente');
    }

    public function show($id)
    {
        $pizzaSize = PizzaSize::findOrFail($id);
        return view('pizza-sizes.show', compact('pizzaSize'));
    }

    public function edit($id)
    {
        $pizzaSize = PizzaSize::findOrFail($id);
        return view('pizza-sizes.edit', compact('pizzaSize'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'size' => 'required|in:pequeña,mediana,grande',
            'price' => 'required|numeric|min:0',
        ]);

        $pizzaSize = PizzaSize::findOrFail($id);
        $pizzaSize->update($request->all());

        return redirect()->route('pizza-sizes.index')->with('success', 'Tamaño de pizza actualizado exitosamente');
    }

    public function destroy($id)
    {
        $pizzaSize = PizzaSize::findOrFail($id);
        $pizzaSize->delete();
        return redirect()->route('pizza-sizes.index')->with('success', 'Tamaño de pizza eliminado exitosamente');
    }
}
