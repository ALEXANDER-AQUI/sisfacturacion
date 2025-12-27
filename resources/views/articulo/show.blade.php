@extends('adminlte::page')

@section('template_title')
    {{ $articulo->name ?? __('Show') . " " . __('Articulo') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Articulo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('articulos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Articulo:</strong>
                                    {{ $articulo->id_articulo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Descripcion:</strong>
                                    {{ $articulo->descripcion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Precio Venta:</strong>
                                    {{ $articulo->precio_venta }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Precio Costo:</strong>
                                    {{ $articulo->precio_costo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Stock:</strong>
                                    {{ $articulo->stock }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cod Tipo Articulo:</strong>
                                    {{ $articulo->cod_tipo_articulo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cod Proveedor:</strong>
                                    {{ $articulo->cod_proveedor }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha Ingreso:</strong>
                                    {{ $articulo->fecha_ingreso }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
