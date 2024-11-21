<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\ExtraIngredient;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ExtraIngredientController extends Controller
{
    public function index()
    {
        $extraIngredients = ExtraIngredient::all();
        return view('extra-ingredients.index', compact('extraIngredients'));
    }

    public function create()
    {
        return view('extra-ingredients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        ExtraIngredient::create($request->all());
        return redirect()->route('extra-ingredients.index')->with('success', 'Ingrediente extra creado exitosamente');
    }

    public function show($id)
    {
        $extraIngredient = ExtraIngredient::findOrFail($id);
        return view('extra-ingredients.show', compact('extraIngredient'));
    }

    public function edit($id)
    {
        $extraIngredient = ExtraIngredient::findOrFail($id);
        return view('extra-ingredients.edit', compact('extraIngredient'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        $extraIngredient = ExtraIngredient::findOrFail($id);
        $extraIngredient->update($request->all());

        return redirect()->route('extra-ingredients.index')->with('success', 'Ingrediente extra actualizado exitosamente');
    }

    public function destroy($id)
    {
        $extraIngredient = ExtraIngredient::findOrFail($id);
        $extraIngredient->delete();
        return redirect()->route('extra-ingredients.index')->with('success', 'Ingrediente extra eliminado exitosamente');
    }
}
