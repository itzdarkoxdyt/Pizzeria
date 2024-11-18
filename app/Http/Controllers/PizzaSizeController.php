<?php

namespace App\Http\Controllers;

use App\Models\PizzaSize;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PizzaSizeRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PizzaSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $pizzaSizes = PizzaSize::paginate();

        return view('pizza-size.index', compact('pizzaSizes'))
            ->with('i', ($request->input('page', 1) - 1) * $pizzaSizes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $pizzaSize = new PizzaSize();

        return view('pizza-size.create', compact('pizzaSize'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PizzaSizeRequest $request): RedirectResponse
    {
        PizzaSize::create($request->validated());

        return Redirect::route('pizza-sizes.index')
            ->with('success', 'PizzaSize created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $pizzaSize = PizzaSize::find($id);

        return view('pizza-size.show', compact('pizzaSize'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $pizzaSize = PizzaSize::find($id);

        return view('pizza-size.edit', compact('pizzaSize'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PizzaSizeRequest $request, PizzaSize $pizzaSize): RedirectResponse
    {
        $pizzaSize->update($request->validated());

        return Redirect::route('pizza-sizes.index')
            ->with('success', 'PizzaSize updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        PizzaSize::find($id)->delete();

        return Redirect::route('pizza-sizes.index')
            ->with('success', 'PizzaSize deleted successfully');
    }
}
