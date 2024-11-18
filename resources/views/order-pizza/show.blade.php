@extends('layouts.app')

@section('template_title')
    {{ $orderPizza->name ?? __('Show') . " " . __('Order Pizza') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Order Pizza</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('order-pizzas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Order Id:</strong>
                                    {{ $orderPizza->order_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Pizza Size Id:</strong>
                                    {{ $orderPizza->pizza_size_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Quantity:</strong>
                                    {{ $orderPizza->quantity }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
