@extends('adminlte::page')

@section('template_title')
    Devoluciones
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span id="card_title">
                            {{ __('Devoluciones') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('devolucions.create') }}"
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
                                    <th>Motivo</th>
                                    <th>Fecha Devolución</th>
                                    <th>Cantidad</th>
                                    <th width="280px">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($devolucions as $devolucion)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $devolucion->cod_detallefactura }}</td>
                                    <td>{{ $devolucion->cod_factura }}</td>
                                    <td>{{ $devolucion->cod_articulo }}</td>
                                    <td>{{ $devolucion->motivo }}</td>
                                    <td>{{ $devolucion->fecha_devolucion }}</td>
                                    <td>{{ $devolucion->cantidad }}</td>

                                    <td>
                                        <form action="{{ route('devolucions.destroy', $devolucion->cod_detallefactura) }}" method="POST">
                                            <a class="btn btn-sm btn-primary"
                                               href="{{ route('devolucions.show', $devolucion->cod_detallefactura) }}">
                                                Show
                                            </a>

                                            <a class="btn btn-sm btn-success"
                                               href="{{ route('devolucions.edit', $devolucion->cod_detallefactura) }}">
                                                Edit
                                            </a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('¿Eliminar devolución?')">
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

            {!! $devolucions->withQueryString()->links() !!}
        </div>
    </div>
</div>
@endsection
