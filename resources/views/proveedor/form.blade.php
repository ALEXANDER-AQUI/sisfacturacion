<div class="row padding-1 p-1">

    <!-- Número Documento -->
    <div class="form-group col-md-6">
        <label for="no_documento">N° Documento</label>
        <input type="text"
               name="no_documento"
               class="form-control @error('no_documento') is-invalid @enderror"
               value="{{ old('no_documento', $proveedor->no_documento) }}"
               {{ $proveedor->exists ? 'readonly' : '' }}>
        {!! $errors->first('no_documento', '<div class="invalid-feedback">:message</div>') !!}
    </div>

    <!-- Tipo Documento -->
    <div class="form-group col-md-6">
        <label for="cod_tipo_documento">Tipo Documento</label>
        <select name="cod_tipo_documento"
                class="form-control @error('cod_tipo_documento') is-invalid @enderror">
            <option value="">Seleccione</option>
            @foreach($tiposDocumentos as $id => $desc)
                <option value="{{ $id }}"
                    {{ old('cod_tipo_documento', $proveedor->cod_tipo_documento) == $id ? 'selected' : '' }}>
                    {{ $desc }}
                </option>
            @endforeach
        </select>
        {!! $errors->first('cod_tipo_documento', '<div class="invalid-feedback">:message</div>') !!}
    </div>

    <!-- Nombre -->
    <div class="form-group col-md-6">
        <label>Nombre</label>
        <input type="text" name="nombre" class="form-control"
               value="{{ old('nombre', $proveedor->nombre) }}">
    </div>

    <!-- Apellido -->
    <div class="form-group col-md-6">
        <label>Apellido</label>
        <input type="text" name="apellido" class="form-control"
               value="{{ old('apellido', $proveedor->apellido) }}">
    </div>

    <!-- Nombre Comercial -->
    <div class="form-group col-md-6">
        <label>Nombre Comercial</label>
        <input type="text" name="nombre_comercial" class="form-control"
               value="{{ old('nombre_comercial', $proveedor->nombre_comercial) }}">
    </div>

    <!-- Dirección -->
    <div class="form-group col-md-6">
        <label>Dirección</label>
        <input type="text" name="direccion" class="form-control"
               value="{{ old('direccion', $proveedor->direccion) }}">
    </div>

    <!-- Ciudad -->
    <div class="form-group col-md-6">
        <label>Ciudad</label>
        <select name="cod_ciudad" class="form-control">
            <option value="">Seleccione</option>
            @foreach($ciudades as $id => $nombre)
                <option value="{{ $id }}"
                    {{ old('cod_ciudad', $proveedor->cod_ciudad) == $id ? 'selected' : '' }}>
                    {{ $nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Teléfono -->
    <div class="form-group col-md-6">
        <label>Teléfono</label>
        <input type="text" name="telefono" class="form-control"
               value="{{ old('telefono', $proveedor->telefono) }}">
    </div>

    <!-- BOTÓN -->
    <div class="form-group col-md-12 mt-3">
        <button type="submit" class="btn btn-primary">
            {{ $proveedor->exists ? 'Actualizar' : 'Guardar' }}
        </button>
    </div>

</div>
