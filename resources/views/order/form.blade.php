<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="client_id" class="form-label">{{ __('Client Id') }}</label>
            <input type="text" name="client_id" class="form-control @error('client_id') is-invalid @enderror" value="{{ old('client_id', $order?->client_id) }}" id="client_id" placeholder="Client Id">
            {!! $errors->first('client_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="branch_id" class="form-label">{{ __('Branch Id') }}</label>
            <input type="text" name="branch_id" class="form-control @error('branch_id') is-invalid @enderror" value="{{ old('branch_id', $order?->branch_id) }}" id="branch_id" placeholder="Branch Id">
            {!! $errors->first('branch_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="total_price" class="form-label">{{ __('Total Price') }}</label>
            <input type="text" name="total_price" class="form-control @error('total_price') is-invalid @enderror" value="{{ old('total_price', $order?->total_price) }}" id="total_price" placeholder="Total Price">
            {!! $errors->first('total_price', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="status" class="form-label">{{ __('Status') }}</label>
            <input type="text" name="status" class="form-control @error('status') is-invalid @enderror" value="{{ old('status', $order?->status) }}" id="status" placeholder="Status">
            {!! $errors->first('status', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="delivery_type" class="form-label">{{ __('Delivery Type') }}</label>
            <input type="text" name="delivery_type" class="form-control @error('delivery_type') is-invalid @enderror" value="{{ old('delivery_type', $order?->delivery_type) }}" id="delivery_type" placeholder="Delivery Type">
            {!! $errors->first('delivery_type', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="delivery_person_id" class="form-label">{{ __('Delivery Person Id') }}</label>
            <input type="text" name="delivery_person_id" class="form-control @error('delivery_person_id') is-invalid @enderror" value="{{ old('delivery_person_id', $order?->delivery_person_id) }}" id="delivery_person_id" placeholder="Delivery Person Id">
            {!! $errors->first('delivery_person_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>