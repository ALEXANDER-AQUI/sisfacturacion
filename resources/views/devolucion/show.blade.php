@extends('adminlte::page')

@section('template_title')
    {{ $devolucion->name ?? __('Show') . " " . __('Devolucion') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Devolucion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('devolucions.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Cod Detallefactura:</strong>
                                    {{ $devolucion->cod_detallefactura }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cod Factura:</strong>
                                    {{ $devolucion->cod_factura }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cod Articulo:</strong>
                                    {{ $devolucion->cod_articulo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Motivo:</strong>
                                    {{ $devolucion->motivo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha Devolucion:</strong>
                                    {{ $devolucion->fecha_devolucion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cantidad:</strong>
                                    {{ $devolucion->cantidad }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
