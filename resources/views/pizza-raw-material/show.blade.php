@extends('layouts.app')

@section('template_title')
    {{ $pizzaRawMaterial->name ?? __('Show') . " " . __('Pizza Raw Material') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Pizza Raw Material</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('pizza-raw-materials.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Pizza Id:</strong>
                                    {{ $pizzaRawMaterial->pizza_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Raw Material Id:</strong>
                                    {{ $pizzaRawMaterial->raw_material_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Quantity:</strong>
                                    {{ $pizzaRawMaterial->quantity }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
