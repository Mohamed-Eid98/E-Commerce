@extends('layouts.front')

@section('title')
{{ $category->name }}
@endsection

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>{{ $category->name }}</h2>
                     @foreach ($products as $prod)
                        <div class="col-md-3 mb-3"> 
                            <a href="{{ url('view category/' . $category->slug . '/'  . $prod->slug ) }}">      
                            <div class="card">
                                <img src="{{ asset('admin/uploads/products/' . $prod->image) }}" class ="user-image" alt="Image">
                            <div class="card body">
                                <h6>{{ $prod->name }}</h6>
                                <span class= 'float-start'>{{ $prod->selling_price }}</span>
                                <span class='float-end'> <s>{{ $prod->original_price }}</s></span>
                            </div>
                            </div>
                        </a>
                        </div>
                 @endforeach
                </div>
         </div>
    </div>
@endsection