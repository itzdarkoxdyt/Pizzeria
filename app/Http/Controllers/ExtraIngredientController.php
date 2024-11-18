<?php

namespace App\Http\Controllers;

use App\Models\ExtraIngredient;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ExtraIngredientRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ExtraIngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $extraIngredients = ExtraIngredient::paginate();

        return view('extra-ingredient.index', compact('extraIngredients'))
            ->with('i', ($request->input('page', 1) - 1) * $extraIngredients->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $extraIngredient = new ExtraIngredient();

        return view('extra-ingredient.create', compact('extraIngredient'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExtraIngredientRequest $request): RedirectResponse
    {
        ExtraIngredient::create($request->validated());

        return Redirect::route('extra-ingredients.index')
            ->with('success', 'ExtraIngredient created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $extraIngredient = ExtraIngredient::find($id);

        return view('extra-ingredient.show', compact('extraIngredient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $extraIngredient = ExtraIngredient::find($id);

        return view('extra-ingredient.edit', compact('extraIngredient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExtraIngredientRequest $request, ExtraIngredient $extraIngredient): RedirectResponse
    {
        $extraIngredient->update($request->validated());

        return Redirect::route('extra-ingredients.index')
            ->with('success', 'ExtraIngredient updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        ExtraIngredient::find($id)->delete();

        return Redirect::route('extra-ingredients.index')
            ->with('success', 'ExtraIngredient deleted successfully');
    }
}
