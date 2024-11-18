@extends('layouts.app')

@section('template_title')
    Order Pizzas
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Order Pizzas') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('order-pizzas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
									<th >Pizza Size Id</th>
									<th >Quantity</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orderPizzas as $orderPizza)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $orderPizza->order_id }}</td>
										<td >{{ $orderPizza->pizza_size_id }}</td>
										<td >{{ $orderPizza->quantity }}</td>

                                            <td>
                                                <form action="{{ route('order-pizzas.destroy', $orderPizza->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('order-pizzas.show', $orderPizza->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('order-pizzas.edit', $orderPizza->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $orderPizzas->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
