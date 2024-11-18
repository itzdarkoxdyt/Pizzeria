<?php

namespace App\Http\Controllers;

use App\Models\PizzaRawMaterial;
use Illuminate\Http\Request;

class PizzaRawMaterialController extends Controller
{
    public function index()
    {
        $pizzaRawMaterials = PizzaRawMaterial::all();
        return view('pizza-raw-materials.index', compact('pizzaRawMaterials'));
    }

    public function create()
    {
        return view('pizza-raw-materials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'raw_material_id' => 'required|exists:raw_materials,id',
            'quantity' => 'required|numeric|min:0',
        ]);

        PizzaRawMaterial::create($request->all());
        return redirect()->route('pizza-raw-materials.index')->with('success', 'Relación de materia prima para pizza creada exitosamente');
    }

    public function show($id)
    {
        $pizzaRawMaterial = PizzaRawMaterial::findOrFail($id);
        return view('pizza-raw-materials.show', compact('pizzaRawMaterial'));
    }

    public function edit($id)
    {
        $pizzaRawMaterial = PizzaRawMaterial::findOrFail($id);
        return view('pizza-raw-materials.edit', compact('pizzaRawMaterial'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'raw_material_id' => 'required|exists:raw_materials,id',
            'quantity' => 'required|numeric|min:0',
        ]);

        $pizzaRawMaterial = PizzaRawMaterial::findOrFail($id);
        $pizzaRawMaterial->update($request->all());

        return redirect()->route('pizza-raw-materials.index')->with('success', 'Relación de materia prima para pizza actualizada exitosamente');
    }

    public function destroy($id)
    {
        $pizzaRawMaterial = PizzaRawMaterial::findOrFail($id);
        $pizzaRawMaterial->delete();
        return redirect()->route('pizza-raw-materials.index')->with('success', 'Relación de materia prima para pizza eliminada exitosamente');
    }
}
