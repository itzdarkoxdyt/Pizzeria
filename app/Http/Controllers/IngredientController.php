<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function index()
    {
        $ingredients = Ingredient::all();
        return view('ingredients.index', compact('ingredients'));
    }

    public function create()
    {
        return view('ingredients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Ingredient::create($request->all());
        return redirect()->route('ingredients.index')->with('success', 'Ingrediente creado exitosamente');
    }

    public function show($id)
    {
        $ingredient = Ingredient::findOrFail($id);
        return view('ingredients.show', compact('ingredient'));
    }

    public function edit($id)
    {
        $ingredient = Ingredient::findOrFail($id);
        return view('ingredients.edit', compact('ingredient'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $ingredient = Ingredient::findOrFail($id);
        $ingredient->update($request->all());

        return redirect()->route('ingredients.index')->with('success', 'Ingrediente actualizado exitosamente');
    }

    public function destroy($id)
    {
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->delete();
        return redirect()->route('ingredients.index')->with('success', 'Ingrediente eliminado exitosamente');
    }
}
