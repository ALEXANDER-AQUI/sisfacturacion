<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\TipoDocumento;
use App\Models\Ciudad;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
{
    $busqueda = $request->get('busqueda');

    $clientes = Cliente::with(['tipoDocumento', 'ciudad'])
        ->when($busqueda, function ($query, $busqueda) {
            $query->where('documento', 'LIKE', "%$busqueda%")
                  ->orWhere('nombres', 'LIKE', "%$busqueda%")
                  ->orWhere('apellidos', 'LIKE', "%$busqueda%");
        })
        ->paginate(10)
        ->withQueryString();

    return view('cliente.index', compact('clientes'))
        ->with('i', ($request->input('page', 1) - 1) * $clientes->perPage());
}


    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $cliente = new Cliente();

        $tiposDocumentos = TipoDocumento::pluck('descripcion', 'id_tipo_documento');
        $ciudades = Ciudad::pluck('nombre_ciudad', 'codigo_ciudad');

        return view('cliente.create', compact(
            'cliente',
            'tiposDocumentos',
            'ciudades'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClienteRequest $request): RedirectResponse
    {
        Cliente::create($request->validated());

        return Redirect::route('clientes.index')
            ->with('success', 'Cliente creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente): View
    {
        return view('cliente.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente): View
    {
        $tiposDocumentos = TipoDocumento::pluck('descripcion', 'id_tipo_documento');
        $ciudades = Ciudad::pluck('nombre_ciudad', 'codigo_ciudad');

        return view('cliente.edit', compact(
            'cliente',
            'tiposDocumentos',
            'ciudades'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClienteRequest $request, Cliente $cliente): RedirectResponse
    {
        $cliente->update($request->validated());

        return Redirect::route('clientes.index')
            ->with('success', 'Cliente actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente): RedirectResponse
    {
        $cliente->delete();

        return Redirect::route('clientes.index')
            ->with('success', 'Cliente eliminado correctamente.');
    }
}
