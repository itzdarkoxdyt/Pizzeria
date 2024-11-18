<?php

namespace App\Http\Controllers;

use App\Models\RawMaterial;
use Illuminate\Http\Request;

class RawMaterialController extends Controller
{
    public function index()
    {
        $rawMaterials = RawMaterial::all();
        return view('raw-materials.index', compact('rawMaterials'));
    }

    public function create()
    {
        return view('raw-materials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'current_stock' => 'required|numeric|min:0',
        ]);

        RawMaterial::create($request->all());
        return redirect()->route('raw-materials.index')->with('success', 'Materia prima creada exitosamente');
    }

    public function show($id)
    {
        $rawMaterial = RawMaterial::findOrFail($id);
        return view('raw-materials.show', compact('rawMaterial'));
    }

    public function edit($id)
    {
        $rawMaterial = RawMaterial::findOrFail($id);
        return view('raw-materials.edit', compact('rawMaterial'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'current_stock' => 'required|numeric|min:0',
        ]);

        $rawMaterial = RawMaterial::findOrFail($id);
        $rawMaterial->update($request->all());

        return redirect()->route('raw-materials.index')->with('success', 'Materia prima actualizada exitosamente');
    }

    public function destroy($id)
    {
        $rawMaterial = RawMaterial::findOrFail($id);
        $rawMaterial->delete();
        return redirect()->route('raw-materials.index')->with('success', 'Materia prima eliminada exitosamente');
    }
}
