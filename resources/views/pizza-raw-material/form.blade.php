<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="pizza_id" class="form-label">{{ __('Pizza Id') }}</label>
            <input type="text" name="pizza_id" class="form-control @error('pizza_id') is-invalid @enderror" value="{{ old('pizza_id', $pizzaRawMaterial?->pizza_id) }}" id="pizza_id" placeholder="Pizza Id">
            {!! $errors->first('pizza_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="raw_material_id" class="form-label">{{ __('Raw Material Id') }}</label>
            <input type="text" name="raw_material_id" class="form-control @error('raw_material_id') is-invalid @enderror" value="{{ old('raw_material_id', $pizzaRawMaterial?->raw_material_id) }}" id="raw_material_id" placeholder="Raw Material Id">
            {!! $errors->first('raw_material_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="quantity" class="form-label">{{ __('Quantity') }}</label>
            <input type="text" name="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity', $pizzaRawMaterial?->quantity) }}" id="quantity" placeholder="Quantity">
            {!! $errors->first('quantity', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>