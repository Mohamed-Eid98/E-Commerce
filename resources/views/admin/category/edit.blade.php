@extends('layouts.admin')

@section('content')
    <div class="card bg-sucess">
        <div class="card-header">
            <h4>Edit and Update Category</h4>
        </div>
            <form action="{{ route('categories.update', $category->id)  }}" method="POST" class="border border-primary" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="col-md-6">
                    <label for="">Name</label>
                    <input type="text" value="{{ $category->name }}" class="form-control" name="name">
                </div>
                <div class="col-md-6">
                    <label for="">Slug</label>
                    <input type="text" value="{{ $category->slug }}" class="form-control" name="slug">
                </div>   
                <div class="col-md-12">
                    <label for="">Description</label>
                    <textarea name="description" rows="5" class="form-control">{{ $category->description }}</textarea>            
                </div>
                <div class="col-md-6 mb-3 mt-3">
                    <label for="" class="">Status</label>
                    <input type="checkbox" {{ $category->status = '1'? 'checked' : '' }} name="status">
                
                    <label for="">Popular</label>
                    <input type="checkbox" {{ $category->status == '1'? 'checked' : '' }} name="popular">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Meta_Title</label>
                    <input type="text" class="form-control" value = "{{ $category->meta_title }}" name="meta_title">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Meta_Keywords</label>
                    <textarea name="meta_keywords" class="form-control" rows="3">{{ $category->meta_keywords }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Meta_Description</label>
                    <textarea name="meta_description" class="form-control" rows="3">{{ $category->meta_descrip }}</textarea>
                </div>
                @if ($category->image)
                    <div class="col-md-6 mb-6">
                        <img src="{{ asset('admin/uploads/new/'. $category->image)}}" alt="image here">
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