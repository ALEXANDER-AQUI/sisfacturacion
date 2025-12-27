@extends('adminlte::page')

@section('template_title')
    Editar Detalle Factura
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Editar Detalle Factura</span>
                </div>
                <div class="card-body bg-white">
                    <form method="POST" action="{{ route('detalle-facturas.update', $detalleFactura->cod_detallefactura) }}">
                        @csrf
                        @method('PATCH')

                        {{-- Incluimos el formulario --}}
                        @include('detalle-factura.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
