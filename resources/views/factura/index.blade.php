@extends('adminlte::page')

@section('template_title')
    Facturas
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">

                {{-- HEADER --}}
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <span id="card_title">
                            {{ __('Facturas') }}
                        </span>

                        <a href="{{ route('facturas.create') }}"
                           class="btn btn-primary btn-sm">
                            {{ __('Nueva Factura') }}
                        </a>
                    </div>
                </div>

                {{-- MENSAJE --}}
                @if ($message = Session::get('success'))
                    <div class="alert alert-success m-3">
                        {{ $message }}
                    </div>
                @endif

                {{-- TABLA --}}
                <div class="card-body bg-white">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>N° Factura</th>
                                    <th>Cliente</th>
                                    <th>Empleado</th>
                                    <th>Fecha</th>
                                    <th>Forma de Pago</th>
                                    <th>Total</th>
                                    <th width="200">Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($facturas as $factura)
                                    <tr>
                                        <td>{{ $loop->iteration + (($facturas->currentPage()-1) * $facturas->perPage()) }}</td>
                                        <td>{{ $factura->nro_factura }}</td>
                                        <td>{{ $factura->cliente->nombres ?? '' }} {{ $factura->cliente->apellidos ?? '' }} - {{ $factura->cliente->documento ?? '' }}</td>
                                        <td>{{ $factura->nombre_empleado }}</td>
                                        <td>{{ $factura->fecha_facturacion }}</td>
                                        <td>{{ $factura->formaPago->descripcion_formapago ?? '' }}</td>
                                        <td>{{ $factura->total_factura }}</td>

                                        <td>
                                            <form action="{{ route('facturas.destroy', $factura->nro_factura) }}" method="POST">
                                                <a class="btn btn-sm btn-primary"
                                                   href="{{ route('facturas.show', $factura->nro_factura) }}">
                                                    <i class="fa fa-eye"></i>
                                                </a>

                                                <a class="btn btn-sm btn-success"
                                                   href="{{ route('facturas.edit', $factura->nro_factura) }}">
                                                    <i class="fa fa-edit"></i>
                                                </a>

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="btn btn-danger btn-sm"
                                                        onclick="return confirm('¿Seguro que deseas eliminar esta factura?')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            {{-- PAGINACIÓN --}}
            {!! $facturas->withQueryString()->links() !!}
        </div>
    </div>
</div>
@endsection
