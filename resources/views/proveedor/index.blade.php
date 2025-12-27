@extends('adminlte::page')

@section('template_title')
    Proveedors
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Proveedors') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('proveedors.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
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
                                        <th>No Documento</th>
                                        <th>Cod Tipo Documento</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Nombre Comercial</th>
                                        <th>Direccion</th>
                                        <th>Cod Ciudad</th>
                                        <th>Telefono</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proveedors as $proveedor)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $proveedor->no_documento }}</td>
                                            <td>{{ $proveedor->cod_tipo_documento }}</td>
                                            <td>{{ $proveedor->nombre }}</td>
                                            <td>{{ $proveedor->apellido }}</td>
                                            <td>{{ $proveedor->nombre_comercial }}</td>
                                            <td>{{ $proveedor->direccion }}</td>
                                            <td>{{ $proveedor->cod_ciudad }}</td>
                                            <td>{{ $proveedor->telefono }}</td>

                                            <td>
                                                <form action="{{ route('proveedors.destroy', $proveedor) }}" method="POST">

                                                    <a class="btn btn-sm btn-primary" href="{{ route('proveedors.show', $proveedor) }}">
                                                        <i class="fa fa-fw fa-eye"></i> {{ __('Show') }}
                                                    </a>

                                                    <a class="btn btn-sm btn-success" href="{{ route('proveedors.edit', $proveedor) }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}
                                                    </a>

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit"
                                                        class="btn btn-danger btn-sm"
                                                        onclick="event.preventDefault(); if (confirm('Are you sure to delete?')) this.closest('form').submit();">
                                                        <i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}
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

                {!! $proveedors->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
