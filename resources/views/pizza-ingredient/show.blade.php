@extends('layouts.app')

@section('template_title')
    {{ $pizzaIngredient->name ?? __('Show') . " " . __('Pizza Ingredient') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Pizza Ingredient</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('pizza-ingredients.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Pizza Id:</strong>
                                    {{ $pizzaIngredient->pizza_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Ingredient Id:</strong>
                                    {{ $pizzaIngredient->ingredient_id }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
