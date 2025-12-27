<?php

namespace App\Http\Controllers;

use App\Models\TipoArticulo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\TipoArticuloRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TipoArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $tipoArticulos = TipoArticulo::paginate();

        return view('tipo-articulo.index', compact('tipoArticulos'))
            ->with('i', ($request->input('page', 1) - 1) * $tipoArticulos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $tipoArticulo = new TipoArticulo();

        return view('tipo-articulo.create', compact('tipoArticulo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TipoArticuloRequest $request): RedirectResponse
    {
        TipoArticulo::create($request->validated());

        return Redirect::route('tipo-articulos.index')
            ->with('success', 'TipoArticulo created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $tipoArticulo = TipoArticulo::find($id);

        return view('tipo-articulo.show', compact('tipoArticulo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $tipoArticulo = TipoArticulo::find($id);

        return view('tipo-articulo.edit', compact('tipoArticulo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TipoArticuloRequest $request, TipoArticulo $tipoArticulo): RedirectResponse
    {
        $tipoArticulo->update($request->validated());

        return Redirect::route('tipo-articulos.index')
            ->with('success', 'TipoArticulo updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        TipoArticulo::find($id)->delete();

        return Redirect::route('tipo-articulos.index')
            ->with('success', 'TipoArticulo deleted successfully');
    }
}
