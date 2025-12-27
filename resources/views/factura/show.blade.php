@extends('adminlte::page')

@section('template_title')
    {{ $factura->name ?? __('Show') . " " . __('Factura') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Factura</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('facturas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Nro Factura:</strong>
                                    {{ $factura->nro_factura }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cod Cliente:</strong>
                                    {{ $factura->cod_cliente }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre Empleado:</strong>
                                    {{ $factura->nombre_empleado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha Facturacion:</strong>
                                    {{ $factura->fecha_facturacion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cod Formapago:</strong>
                                    {{ $factura->cod_formapago }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Total Factura:</strong>
                                    {{ $factura->total_factura }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Iva:</strong>
                                    {{ $factura->iva }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
