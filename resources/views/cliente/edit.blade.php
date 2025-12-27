@extends('adminlte::page')

@section('template_title')
    Actualizar Cliente
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Actualizar Cliente</span>
                </div>

                <div class="card-body bg-white">
                    <form method="POST"
                          action="{{ route('clientes.update', $cliente->documento) }}"
                          role="form">

                        @csrf
                        @method('PUT')

                        @include('cliente.form')

                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
