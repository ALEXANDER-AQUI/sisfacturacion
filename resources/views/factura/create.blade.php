@extends('adminlte::page')

@section('template_title')
    {{ __('Create') }} Factura
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Crear Factura</span>
                </div>

                <div class="card-body bg-white">
                    <form method="POST"
                          action="{{ route('facturas.store') }}"
                          role="form">
                        @csrf

                        {{-- FORMULARIO --}}
                        @include('factura.form')

                        {{-- BOTONES --}}
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save"></i> Guardar Factura
                            </button>

                            <a href="{{ route('facturas.index') }}" class="btn btn-secondary">
                                <i class="fa fa-times"></i> Cancelar
                            </a>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
</section>
@endsection
