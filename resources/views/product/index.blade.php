@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Products') }}</div>

                <div class="card-body">
                    @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                    @endif

                    <p><a class="btn btn-success" href='{{ route("products.create") }}'><i class="fa fa-plus"></i> Create Product</a></p>

                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    Title
                                </th>
                                <th>
                                    Price
                                </th>
                                <th>
                                    Type
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Created 
                                </th>
                                <th width="5%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $product)
                            <tr>
                                <td>
                                    {{ $product->product_name ?? 'N/A' }}
                                </td>
                                 <td>
                                    {{ $product->product_price ?? 'N/A' }}
                                </td>
                                 <td>
                                    {{ $product->type ?? 'N/A' }}
                                </td>
                                  <td>
                          <input data-id="{{$product->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $product->status ? 'checked' : '' }}>
                       </td>

                                <td>
                                  {{ $product->adding_person}} ( {{ optional($product->created_at)->diffForHumans() }} )
                                </td>

                                <td>
                                    <a class="btn btn-success d-block mb-2" href='{{ route("products.edit", $product->id) }}'><i class="fa fa-pencil"></i> Edit</a>

                                    <form method="POST" action="{{ route('products.destroy', $product->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <div class="form-group">
                                            <i class="fa fa-times"></i>
                                            <input type="submit" class="btn btn-danger d-block" value="Delete">
                                        </div>
                                    </form>

                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" align="center">No records found!</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                   {{ @$products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection