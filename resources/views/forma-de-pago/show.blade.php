@extends('adminlte::page')
@section('template_title')
    {{ $formaDePago->name ?? __('Show') . " " . __('Forma De Pago') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Forma De Pago</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('forma-de-pagos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Formapago:</strong>
                                    {{ $formaDePago->id_formapago }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Descripcion Formapago:</strong>
                                    {{ $formaDePago->descripcion_formapago }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
