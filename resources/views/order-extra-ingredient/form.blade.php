<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="order_id" class="form-label">{{ __('Order Id') }}</label>
            <input type="text" name="order_id" class="form-control @error('order_id') is-invalid @enderror" value="{{ old('order_id', $orderExtraIngredient?->order_id) }}" id="order_id" placeholder="Order Id">
            {!! $errors->first('order_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="extra_ingredient_id" class="form-label">{{ __('Extra Ingredient Id') }}</label>
            <input type="text" name="extra_ingredient_id" class="form-control @error('extra_ingredient_id') is-invalid @enderror" value="{{ old('extra_ingredient_id', $orderExtraIngredient?->extra_ingredient_id) }}" id="extra_ingredient_id" placeholder="Extra Ingredient Id">
            {!! $errors->first('extra_ingredient_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="quantity" class="form-label">{{ __('Quantity') }}</label>
            <input type="text" name="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity', $orderExtraIngredient?->quantity) }}" id="quantity" placeholder="Quantity">
            {!! $errors->first('quantity', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>