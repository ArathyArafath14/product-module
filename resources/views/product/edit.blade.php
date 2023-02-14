@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Product') }}</div>

                <div class="card-body">
                    @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                    @endif

                    <form method="POST" action='{{ route("products.update", $product->id) }}' enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <input class="form-control" type="text" name="product_name" placeholder="Product Name" value="{{$product->product_name}}">
                            @error('title')
                            <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="product_price" placeholder="Price" value="{{$product->product_price}}">
                            @error('title')
                            <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="adding_person" placeholder="Price" value="{{(Auth()->user()->name) }}">
                            @error('title')
                            <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <select class="form-control" type="text" name="type" placeholder="Type">
                                <option value="item" @if($product->type=='item') Selected @endif >Item</option>
                                <option value="service" @if($product->type=='service') Selected @endif >Service</option>
                            </select>
                            @error('title')
                            <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                           <select class="form-control" type="text" name="status" placeholder="Status">
                                <option value="1" @if($product->status ==1) Selected @endif>Active</option>
                                <option value="0" @if($product->status ==0) Selected @endif>Inactive</option>
                            </select>
                            @error('title')
                            <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>


                        <div class="form-group">
                            <a class="btn btn-danger mr-1" href='{{ route("products.index") }}' type="submit">Cancel</a>
                            <button class="btn btn-success" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection