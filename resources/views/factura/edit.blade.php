@extends('adminlte::page')

@section('template_title')
    {{ __('Update') }} Factura
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">{{ __('Update') }} Factura</span>
                </div>
                <div class="card-body bg-white">
                    <form method="POST" action="{{ route('facturas.update', $factura->nro_factura) }}" role="form" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        @include('factura.form')

                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Actualizar') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
