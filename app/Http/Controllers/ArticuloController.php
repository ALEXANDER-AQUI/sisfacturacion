<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ArticuloRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $articulos = Articulo::paginate();

        return view('articulo.index', compact('articulos'))
            ->with('i', ($request->input('page', 1) - 1) * $articulos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $articulo = new Articulo();

        return view('articulo.create', compact('articulo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticuloRequest $request): RedirectResponse
    {
        Articulo::create($request->validated());

        return Redirect::route('articulos.index')
            ->with('success', 'Articulo created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $articulo = Articulo::find($id);

        return view('articulo.show', compact('articulo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $articulo = Articulo::find($id);

        return view('articulo.edit', compact('articulo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticuloRequest $request, Articulo $articulo): RedirectResponse
    {
        $articulo->update($request->validated());

        return Redirect::route('articulos.index')
            ->with('success', 'Articulo updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Articulo::find($id)->delete();

        return Redirect::route('articulos.index')
            ->with('success', 'Articulo deleted successfully');
    }
}
