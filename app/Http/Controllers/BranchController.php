<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\BranchRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $branches = Branch::paginate();

        return view('branch.index', compact('branches'))
            ->with('i', ($request->input('page', 1) - 1) * $branches->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $branch = new Branch();

        return view('branch.create', compact('branch'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BranchRequest $request): RedirectResponse
    {
        Branch::create($request->validated());

        return Redirect::route('branches.index')
            ->with('success', 'Branch created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $branch = Branch::find($id);

        return view('branch.show', compact('branch'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $branch = Branch::find($id);

        return view('branch.edit', compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BranchRequest $request, Branch $branch): RedirectResponse
    {
        $branch->update($request->validated());

        return Redirect::route('branches.index')
            ->with('success', 'Branch updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Branch::find($id)->delete();

        return Redirect::route('branches.index')
            ->with('success', 'Branch deleted successfully');
    }
}
