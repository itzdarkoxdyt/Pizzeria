<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="user_id" class="form-label">{{ __('User Id') }}</label>
            <input type="text" name="user_id" class="form-control @error('user_id') is-invalid @enderror" value="{{ old('user_id', $employee?->user_id) }}" id="user_id" placeholder="User Id">
            {!! $errors->first('user_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="position" class="form-label">{{ __('Position') }}</label>
            <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" value="{{ old('position', $employee?->position) }}" id="position" placeholder="Position">
            {!! $errors->first('position', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="identification_number" class="form-label">{{ __('Identification Number') }}</label>
            <input type="text" name="identification_number" class="form-control @error('identification_number') is-invalid @enderror" value="{{ old('identification_number', $employee?->identification_number) }}" id="identification_number" placeholder="Identification Number">
            {!! $errors->first('identification_number', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="salary" class="form-label">{{ __('Salary') }}</label>
            <input type="text" name="salary" class="form-control @error('salary') is-invalid @enderror" value="{{ old('salary', $employee?->salary) }}" id="salary" placeholder="Salary">
            {!! $errors->first('salary', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="hire_date" class="form-label">{{ __('Hire Date') }}</label>
            <input type="text" name="hire_date" class="form-control @error('hire_date') is-invalid @enderror" value="{{ old('hire_date', $employee?->hire_date) }}" id="hire_date" placeholder="Hire Date">
            {!! $errors->first('hire_date', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>