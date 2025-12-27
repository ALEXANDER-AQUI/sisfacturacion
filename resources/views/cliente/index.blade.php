@extends('adminlte::page')

@section('template_title')
    Clientes
@endsection

@section('content')
<div class="container-fluid">

    {{-- BUSCADOR --}}
    <form action="{{ route('clientes.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text"
                   name="busqueda"
                   class="form-control"
                   placeholder="Buscar por documento, nombre o apellido..."
                   value="{{ request('busqueda') }}">

            <button class="btn btn-primary">
                <i class="fa fa-search"></i> Buscar
            </button>

            @if(request('busqueda'))
                <a href="{{ route('clientes.index') }}" class="btn btn-secondary">
                    <i class="fa fa-times"></i> Limpiar
                </a>
            @endif
        </div>
    </form>

    <div class="row">
        <div class="col-sm-12">
            <div class="card">

                {{-- HEADER --}}
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span class="card-title">Clientes</span>

                    <a href="{{ route('clientes.create') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i> Nuevo Cliente
                    </a>
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
                        <table class="table table-striped table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Documento</th>
                                    <th>Tipo Doc.</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Dirección</th>
                                    <th>Ciudad</th>
                                    <th>Teléfono</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($clientes as $cliente)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $cliente->documento }}</td>

                                        <td>
                                            {{ $cliente->tipoDocumento?->descripcion ?? '—' }}
                                        </td>

                                        <td>{{ $cliente->nombres }}</td>
                                        <td>{{ $cliente->apellidos }}</td>
                                        <td>{{ $cliente->direccion }}</td>

                                        <td>
                                            {{ $cliente->ciudad?->nombre_ciudad ?? '—' }}
                                        </td>

                                        <td>{{ $cliente->telefono }}</td>

                                        <td class="text-center">
                                            <form action="{{ route('clientes.destroy', $cliente->documento) }}" method="POST">
                                                <a class="btn btn-sm btn-primary"
                                                   href="{{ route('clientes.show', $cliente->documento) }}">
                                                    <i class="fa fa-eye"></i>
                                                </a>

                                                <a class="btn btn-sm btn-success"
                                                   href="{{ route('clientes.edit', $cliente->documento) }}">
                                                    <i class="fa fa-edit"></i>
                                                </a>

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="btn btn-sm btn-danger"
                                                        onclick="return confirm('¿Seguro de eliminar este cliente?')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center text-muted">
                                            No hay clientes registrados
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- PAGINACIÓN --}}
                    <div class="mt-3">
                        {!! $clientes->links() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection
