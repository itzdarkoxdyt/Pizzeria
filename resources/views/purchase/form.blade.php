<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="supplier_id" class="form-label">{{ __('Supplier Id') }}</label>
            <input type="text" name="supplier_id" class="form-control @error('supplier_id') is-invalid @enderror" value="{{ old('supplier_id', $purchase?->supplier_id) }}" id="supplier_id" placeholder="Supplier Id">
            {!! $errors->first('supplier_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="raw_material_id" class="form-label">{{ __('Raw Material Id') }}</label>
            <input type="text" name="raw_material_id" class="form-control @error('raw_material_id') is-invalid @enderror" value="{{ old('raw_material_id', $purchase?->raw_material_id) }}" id="raw_material_id" placeholder="Raw Material Id">
            {!! $errors->first('raw_material_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="quantity" class="form-label">{{ __('Quantity') }}</label>
            <input type="text" name="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity', $purchase?->quantity) }}" id="quantity" placeholder="Quantity">
            {!! $errors->first('quantity', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="purchase_price" class="form-label">{{ __('Purchase Price') }}</label>
            <input type="text" name="purchase_price" class="form-control @error('purchase_price') is-invalid @enderror" value="{{ old('purchase_price', $purchase?->purchase_price) }}" id="purchase_price" placeholder="Purchase Price">
            {!! $errors->first('purchase_price', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="purchase_date" class="form-label">{{ __('Purchase Date') }}</label>
            <input type="text" name="purchase_date" class="form-control @error('purchase_date') is-invalid @enderror" value="{{ old('purchase_date', $purchase?->purchase_date) }}" id="purchase_date" placeholder="Purchase Date">
            {!! $errors->first('purchase_date', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>