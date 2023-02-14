@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Product') }}</div>

                <div class="card-body">

                    @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                    @endif

                    <form method="POST" action='{{ route("products.store") }}' enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <input class="form-control" type="text" name="product_name" placeholder="Product Name">
                            @error('title')
                            <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="product_price" placeholder="Price">
                            @error('title')
                            <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="hidden" name="adding_person" placeholder="Price" value="{{(Auth()->user()->name) }}">
                            @error('title')
                            <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <select class="form-control" type="text" name="type" placeholder="Type">
                                <option value="item">Item</option>
                                <option value="service">Service</option>
                            </select>
                            @error('title')
                            <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                           <select class="form-control" type="text" name="status" placeholder="Status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
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