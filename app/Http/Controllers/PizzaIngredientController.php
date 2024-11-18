<?php

namespace App\Http\Controllers;

use App\Models\PizzaIngredient;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PizzaIngredientRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PizzaIngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $pizzaIngredients = PizzaIngredient::paginate();

        return view('pizza-ingredient.index', compact('pizzaIngredients'))
            ->with('i', ($request->input('page', 1) - 1) * $pizzaIngredients->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $pizzaIngredient = new PizzaIngredient();

        return view('pizza-ingredient.create', compact('pizzaIngredient'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PizzaIngredientRequest $request): RedirectResponse
    {
        PizzaIngredient::create($request->validated());

        return Redirect::route('pizza-ingredients.index')
            ->with('success', 'PizzaIngredient created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $pizzaIngredient = PizzaIngredient::find($id);

        return view('pizza-ingredient.show', compact('pizzaIngredient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $pizzaIngredient = PizzaIngredient::find($id);

        return view('pizza-ingredient.edit', compact('pizzaIngredient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PizzaIngredientRequest $request, PizzaIngredient $pizzaIngredient): RedirectResponse
    {
        $pizzaIngredient->update($request->validated());

        return Redirect::route('pizza-ingredients.index')
            ->with('success', 'PizzaIngredient updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        PizzaIngredient::find($id)->delete();

        return Redirect::route('pizza-ingredients.index')
            ->with('success', 'PizzaIngredient deleted successfully');
    }
}
