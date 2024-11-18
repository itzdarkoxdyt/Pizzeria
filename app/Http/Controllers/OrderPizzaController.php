<?php

namespace App\Http\Controllers;

use App\Models\OrderPizza;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\OrderPizzaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class OrderPizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $orderPizzas = OrderPizza::paginate();

        return view('order-pizza.index', compact('orderPizzas'))
            ->with('i', ($request->input('page', 1) - 1) * $orderPizzas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $orderPizza = new OrderPizza();

        return view('order-pizza.create', compact('orderPizza'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderPizzaRequest $request): RedirectResponse
    {
        OrderPizza::create($request->validated());

        return Redirect::route('order-pizzas.index')
            ->with('success', 'OrderPizza created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $orderPizza = OrderPizza::find($id);

        return view('order-pizza.show', compact('orderPizza'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $orderPizza = OrderPizza::find($id);

        return view('order-pizza.edit', compact('orderPizza'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderPizzaRequest $request, OrderPizza $orderPizza): RedirectResponse
    {
        $orderPizza->update($request->validated());

        return Redirect::route('order-pizzas.index')
            ->with('success', 'OrderPizza updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        OrderPizza::find($id)->delete();

        return Redirect::route('order-pizzas.index')
            ->with('success', 'OrderPizza deleted successfully');
    }
}
