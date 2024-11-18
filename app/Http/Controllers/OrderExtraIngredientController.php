<?php

namespace App\Http\Controllers;

use App\Models\OrderExtraIngredient;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\OrderExtraIngredientRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class OrderExtraIngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $orderExtraIngredients = OrderExtraIngredient::paginate();

        return view('order-extra-ingredient.index', compact('orderExtraIngredients'))
            ->with('i', ($request->input('page', 1) - 1) * $orderExtraIngredients->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $orderExtraIngredient = new OrderExtraIngredient();

        return view('order-extra-ingredient.create', compact('orderExtraIngredient'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderExtraIngredientRequest $request): RedirectResponse
    {
        OrderExtraIngredient::create($request->validated());

        return Redirect::route('order-extra-ingredients.index')
            ->with('success', 'OrderExtraIngredient created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $orderExtraIngredient = OrderExtraIngredient::find($id);

        return view('order-extra-ingredient.show', compact('orderExtraIngredient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $orderExtraIngredient = OrderExtraIngredient::find($id);

        return view('order-extra-ingredient.edit', compact('orderExtraIngredient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderExtraIngredientRequest $request, OrderExtraIngredient $orderExtraIngredient): RedirectResponse
    {
        $orderExtraIngredient->update($request->validated());

        return Redirect::route('order-extra-ingredients.index')
            ->with('success', 'OrderExtraIngredient updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        OrderExtraIngredient::find($id)->delete();

        return Redirect::route('order-extra-ingredients.index')
            ->with('success', 'OrderExtraIngredient deleted successfully');
    }
}
