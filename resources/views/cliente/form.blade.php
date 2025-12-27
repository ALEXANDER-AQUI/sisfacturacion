<div class="row padding-1 p-1">
    <div class="col-md-12">

        <!-- DOCUMENTO -->
        <div class="form-group mb-2">
            <label class="form-label">Documento</label>
            <input type="text"
                   name="documento"
                   class="form-control @error('documento') is-invalid @enderror"
                   value="{{ old('documento', $cliente?->documento) }}"
                   placeholder="DNI / RUC">
            {!! $errors->first('documento', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <!-- TIPO DOCUMENTO -->
        <div class="form-group mb-2">
            <label class="form-label">Tipo de Documento</label>
            <select name="cod_tipo_documento"
                    class="form-control @error('cod_tipo_documento') is-invalid @enderror">
                <option value="">Seleccione</option>

                @foreach($tiposDocumentos as $id => $descripcion)
                    <option value="{{ $id }}"
                        {{ old('cod_tipo_documento', $cliente?->cod_tipo_documento) == $id ? 'selected' : '' }}>
                        {{ $descripcion }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('cod_tipo_documento', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <!-- NOMBRES -->
        <div class="form-group mb-2">
            <label class="form-label">Nombres</label>
            <input type="text"
                   name="nombres"
                   class="form-control @error('nombres') is-invalid @enderror"
                   value="{{ old('nombres', $cliente?->nombres) }}">
        </div>

        <!-- APELLIDOS -->
        <div class="form-group mb-2">
            <label class="form-label">Apellidos</label>
            <input type="text"
                   name="apellidos"
                   class="form-control @error('apellidos') is-invalid @enderror"
                   value="{{ old('apellidos', $cliente?->apellidos) }}">
        </div>

        <!-- DIRECCIÓN -->
        <div class="form-group mb-2">
            <label class="form-label">Dirección</label>
            <input type="text"
                   name="direccion"
                   class="form-control @error('direccion') is-invalid @enderror"
                   value="{{ old('direccion', $cliente?->direccion) }}">
        </div>

        <!-- CÓDIGO CIUDAD (AUTOMÁTICO) -->
        <div class="form-group mb-2">
            <label class="form-label">Código Ciudad</label>
            <input type="text"
                   id="codigo_ciudad_text"
                   class="form-control"
                   value="{{ old('cod_ciudad', $cliente?->cod_ciudad) }}"
                   readonly>
        </div>

        <!-- CIUDAD -->
        <div class="form-group mb-2">
            <label class="form-label">Ciudad</label>
            <select name="cod_ciudad"
                    id="cod_ciudad"
                    class="form-control @error('cod_ciudad') is-invalid @enderror"
                    onchange="mostrarCodigoCiudad(this)">
                <option value="">Seleccione</option>

                @foreach($ciudades as $codigo => $nombre)
                    <option value="{{ $codigo }}"
                        {{ old('cod_ciudad', $cliente?->cod_ciudad) == $codigo ? 'selected' : '' }}>
                        {{ $nombre }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('cod_ciudad', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <!-- TELÉFONO -->
        <div class="form-group mb-2">
            <label class="form-label">Teléfono</label>
            <input type="text"
                   name="telefono"
                   class="form-control @error('telefono') is-invalid @enderror"
                   value="{{ old('telefono', $cliente?->telefono) }}">
        </div>

    </div>

    <!-- BOTÓN -->
    <div class="col-md-12 mt-3">
        <button type="submit" class="btn btn-primary">
            {{ $cliente?->exists ? 'Actualizar' : 'Guardar' }}
        </button>
    </div>
</div>

<script>
    function mostrarCodigoCiudad(select) {
        document.getElementById('codigo_ciudad_text').value = select.value;
    }

    // Para modo EDIT
    document.addEventListener('DOMContentLoaded', function () {
        const select = document.getElementById('cod_ciudad');
        if (select) {
            mostrarCodigoCiudad(select);
        }
    });
</script>
