@extends('layouts.admin')

@section('content')
    <div class="card bg-sucess">
        <div class="card-header">
            <h4>Add Product</h4>
        </div>
            <form action="{{ route('products.store') }}" method="POST" class="border border-primary" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col md-6 mb-3">
                    <select name="cate_id" value='' class="form-select">
                        <option selected> Select a Category</option>
                        @foreach ($category as $item)
                            <option value="{{ $item->id }}">{{  $item->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name">
                </div>  
                <div class="col-md-6">
                    <label for="">Slug</label>
                    <input type="text" class="form-control" name="slug">
                </div>
            </div>   
                <div class="col-md-12">
                    <label for="">Small Description</label>
                    <textarea name="description" rows="3" class="form-control"></textarea>            
                </div>

        <div class="row">
            <div class="col md-6 mb-3">
                <label for="">Original Price</label>
                <input type="number" class="form-control" name="original_price">
            </div>
            <div class="col md-6 mb-3">
                <label for="">Selling Price</label>
                <input type="number" class="form-control" name="selling_price">
            </div>
        </div>
        <div class="row">
            <div class="col md-6 mb-3">
                <label for="">Tax</label>
                <input type="number" class="form-control" name="tax">
            </div>
            <div class="col md-6 mb-3">
                <label for="">Quantity</label>
                <input type="number" class="form-control" name="quantity">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="" class="">Status</label>
                <input type="checkbox" name="status">
            </div>
            <div class="col-md-6 mb-3"> 
                <label for="">Trending</label>
                <input type="checkbox" name="trending">
            </div>
        </div>
        
            <div class="col-md-6 mb-3">
                <label for="">Meta_Title</label>
                <input type="text" class="form-control" name="meta_title">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Meta_Keywords</label>
                <textarea name="meta_keywords" class="form-control" rows="3"></textarea>
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Meta_Description</label>
                <textarea name="meta_description" class="form-control" rows="3"></textarea>
            </div>
            <div class="col-md-6 mb-3">
            <input type="file" name="image" class="form-control">
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
                
                
            </form>
        </div>
    </div>

    
@endsection