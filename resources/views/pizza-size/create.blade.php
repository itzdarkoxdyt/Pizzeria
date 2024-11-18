@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Pizza Size
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Pizza Size</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('pizza-sizes.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('pizza-size.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
