<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use App\Models\TipoDocumento;
use App\Models\Ciudad;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ProveedorRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProveedorController extends Controller
{
    public function index(Request $request): View
    {
        $proveedors = Proveedor::paginate();

        return view('proveedor.index', compact('proveedors'))
            ->with('i', ($request->input('page', 1) - 1) * $proveedors->perPage());
    }

    // 🔹 CREATE (ARREGLADO)
    public function create(): View
    {
        $proveedor = new Proveedor();

        $tiposDocumentos = TipoDocumento::pluck('descripcion', 'id_tipo_documento');
        $ciudades = Ciudad::pluck('nombre_ciudad', 'codigo_ciudad');

        return view('proveedor.create', compact(
            'proveedor',
            'tiposDocumentos',
            'ciudades'
        ));
    }

    public function store(ProveedorRequest $request): RedirectResponse
    {
        Proveedor::create($request->validated());

        return Redirect::route('proveedors.index')
            ->with('success', 'Proveedor created successfully.');
    }

    public function show($id): View
    {
        $proveedor = Proveedor::findOrFail($id);

        return view('proveedor.show', compact('proveedor'));
    }

    // 🔹 EDIT (YA ESTABA BIEN, SOLO ORDENADO)
    public function edit(Proveedor $proveedor): View
    {
        $tiposDocumentos = TipoDocumento::pluck('descripcion', 'id_tipo_documento');
        $ciudades = Ciudad::pluck('nombre_ciudad', 'codigo_ciudad');

        return view('proveedor.edit', compact(
            'proveedor',
            'tiposDocumentos',
            'ciudades'
        ));
    }

    public function update(ProveedorRequest $request, Proveedor $proveedor): RedirectResponse
    {
        $proveedor->update($request->validated());

        return Redirect::route('proveedors.index')
            ->with('success', 'Proveedor updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Proveedor::findOrFail($id)->delete();

        return Redirect::route('proveedors.index')
            ->with('success', 'Proveedor deleted successfully');
    }
}
