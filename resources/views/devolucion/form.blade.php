<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="cod_detallefactura" class="form-label">{{ __('Cod Detallefactura') }}</label>
            <input type="text" name="cod_detallefactura" class="form-control @error('cod_detallefactura') is-invalid @enderror" value="{{ old('cod_detallefactura', $devolucion?->cod_detallefactura) }}" id="cod_detallefactura" placeholder="Cod Detallefactura">
            {!! $errors->first('cod_detallefactura', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="cod_factura" class="form-label">{{ __('Cod Factura') }}</label>
            <input type="text" name="cod_factura" class="form-control @error('cod_factura') is-invalid @enderror" value="{{ old('cod_factura', $devolucion?->cod_factura) }}" id="cod_factura" placeholder="Cod Factura">
            {!! $errors->first('cod_factura', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="cod_articulo" class="form-label">{{ __('Cod Articulo') }}</label>
            <input type="text" name="cod_articulo" class="form-control @error('cod_articulo') is-invalid @enderror" value="{{ old('cod_articulo', $devolucion?->cod_articulo) }}" id="cod_articulo" placeholder="Cod Articulo">
            {!! $errors->first('cod_articulo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="motivo" class="form-label">{{ __('Motivo') }}</label>
            <input type="text" name="motivo" class="form-control @error('motivo') is-invalid @enderror" value="{{ old('motivo', $devolucion?->motivo) }}" id="motivo" placeholder="Motivo">
            {!! $errors->first('motivo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_devolucion" class="form-label">{{ __('Fecha Devolucion') }}</label>
            <input type="text" name="fecha_devolucion" class="form-control @error('fecha_devolucion') is-invalid @enderror" value="{{ old('fecha_devolucion', $devolucion?->fecha_devolucion) }}" id="fecha_devolucion" placeholder="Fecha Devolucion">
            {!! $errors->first('fecha_devolucion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="cantidad" class="form-label">{{ __('Cantidad') }}</label>
            <input type="text" name="cantidad" class="form-control @error('cantidad') is-invalid @enderror" value="{{ old('cantidad', $devolucion?->cantidad) }}" id="cantidad" placeholder="Cantidad">
            {!! $errors->first('cantidad', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>