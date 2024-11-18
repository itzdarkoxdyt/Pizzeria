<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\IngredientRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $ingredients = Ingredient::paginate();

        return view('ingredient.index', compact('ingredients'))
            ->with('i', ($request->input('page', 1) - 1) * $ingredients->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $ingredient = new Ingredient();

        return view('ingredient.create', compact('ingredient'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IngredientRequest $request): RedirectResponse
    {
        Ingredient::create($request->validated());

        return Redirect::route('ingredients.index')
            ->with('success', 'Ingredient created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $ingredient = Ingredient::find($id);

        return view('ingredient.show', compact('ingredient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $ingredient = Ingredient::find($id);

        return view('ingredient.edit', compact('ingredient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IngredientRequest $request, Ingredient $ingredient): RedirectResponse
    {
        $ingredient->update($request->validated());

        return Redirect::route('ingredients.index')
            ->with('success', 'Ingredient updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Ingredient::find($id)->delete();

        return Redirect::route('ingredients.index')
            ->with('success', 'Ingredient deleted successfully');
    }
}
