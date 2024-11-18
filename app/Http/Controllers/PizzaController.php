<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PizzaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $pizzas = Pizza::paginate();

        return view('pizza.index', compact('pizzas'))
            ->with('i', ($request->input('page', 1) - 1) * $pizzas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $pizza = new Pizza();

        return view('pizza.create', compact('pizza'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PizzaRequest $request): RedirectResponse
    {
        Pizza::create($request->validated());

        return Redirect::route('pizzas.index')
            ->with('success', 'Pizza created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $pizza = Pizza::find($id);

        return view('pizza.show', compact('pizza'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $pizza = Pizza::find($id);

        return view('pizza.edit', compact('pizza'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PizzaRequest $request, Pizza $pizza): RedirectResponse
    {
        $pizza->update($request->validated());

        return Redirect::route('pizzas.index')
            ->with('success', 'Pizza updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Pizza::find($id)->delete();

        return Redirect::route('pizzas.index')
            ->with('success', 'Pizza deleted successfully');
    }
}
