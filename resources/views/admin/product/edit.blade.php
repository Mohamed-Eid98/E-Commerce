@extends('layouts.admin')

@section('content')
    <div class="card bg-sucess">
        <div class="card-header">
            <h4>Edit and Update Product</h4>
        </div>
            <form action="{{ route('products.update', $product->id)  }}" method="POST" class="border border-primary" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="row">
                    <div class="col md-6 mb-3">
                        <select name="cate_id" value='' class="form-select">
                                <option value="">{{  $product->cate->name; }}</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="">Name</label>
                    <input type="text" value="{{ $product->name }}" class="form-control" name="name">
                </div>

                <div class="col-md-6">
                    <label for="">Slug</label>
                    <input type="text" value="{{ $product->slug }}" class="form-control" name="slug">
                </div>

                <div class="col-md-12">
                    <label for="">Description</label>
                    <textarea name="description" rows="5" class="form-control">{{ $product->small_description }}</textarea>            
                </div>
                        
                <div class="row">
                    <div class="col md-6 mb-3">
                        <label for="">Original Price</label>
                        <input type="number" value="{{ $product->original_price }}" class="form-control" name="original_price">
                    </div>
                    <div class="col md-6 mb-3">
                        <label for="">Selling Price</label>
                        <input type="number" value="{{ $product->selling_price }}" class="form-control" name="selling_price">
                    </div>
                </div>
                <div class="row">
                    <div class="col md-6 mb-3">
                        <label for="">Tax</label>
                        <input type="number" value="{{ $product->tax }}" class="form-control" name="tax">
                    </div>
                    <div class="col md-6 mb-3">
                        <label for="">Quantity</label>
                        <input type="number" value="{{ $product->qty }}" class="form-control" name="quantity">
                    </div>
                </div>
                 <div class="col-md-6 mb-3 mt-3">
                    <label for="" class="">Status</label>
                    <input type="checkbox" {{ $product->status = '1'? 'checked' : '' }} name="status">
                
                    <label for="">Popular</label>
                    <input type="checkbox" {{ $product->status == '1'? 'checked' : '' }} name="popular">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Meta_Title</label>
                    <input type="text" class="form-control" value = "{{ $product->meta_title }}" name="meta_title">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Meta_Keywords</label>
                    <textarea name="meta_keywords" class="form-control" rows="3">{{ $product->meta_keywords }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Meta_Description</label>
                    <textarea name="meta_description" class="form-control" rows="3">{{ $product->meta_description }}</textarea>
                </div>

                @if ($product->image)
                    <div class="col-md-6 mb-6">
                        <img src="{{ asset('admin/uploads/products/'. $product->image)}}" alt="image here">
                    </div>
                @endif
                <div class="col-md-6 mb-3">
                <input type="file"  name="image" class="form-control">
                </div>
                <div class="col-md-6">
                   <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                    
                

            </form>
        </div>
    </div>

    
@endsection