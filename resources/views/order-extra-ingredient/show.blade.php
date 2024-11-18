@extends('layouts.app')

@section('template_title')
    {{ $orderExtraIngredient->name ?? __('Show') . " " . __('Order Extra Ingredient') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Order Extra Ingredient</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('order-extra-ingredients.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Order Id:</strong>
                                    {{ $orderExtraIngredient->order_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Extra Ingredient Id:</strong>
                                    {{ $orderExtraIngredient->extra_ingredient_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Quantity:</strong>
                                    {{ $orderExtraIngredient->quantity }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
