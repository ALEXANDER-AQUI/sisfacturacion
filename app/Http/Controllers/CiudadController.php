<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CiudadRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CiudadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $ciudads = Ciudad::paginate();

        return view('ciudad.index', compact('ciudads'))
            ->with('i', ($request->input('page', 1) - 1) * $ciudads->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $ciudad = new Ciudad();

        return view('ciudad.create', compact('ciudad'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CiudadRequest $request): RedirectResponse
    {
        Ciudad::create($request->validated());

        return Redirect::route('ciudads.index')
            ->with('success', 'Ciudad created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $ciudad = Ciudad::find($id);

        return view('ciudad.show', compact('ciudad'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $ciudad = Ciudad::find($id);

        return view('ciudad.edit', compact('ciudad'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CiudadRequest $request, Ciudad $ciudad): RedirectResponse
    {
        $ciudad->update($request->validated());

        return Redirect::route('ciudads.index')
            ->with('success', 'Ciudad updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Ciudad::find($id)->delete();

        return Redirect::route('ciudads.index')
            ->with('success', 'Ciudad deleted successfully');
    }
}
