@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Add Product</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update-product/'.$products->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <select class="form-select">
                            <option value="">{{ $products->category->name }}</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="">Name</label>
                        <input type="text" class="form-control" value="{{ $products->name }}" name="name">
                    </div>
                    <div class="col-md-6">
                        <label for="">Slug</label>
                            <input type="text" class="form-control" value="{{ $products->slug }}"v name="slug">
                    </div>
                    
                    <div class="col-md-12">
                        <label for="">Description</label>
                        <textarea name="description" rows="3" class="form-control">{{ $products->name }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="">Original Price</label>
                        <input type="number" class="form-control" value="{{ $products->original_price }}" name="original_price">
                    </div>
                    <div class="col-md-6">
                        <label for="">Selling Price</label>
                        <input type="number" class="form-control" value="{{ $products->selling_price }}" name="selling_price">
                    </div>
                    <div class="col-md-6">
                        <label for="">Tax</label>
                        <input type="number" class="form-control" value="{{ $products->tax }}" name="tax">
                    </div>
                    <div class="col-md-6">
                        <label for="">Quantity</label>
                        <input type="number" class="form-control" value="{{ $products->qty }}" name="qty">
                    </div>
                    <div class="col-md-6">
                        <label for="">Status</label>
                            <input type="checkbox" {{ $products->status == '1' ? 'checked' : '' }}  name="status">
                    </div>
                    <div class="col-md-6">
                        <label for="">Trending</label>
                            <input type="checkbox" {{ $products->trending == '1' ? 'checked' : '' }}  name="trending">
                    </div>
                    @if($products->image)
                        <img src="{{ asset('assets/uploads/products'.$products->image) }}" alt="image">
                    @endif
                    <div class="col-md-12">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection