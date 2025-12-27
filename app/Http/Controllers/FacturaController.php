<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\Cliente;
use App\Models\FormaDePago;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class FacturaController extends Controller
{
    // LISTADO
    public function index(Request $request): View
    {
        $facturas = Factura::with(['cliente', 'formaPago'])->paginate(10);

        return view('factura.index', compact('facturas'))
            ->with('i', ($request->input('page', 1) - 1) * $facturas->perPage());
    }

    // FORM CREAR
    public function create(): View
    {
        $factura = new Factura();

        // Generar nro_factura automáticamente (string incremental)
        $lastFactura = Factura::orderBy('nro_factura', 'desc')->first();
        $factura->nro_factura = $lastFactura 
            ? (string)((int) preg_replace('/\D/', '', $lastFactura->nro_factura) + 1) 
            : '1';

        // CLIENTES → documento => "Nombre Apellido - documento"
        $clientes = Cliente::selectRaw("
                documento,
                CONCAT(nombres, ' ', apellidos, ' - ', documento) as nombre
            ")
            ->pluck('nombre', 'documento');

        // FORMAS DE PAGO
        $formasPago = FormaDePago::pluck('descripcion_formapago', 'id_formapago');

        return view('factura.create', compact('factura', 'clientes', 'formasPago'));
    }

    // GUARDAR
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'cod_cliente'       => 'required',
            'nombre_empleado'   => 'required|string',
            'fecha_facturacion' => 'required|date',
            'cod_formapago'     => 'required',
            'total_factura'     => 'required|numeric',
        ]);

        // Generar nro_factura automáticamente (string incremental)
        $lastFactura = Factura::orderBy('nro_factura', 'desc')->first();
        $nuevoNro = $lastFactura 
            ? (string)((int) preg_replace('/\D/', '', $lastFactura->nro_factura) + 1) 
            : '1';

        Factura::create([
            'nro_factura'       => $nuevoNro,
            'cod_cliente'       => $request->cod_cliente,
            'nombre_empleado'   => $request->nombre_empleado,
            'fecha_facturacion' => $request->fecha_facturacion,
            'cod_formapago'     => $request->cod_formapago,
            'total_factura'     => $request->total_factura,
        ]);

        return Redirect::route('facturas.index')
            ->with('success', 'Factura registrada correctamente.');
    }

    // FORM EDITAR
    public function edit(Factura $factura): View
    {
        $clientes = Cliente::selectRaw("
                documento,
                CONCAT(nombres, ' ', apellidos, ' - ', documento) as nombre
            ")
            ->pluck('nombre', 'documento');

        $formasPago = FormaDePago::pluck('descripcion_formapago', 'id_formapago');

        return view('factura.edit', compact('factura', 'clientes', 'formasPago'));
    }

    // ACTUALIZAR
    public function update(Request $request, Factura $factura): RedirectResponse
    {
        $request->validate([
            'cod_cliente'       => 'required',
            'nombre_empleado'   => 'required|string',
            'fecha_facturacion' => 'required|date',
            'cod_formapago'     => 'required',
            'total_factura'     => 'required|numeric',
        ]);

        $factura->update($request->only([
            'cod_cliente',
            'nombre_empleado',
            'fecha_facturacion',
            'cod_formapago',
            'total_factura',
        ]));

        return Redirect::route('facturas.index')
            ->with('success', 'Factura actualizada correctamente.');
    }

    // ELIMINAR
    public function destroy(Factura $factura): RedirectResponse
    {
        $factura->delete();

        return Redirect::route('facturas.index')
            ->with('success', 'Factura eliminada correctamente.');
    }
}
