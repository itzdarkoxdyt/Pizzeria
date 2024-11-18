<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="pizza_id" class="form-label">{{ __('Pizza Id') }}</label>
            <input type="text" name="pizza_id" class="form-control @error('pizza_id') is-invalid @enderror" value="{{ old('pizza_id', $pizzaIngredient?->pizza_id) }}" id="pizza_id" placeholder="Pizza Id">
            {!! $errors->first('pizza_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="ingredient_id" class="form-label">{{ __('Ingredient Id') }}</label>
            <input type="text" name="ingredient_id" class="form-control @error('ingredient_id') is-invalid @enderror" value="{{ old('ingredient_id', $pizzaIngredient?->ingredient_id) }}" id="ingredient_id" placeholder="Ingredient Id">
            {!! $errors->first('ingredient_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>