@extends('adminlte::page')

@section('template_title')
    Forma De Pagos
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span id="card_title">
                            {{ __('Forma De Pagos') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('forma-de-pagos.create') }}"
                               class="btn btn-primary btn-sm">
                                {{ __('Create New') }}
                            </a>
                        </div>
                    </div>
                </div>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success m-4">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <div class="card-body bg-white">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>
                                    <th>Id Forma Pago</th>
                                    <th>Descripción</th>
                                    <th width="280px">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($formaDePagos as $formaDePago)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $formaDePago->id_formapago }}</td>
                                    <td>{{ $formaDePago->descripcion_formapago }}</td>
                                    <td>
                                        <form action="{{ route('forma-de-pagos.destroy', $formaDePago->id_formapago) }}" method="POST">
                                            <a class="btn btn-sm btn-primary"
                                               href="{{ route('forma-de-pagos.show', $formaDePago->id_formapago) }}">
                                                <i class="fa fa-fw fa-eye"></i> Show
                                            </a>

                                            <a class="btn btn-sm btn-success"
                                               href="{{ route('forma-de-pagos.edit', $formaDePago->id_formapago) }}">
                                                <i class="fa fa-fw fa-edit"></i> Edit
                                            </a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('¿Seguro que deseas eliminar este registro?')">
                                                <i class="fa fa-fw fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {!! $formaDePagos->withQueryString()->links() !!}
        </div>
    </div>
</div>
@endsection
