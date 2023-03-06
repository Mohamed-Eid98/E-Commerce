@extends('layouts.admin')

@section('content')
    <div class="card bg-sucess">
        <div class="card-header">
            <h4>Add Category</h4>
        </div>
            <form action="{{ route('categories.store') }}" method="POST" class="border border-primary" enctype="multipart/form-data">
            @csrf
                <div class="col-md-6">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="col-md-6">
                    <label for="">Slug</label>
                    <input type="text" class="form-control" name="slug">
                </div>   
                <div class="col-md-12">
                    <label for="">Description</label>
                    <textarea name="description" rows="5" class="form-control"></textarea>            
                </div>
                <div class="col-md-6 mb-3 mt-3">
                    <label for="" class="">Status</label>
                    <input type="checkbox" name="status">
                
                    <label for="">Popular</label>
                    <input type="checkbox" name="popular">
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