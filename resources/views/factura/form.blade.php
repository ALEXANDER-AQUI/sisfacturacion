<div class="row">

    {{-- NRO FACTURA AUTOMÁTICO --}}
    <div class="col-md-6 mb-3">
        <label class="form-label">N° Factura</label>
        <input type="number"
               name="nro_factura"
               class="form-control"
               value="{{ old('nro_factura', $factura?->nro_factura) }}"
               readonly>
    </div>

    {{-- CLIENTE --}}
    <div class="col-md-6 mb-3">
        <label class="form-label">Cliente</label>
        <select name="cod_cliente"
                class="form-control @error('cod_cliente') is-invalid @enderror"
                required>
            <option value="">Seleccione cliente</option>
            @foreach($clientes as $doc => $nombre)
                <option value="{{ $doc }}"
                    {{ old('cod_cliente', $factura?->cod_cliente) == $doc ? 'selected' : '' }}>
                    {{ $nombre }}
                </option>
            @endforeach
        </select>
        @error('cod_cliente')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- EMPLEADO --}}
    <div class="col-md-6 mb-3">
        <label class="form-label">Empleado</label>
        <input type="text"
               name="nombre_empleado"
               class="form-control"
               value="{{ old('nombre_empleado', auth()->user()->name ?? '') }}"
               required>
    </div>

    {{-- FECHA --}}
    <div class="col-md-6 mb-3">
        <label class="form-label">Fecha de Facturación</label>
        <input type="date"
               name="fecha_facturacion"
               class="form-control"
               value="{{ old('fecha_facturacion', date('Y-m-d')) }}"
               required>
    </div>

    {{-- FORMA DE PAGO --}}
    <div class="col-md-6 mb-3">
        <label class="form-label">Forma de Pago</label>
        <select name="cod_formapago"
                class="form-control"
                required>
            <option value="">Seleccione</option>
            @foreach($formasPago as $id => $descripcion)
                <option value="{{ $id }}"
                    {{ old('cod_formapago', $factura?->cod_formapago) == $id ? 'selected' : '' }}>
                    {{ $descripcion }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- TOTAL --}}
    <div class="col-md-6 mb-3">
        <label class="form-label">Total</label>
        <input type="number"
               step="0.01"
               name="total_factura"
               class="form-control"
               value="{{ old('total_factura', $factura?->total_factura) }}"
               required>
    </div>

    {{-- BOTÓN UNICO --}}
    <div class="col-md-12 mt-3">
        <button type="submit" class="btn btn-primary">
            {{ $factura?->exists ? 'Actualizar' : 'Guardar' }}
        </button>
    </div>

</div>
