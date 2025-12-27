<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="codigo_ciudad" class="form-label">{{ __('Codigo Ciudad') }}</label>
            <input type="text" name="codigo_ciudad" class="form-control @error('codigo_ciudad') is-invalid @enderror" value="{{ old('codigo_ciudad', $ciudad?->codigo_ciudad) }}" id="codigo_ciudad" placeholder="Codigo Ciudad">
            {!! $errors->first('codigo_ciudad', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nombre_ciudad" class="form-label">{{ __('Nombre Ciudad') }}</label>
            <input type="text" name="nombre_ciudad" class="form-control @error('nombre_ciudad') is-invalid @enderror" value="{{ old('nombre_ciudad', $ciudad?->nombre_ciudad) }}" id="nombre_ciudad" placeholder="Nombre Ciudad">
            {!! $errors->first('nombre_ciudad', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>