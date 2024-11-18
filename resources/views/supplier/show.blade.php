@extends('layouts.app')

@section('template_title')
    {{ $supplier->name ?? __('Show') . " " . __('Supplier') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Supplier</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('suppliers.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Name:</strong>
                                    {{ $supplier->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Contact Info:</strong>
                                    {{ $supplier->contact_info }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
