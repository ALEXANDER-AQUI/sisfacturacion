@extends('adminlte::page')

@section('template_title')
    {{ $proveedor->name ?? __('Show') . " " . __('Proveedor') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Proveedor</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('proveedors.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>No Documento:</strong>
                                    {{ $proveedor->no_documento }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cod Tipo Documento:</strong>
                                    {{ $proveedor->cod_tipo_documento }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $proveedor->nombre }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Apellido:</strong>
                                    {{ $proveedor->apellido }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre Comercial:</strong>
                                    {{ $proveedor->nombre_comercial }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Direccion:</strong>
                                    {{ $proveedor->direccion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cod Ciudad:</strong>
                                    {{ $proveedor->cod_ciudad }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Telefono:</strong>
                                    {{ $proveedor->telefono }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
