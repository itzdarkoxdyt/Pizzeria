<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="order_id" class="form-label">{{ __('Order Id') }}</label>
            <input type="text" name="order_id" class="form-control @error('order_id') is-invalid @enderror" value="{{ old('order_id', $orderPizza?->order_id) }}" id="order_id" placeholder="Order Id">
            {!! $errors->first('order_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="pizza_size_id" class="form-label">{{ __('Pizza Size Id') }}</label>
            <input type="text" name="pizza_size_id" class="form-control @error('pizza_size_id') is-invalid @enderror" value="{{ old('pizza_size_id', $orderPizza?->pizza_size_id) }}" id="pizza_size_id" placeholder="Pizza Size Id">
            {!! $errors->first('pizza_size_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="quantity" class="form-label">{{ __('Quantity') }}</label>
            <input type="text" name="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity', $orderPizza?->quantity) }}" id="quantity" placeholder="Quantity">
            {!! $errors->first('quantity', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>