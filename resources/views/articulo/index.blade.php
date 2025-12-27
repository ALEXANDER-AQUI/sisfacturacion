@extends('adminlte::page')

@section('template_title')
    Articulos
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span id="card_title">
                            {{ __('Articulos') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('articulos.create') }}"
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
                                    <th>ID</th>
                                    <th>Descripción</th>
                                    <th>Precio Venta</th>
                                    <th>Precio Costo</th>
                                    <th>Stock</th>
                                    <th>Tipo Artículo</th>
                                    <th>Proveedor</th>
                                    <th>Fecha Ingreso</th>
                                    <th width="280px">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($articulos as $articulo)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $articulo->id_articulo }}</td>
                                    <td>{{ $articulo->descripcion }}</td>
                                    <td>{{ $articulo->precio_venta }}</td>
                                    <td>{{ $articulo->precio_costo }}</td>
                                    <td>{{ $articulo->stock }}</td>
                                    <td>{{ $articulo->cod_tipo_articulo }}</td>
                                    <td>{{ $articulo->cod_proveedor }}</td>
                                    <td>{{ $articulo->fecha_ingreso }}</td>

                                    <td>
                                        <form action="{{ route('articulos.destroy', $articulo->id_articulo) }}" method="POST">
                                            <a class="btn btn-sm btn-primary"
                                               href="{{ route('articulos.show', $articulo->id_articulo) }}">
                                                Show
                                            </a>

                                            <a class="btn btn-sm btn-success"
                                               href="{{ route('articulos.edit', $articulo->id_articulo) }}">
                                                Edit
                                            </a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('¿Eliminar artículo?')">
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

            {!! $articulos->withQueryString()->links() !!}
        </div>
    </div>
</div>
@endsection
