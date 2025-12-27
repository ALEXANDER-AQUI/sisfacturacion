<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_formapago" class="form-label">{{ __('Id Formapago') }}</label>
            <input type="text" name="id_formapago" class="form-control @error('id_formapago') is-invalid @enderror" value="{{ old('id_formapago', $formaDePago?->id_formapago) }}" id="id_formapago" placeholder="Id Formapago">
            {!! $errors->first('id_formapago', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="descripcion_formapago" class="form-label">{{ __('Descripcion Formapago') }}</label>
            <input type="text" name="descripcion_formapago" class="form-control @error('descripcion_formapago') is-invalid @enderror" value="{{ old('descripcion_formapago', $formaDePago?->descripcion_formapago) }}" id="descripcion_formapago" placeholder="Descripcion Formapago">
            {!! $errors->first('descripcion_formapago', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>