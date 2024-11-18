<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $rawMaterial?->name) }}" id="name" placeholder="Name">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="unit" class="form-label">{{ __('Unit') }}</label>
            <input type="text" name="unit" class="form-control @error('unit') is-invalid @enderror" value="{{ old('unit', $rawMaterial?->unit) }}" id="unit" placeholder="Unit">
            {!! $errors->first('unit', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="current_stock" class="form-label">{{ __('Current Stock') }}</label>
            <input type="text" name="current_stock" class="form-control @error('current_stock') is-invalid @enderror" value="{{ old('current_stock', $rawMaterial?->current_stock) }}" id="current_stock" placeholder="Current Stock">
            {!! $errors->first('current_stock', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>