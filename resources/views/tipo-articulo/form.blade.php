<div class="row padding-1 p-1">
    <div class="col-md-12">

        {{-- DESCRIPCIÓN DEL TIPO DE ARTÍCULO --}}
        <div class="form-group mb-2 mb20">
            <label for="descripcion_articulo" class="form-label">{{ __('Descripción del Tipo de Artículo') }}</label>
            <input type="text"
                   name="descripcion_articulo"
                   class="form-control @error('descripcion_articulo') is-invalid @enderror"
                   value="{{ old('descripcion_articulo', $tipoArticulo?->descripcion_articulo) }}"
                   id="descripcion_articulo"
                   placeholder="Ingrese la descripción"
                   required>
            @error('descripcion_articulo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

    </div>

    {{-- BOTÓN --}}
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">
            {{ $tipoArticulo?->exists ? 'Actualizar' : 'Guardar' }}
        </button>
        <a href="{{ route('tipo-articulos.index') }}" class="btn btn-secondary">Cancelar</a>
    </div>
</div>
