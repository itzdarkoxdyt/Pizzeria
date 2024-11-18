<?php

namespace App\Http\Controllers;

use App\Models\RawMaterial;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\RawMaterialRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class RawMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $rawMaterials = RawMaterial::paginate();

        return view('raw-material.index', compact('rawMaterials'))
            ->with('i', ($request->input('page', 1) - 1) * $rawMaterials->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $rawMaterial = new RawMaterial();

        return view('raw-material.create', compact('rawMaterial'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RawMaterialRequest $request): RedirectResponse
    {
        RawMaterial::create($request->validated());

        return Redirect::route('raw-materials.index')
            ->with('success', 'RawMaterial created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $rawMaterial = RawMaterial::find($id);

        return view('raw-material.show', compact('rawMaterial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $rawMaterial = RawMaterial::find($id);

        return view('raw-material.edit', compact('rawMaterial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RawMaterialRequest $request, RawMaterial $rawMaterial): RedirectResponse
    {
        $rawMaterial->update($request->validated());

        return Redirect::route('raw-materials.index')
            ->with('success', 'RawMaterial updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        RawMaterial::find($id)->delete();

        return Redirect::route('raw-materials.index')
            ->with('success', 'RawMaterial deleted successfully');
    }
}
