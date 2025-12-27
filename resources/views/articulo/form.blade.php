<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_articulo" class="form-label">{{ __('Id Articulo') }}</label>
            <input type="text" name="id_articulo" class="form-control @error('id_articulo') is-invalid @enderror" value="{{ old('id_articulo', $articulo?->id_articulo) }}" id="id_articulo" placeholder="Id Articulo">
            {!! $errors->first('id_articulo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="descripcion" class="form-label">{{ __('Descripcion') }}</label>
            <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{ old('descripcion', $articulo?->descripcion) }}" id="descripcion" placeholder="Descripcion">
            {!! $errors->first('descripcion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="precio_venta" class="form-label">{{ __('Precio Venta') }}</label>
            <input type="text" name="precio_venta" class="form-control @error('precio_venta') is-invalid @enderror" value="{{ old('precio_venta', $articulo?->precio_venta) }}" id="precio_venta" placeholder="Precio Venta">
            {!! $errors->first('precio_venta', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="precio_costo" class="form-label">{{ __('Precio Costo') }}</label>
            <input type="text" name="precio_costo" class="form-control @error('precio_costo') is-invalid @enderror" value="{{ old('precio_costo', $articulo?->precio_costo) }}" id="precio_costo" placeholder="Precio Costo">
            {!! $errors->first('precio_costo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="stock" class="form-label">{{ __('Stock') }}</label>
            <input type="text" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock', $articulo?->stock) }}" id="stock" placeholder="Stock">
            {!! $errors->first('stock', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="cod_tipo_articulo" class="form-label">{{ __('Cod Tipo Articulo') }}</label>
            <input type="text" name="cod_tipo_articulo" class="form-control @error('cod_tipo_articulo') is-invalid @enderror" value="{{ old('cod_tipo_articulo', $articulo?->cod_tipo_articulo) }}" id="cod_tipo_articulo" placeholder="Cod Tipo Articulo">
            {!! $errors->first('cod_tipo_articulo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="cod_proveedor" class="form-label">{{ __('Cod Proveedor') }}</label>
            <input type="text" name="cod_proveedor" class="form-control @error('cod_proveedor') is-invalid @enderror" value="{{ old('cod_proveedor', $articulo?->cod_proveedor) }}" id="cod_proveedor" placeholder="Cod Proveedor">
            {!! $errors->first('cod_proveedor', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_ingreso" class="form-label">{{ __('Fecha Ingreso') }}</label>
            <input type="text" name="fecha_ingreso" class="form-control @error('fecha_ingreso') is-invalid @enderror" value="{{ old('fecha_ingreso', $articulo?->fecha_ingreso) }}" id="fecha_ingreso" placeholder="Fecha Ingreso">
            {!! $errors->first('fecha_ingreso', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>