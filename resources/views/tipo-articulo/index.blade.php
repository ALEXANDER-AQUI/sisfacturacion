@extends('adminlte::page')

@section('template_title')
    Tipo Articulos
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span id="card_title">
                            {{ __('Tipo Articulos') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('tipo-articulos.create') }}"
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
                                    <th>Id Tipo Artículo</th>
                                    <th>Descripción</th>
                                    <th width="280px">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($tipoArticulos as $tipoArticulo)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $tipoArticulo->id_tipoarticulo }}</td>
                                    <td>{{ $tipoArticulo->descripcion_articulo }}</td>
                                    <td>
                                        <form action="{{ route('tipo-articulos.destroy', $tipoArticulo->id_tipoarticulo) }}" method="POST">
                                            <a class="btn btn-sm btn-primary"
                                               href="{{ route('tipo-articulos.show', $tipoArticulo->id_tipoarticulo) }}">
                                                Show
                                            </a>

                                            <a class="btn btn-sm btn-success"
                                               href="{{ route('tipo-articulos.edit', $tipoArticulo->id_tipoarticulo) }}">
                                                Edit
                                            </a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('¿Eliminar tipo de artículo?')">
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

            {!! $tipoArticulos->withQueryString()->links() !!}
        </div>
    </div>
</div>
@endsection
