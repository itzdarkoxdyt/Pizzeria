<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        Client::create($request->all());
        return redirect()->route('clients.index')->with('success', 'Cliente creado exitosamente');
    }

    public function show($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.show', compact('client'));
    }

    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        $client = Client::findOrFail($id);
        $client->update($request->all());

        return redirect()->route('clients.index')->with('success', 'Cliente actualizado exitosamente');
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Cliente eliminado exitosamente');
    }
}
