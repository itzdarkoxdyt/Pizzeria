@extends('layouts.app')

@section('template_title')
    {{ $employee->name ?? __('Show') . " " . __('Employee') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Employee</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('employees.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>User Id:</strong>
                                    {{ $employee->user_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Position:</strong>
                                    {{ $employee->position }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Identification Number:</strong>
                                    {{ $employee->identification_number }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Salary:</strong>
                                    {{ $employee->salary }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Hire Date:</strong>
                                    {{ $employee->hire_date }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
