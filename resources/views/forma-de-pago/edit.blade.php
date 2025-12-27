@extends('adminlte::page')

@section('template_title')
    {{ __('Update') }} Forma De Pago
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Forma De Pago</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('forma-de-pagos.update', $formaDePago->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('forma-de-pago.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
