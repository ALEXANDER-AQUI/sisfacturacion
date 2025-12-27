@extends('adminlte::page')

@section('template_title')
    {{ $tipoArticulo->name ?? __('Show') . " " . __('Tipo Articulo') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Tipo Articulo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('tipo-articulos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Tipoarticulo:</strong>
                                    {{ $tipoArticulo->id_tipoarticulo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Descripcion Articulo:</strong>
                                    {{ $tipoArticulo->descripcion_articulo }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
