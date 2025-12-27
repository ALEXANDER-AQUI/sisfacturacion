@extends('adminlte::page')

@section('template_title')
    {{ $tipoDocumento->name ?? __('Show') . " " . __('Tipo Documento') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Tipo Documento</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('tipo-documentos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Tipo Documento:</strong>
                                    {{ $tipoDocumento->id_tipo_documento }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Descripcion:</strong>
                                    {{ $tipoDocumento->descripcion }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
