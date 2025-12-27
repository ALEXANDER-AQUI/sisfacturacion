<?php

namespace App\Http\Controllers;

use App\Models\DetalleFactura;
use App\Models\Factura;
use App\Models\Articulo;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DetalleFacturaController extends Controller
{
    public function index(Request $request): View
    {
        $detalleFacturas = DetalleFactura::with(['factura', 'articulo'])->paginate(10);

        return view('detalle-factura.index', compact('detalleFacturas'))
            ->with('i', ($request->input('page', 1) - 1) * $detalleFacturas->perPage());
    }

    public function create(): View
    {
        $detalleFactura = new DetalleFactura();
        $facturas = Factura::pluck('nro_factura', 'nro_factura');

        // Pasamos descripcion y precio_venta de artículos
        $articulos = Articulo::all()->mapWithKeys(function($art){
            return [$art->id_articulo => ['descripcion' => $art->descripcion, 'precio' => $art->precio_venta]];
        });

        return view('detalle-factura.create', compact('detalleFactura', 'facturas', 'articulos'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'cod_factura'  => 'required',
            'cod_articulo' => 'required',
            'cantidad'     => 'required|numeric|min:1',
        ]);

        $articulo = Articulo::find($request->cod_articulo);
        $total = $request->cantidad * $articulo->precio_venta;

        DetalleFactura::create([
            'cod_factura'  => $request->cod_factura,
            'cod_articulo' => $request->cod_articulo,
            'cantidad'     => $request->cantidad,
            'total'        => $total
        ]);

        return Redirect::route('detalle-facturas.index')
            ->with('success', 'Detalle de factura registrado correctamente.');
    }

    public function show(DetalleFactura $detalleFactura): View
    {
        return view('detalle-factura.show', compact('detalleFactura'));
    }

    public function edit(DetalleFactura $detalleFactura): View
    {
        $facturas = Factura::pluck('nro_factura', 'nro_factura');
        $articulos = Articulo::all()->mapWithKeys(function($art){
            return [$art->id_articulo => ['descripcion' => $art->descripcion, 'precio' => $art->precio_venta]];
        });

        return view('detalle-factura.edit', compact('detalleFactura', 'facturas', 'articulos'));
    }

    public function update(Request $request, DetalleFactura $detalleFactura): RedirectResponse
    {
        $request->validate([
            'cod_factura'  => 'required',
            'cod_articulo' => 'required',
            'cantidad'     => 'required|numeric|min:1',
        ]);

        $articulo = Articulo::find($request->cod_articulo);
        $total = $request->cantidad * $articulo->precio_venta;

        $detalleFactura->update([
            'cod_factura'  => $request->cod_factura,
            'cod_articulo' => $request->cod_articulo,
            'cantidad'     => $request->cantidad,
            'total'        => $total
        ]);

        return Redirect::route('detalle-facturas.index')
            ->with('success', 'Detalle de factura actualizado correctamente.');
    }

    public function destroy(DetalleFactura $detalleFactura): RedirectResponse
    {
        $detalleFactura->delete();

        return Redirect::route('detalle-facturas.index')
            ->with('success', 'Detalle de factura eliminado correctamente.');
    }
}
