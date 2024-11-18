<?php

namespace App\Http\Controllers;

use App\Models\PizzaRawMaterial;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PizzaRawMaterialRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PizzaRawMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $pizzaRawMaterials = PizzaRawMaterial::paginate();

        return view('pizza-raw-material.index', compact('pizzaRawMaterials'))
            ->with('i', ($request->input('page', 1) - 1) * $pizzaRawMaterials->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $pizzaRawMaterial = new PizzaRawMaterial();

        return view('pizza-raw-material.create', compact('pizzaRawMaterial'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PizzaRawMaterialRequest $request): RedirectResponse
    {
        PizzaRawMaterial::create($request->validated());

        return Redirect::route('pizza-raw-materials.index')
            ->with('success', 'PizzaRawMaterial created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $pizzaRawMaterial = PizzaRawMaterial::find($id);

        return view('pizza-raw-material.show', compact('pizzaRawMaterial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $pizzaRawMaterial = PizzaRawMaterial::find($id);

        return view('pizza-raw-material.edit', compact('pizzaRawMaterial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PizzaRawMaterialRequest $request, PizzaRawMaterial $pizzaRawMaterial): RedirectResponse
    {
        $pizzaRawMaterial->update($request->validated());

        return Redirect::route('pizza-raw-materials.index')
            ->with('success', 'PizzaRawMaterial updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        PizzaRawMaterial::find($id)->delete();

        return Redirect::route('pizza-raw-materials.index')
            ->with('success', 'PizzaRawMaterial deleted successfully');
    }
}
