@extends('adminlte::page')

@section('template_title')
    Detalle Facturas
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span id="card_title">
                            {{ __('Detalle Facturas') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('detalle-facturas.create') }}"
                               class="btn btn-primary btn-sm">
                                {{ __('Create New') }}
                            </a>
                        </div>
                    </div>
                </div>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success m-4">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <div class="card-body bg-white">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>
                                    <th>Cod Detalle</th>
                                    <th>Cod Factura</th>
                                    <th>Cod Artículo</th>
                                    <th>Cantidad</th>
                                    <th>Total</th>
                                    <th width="280px">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($detalleFacturas as $detalleFactura)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $detalleFactura->cod_detallefactura }}</td>
                                    <td>{{ $detalleFactura->cod_factura }}</td>
                                    <td>{{ $detalleFactura->cod_articulo }}</td>
                                    <td>{{ $detalleFactura->cantidad }}</td>
                                    <td>{{ $detalleFactura->total }}</td>
                                    <td>
                                        <form action="{{ route('detalle-facturas.destroy', $detalleFactura->cod_detallefactura) }}" method="POST">
                                            <a class="btn btn-sm btn-primary"
                                               href="{{ route('detalle-facturas.show', $detalleFactura->cod_detallefactura) }}">
                                                Show
                                            </a>

                                            <a class="btn btn-sm btn-success"
                                               href="{{ route('detalle-facturas.edit', $detalleFactura->cod_detallefactura) }}">
                                                Edit
                                            </a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('¿Eliminar este detalle?')">
                                                Delete
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

            {!! $detalleFacturas->withQueryString()->links() !!}
        </div>
    </div>
</div>
@endsection
