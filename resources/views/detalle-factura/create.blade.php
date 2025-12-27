@extends('adminlte::page')

@section('template_title')
    Crear Detalle Factura
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Crear Detalle Factura</span>
                </div>
                <div class="card-body bg-white">
                    <form method="POST" action="{{ route('detalle-facturas.store') }}">
                        @csrf
                        @include('detalle-factura.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
