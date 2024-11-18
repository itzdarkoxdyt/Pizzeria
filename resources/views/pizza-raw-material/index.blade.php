@extends('layouts.app')

@section('template_title')
    Pizza Raw Materials
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Pizza Raw Materials') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('pizza-raw-materials.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Pizza Id</th>
									<th >Raw Material Id</th>
									<th >Quantity</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pizzaRawMaterials as $pizzaRawMaterial)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $pizzaRawMaterial->pizza_id }}</td>
										<td >{{ $pizzaRawMaterial->raw_material_id }}</td>
										<td >{{ $pizzaRawMaterial->quantity }}</td>

                                            <td>
                                                <form action="{{ route('pizza-raw-materials.destroy', $pizzaRawMaterial->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('pizza-raw-materials.show', $pizzaRawMaterial->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('pizza-raw-materials.edit', $pizzaRawMaterial->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $pizzaRawMaterials->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
