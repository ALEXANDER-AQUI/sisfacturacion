<?php

namespace App\Http\Controllers;

use App\Models\Devolucion;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DevolucionRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DevolucionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $devolucions = Devolucion::paginate();

        return view('devolucion.index', compact('devolucions'))
            ->with('i', ($request->input('page', 1) - 1) * $devolucions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $devolucion = new Devolucion();

        return view('devolucion.create', compact('devolucion'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DevolucionRequest $request): RedirectResponse
    {
        Devolucion::create($request->validated());

        return Redirect::route('devolucions.index')
            ->with('success', 'Devolucion created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $devolucion = Devolucion::find($id);

        return view('devolucion.show', compact('devolucion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $devolucion = Devolucion::find($id);

        return view('devolucion.edit', compact('devolucion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DevolucionRequest $request, Devolucion $devolucion): RedirectResponse
    {
        $devolucion->update($request->validated());

        return Redirect::route('devolucions.index')
            ->with('success', 'Devolucion updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Devolucion::find($id)->delete();

        return Redirect::route('devolucions.index')
            ->with('success', 'Devolucion deleted successfully');
    }
}
