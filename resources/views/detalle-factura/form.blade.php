<div class="row">

    {{-- FACTURA --}}
    <div class="col-md-6 mb-3">
        <label class="form-label">Factura</label>
        <select name="cod_factura"
                class="form-control @error('cod_factura') is-invalid @enderror"
                required>
            <option value="">Seleccione Factura</option>
            @foreach($facturas as $nro => $fact)
                <option value="{{ $nro }}"
                    {{ old('cod_factura', $detalleFactura?->cod_factura) == $nro ? 'selected' : '' }}>
                    {{ $fact }}
                </option>
            @endforeach
        </select>
        @error('cod_factura')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- ARTICULO --}}
    <div class="col-md-6 mb-3">
        <label class="form-label">Artículo</label>
        <select name="cod_articulo"
                id="cod_articulo"
                class="form-control @error('cod_articulo') is-invalid @enderror"
                required>
            <option value="">Seleccione Artículo</option>
            @foreach($articulos as $id => $data)
                <option value="{{ $id }}"
                    data-precio="{{ $data['precio'] }}"
                    {{ old('cod_articulo', $detalleFactura?->cod_articulo) == $id ? 'selected' : '' }}>
                    {{ $data['descripcion'] }}
                </option>
            @endforeach
        </select>
        @error('cod_articulo')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- CANTIDAD --}}
    <div class="col-md-6 mb-3">
        <label class="form-label">Cantidad</label>
        <input type="number"
               name="cantidad"
               id="cantidad"
               class="form-control @error('cantidad') is-invalid @enderror"
               value="{{ old('cantidad', $detalleFactura?->cantidad) }}"
               min="1"
               required>
        @error('cantidad')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- TOTAL --}}
    <div class="col-md-6 mb-3">
        <label class="form-label">Total</label>
        <input type="number"
               name="total"
               id="total"
               class="form-control"
               value="{{ old('total', $detalleFactura?->total) }}"
               step="0.01"
               readonly>
    </div>

    {{-- BOTÓN --}}
    <div class="col-md-12 mt-3">
        <button type="submit" class="btn btn-primary">
            {{ $detalleFactura?->exists ? 'Actualizar' : 'Guardar' }}
        </button>
        <a href="{{ route('detalle-facturas.index') }}" class="btn btn-secondary">Cancelar</a>
    </div>
</div>

{{-- SCRIPT PARA CALCULAR TOTAL AUTOMÁTICO --}}
<script>
    const articuloSelect = document.getElementById('cod_articulo');
    const cantidadInput = document.getElementById('cantidad');
    const totalInput = document.getElementById('total');

    function calcularTotal() {
        const selectedOption = articuloSelect.options[articuloSelect.selectedIndex];
        const precio = parseFloat(selectedOption.getAttribute('data-precio')) || 0;
        const cantidad = parseFloat(cantidadInput.value) || 0;
        totalInput.value = (precio * cantidad).toFixed(2);
    }

    articuloSelect.addEventListener('change', calcularTotal);
    cantidadInput.addEventListener('input', calcularTotal);
    window.addEventListener('load', calcularTotal);
</script>
