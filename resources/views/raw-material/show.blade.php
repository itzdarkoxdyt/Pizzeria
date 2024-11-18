@extends('layouts.app')

@section('template_title')
    {{ $rawMaterial->name ?? __('Show') . " " . __('Raw Material') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Raw Material</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('raw-materials.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Name:</strong>
                                    {{ $rawMaterial->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Unit:</strong>
                                    {{ $rawMaterial->unit }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Current Stock:</strong>
                                    {{ $rawMaterial->current_stock }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
