@extends('adminlte::page')

@section('template_title')
    {{ $detalleFactura->name ?? __('Show') . " " . __('Detalle Factura') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Detalle Factura</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('detalle-facturas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Cod Detallefactura:</strong>
                                    {{ $detalleFactura->cod_detallefactura }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cod Factura:</strong>
                                    {{ $detalleFactura->cod_factura }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cod Articulo:</strong>
                                    {{ $detalleFactura->cod_articulo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cantidad:</strong>
                                    {{ $detalleFactura->cantidad }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Total:</strong>
                                    {{ $detalleFactura->total }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
