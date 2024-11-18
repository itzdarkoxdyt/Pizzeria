<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'position' => 'required|in:cajero,administrador,cocinero,mensajero',
            'identification_number' => 'required|string|max:20',
            'salary' => 'required|numeric|min:0',
            'hire_date' => 'required|date',
        ]);

        Employee::create($request->all());
        return redirect()->route('employees.index')->with('success', 'Empleado creado exitosamente');
    }

    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.show', compact('employee'));
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'position' => 'required|in:cajero,administrador,cocinero,mensajero',
            'identification_number' => 'required|string|max:20',
            'salary' => 'required|numeric|min:0',
            'hire_date' => 'required|date',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->update($request->all());

        return redirect()->route('employees.index')->with('success', 'Empleado actualizado exitosamente');
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Empleado eliminado exitosamente');
    }
}
