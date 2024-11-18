@extends('layouts.app')

@section('template_title')
    Order Extra Ingredients
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Order Extra Ingredients') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('order-extra-ingredients.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
									<th >Order Id</th>
									<th >Extra Ingredient Id</th>
									<th >Quantity</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orderExtraIngredients as $orderExtraIngredient)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $orderExtraIngredient->order_id }}</td>
										<td >{{ $orderExtraIngredient->extra_ingredient_id }}</td>
										<td >{{ $orderExtraIngredient->quantity }}</td>

                                            <td>
                                                <form action="{{ route('order-extra-ingredients.destroy', $orderExtraIngredient->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('order-extra-ingredients.show', $orderExtraIngredient->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('order-extra-ingredients.edit', $orderExtraIngredient->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $orderExtraIngredients->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
