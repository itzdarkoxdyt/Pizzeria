@extends('layouts.app')

@section('template_title')
    {{ $purchase->name ?? __('Show') . " " . __('Purchase') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Purchase</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('purchases.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Supplier Id:</strong>
                                    {{ $purchase->supplier_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Raw Material Id:</strong>
                                    {{ $purchase->raw_material_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Quantity:</strong>
                                    {{ $purchase->quantity }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Purchase Price:</strong>
                                    {{ $purchase->purchase_price }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Purchase Date:</strong>
                                    {{ $purchase->purchase_date }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
