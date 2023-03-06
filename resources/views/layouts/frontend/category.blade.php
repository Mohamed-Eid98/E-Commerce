@extends('layouts.front')

@section('title')
    Category
@endsection

@section('content')
<div class="py-4">
    <div class="container">
        <div class="row">
            <h2>All Categories</h2>
            <div class="col-md-12">
                <div class="row">
                @foreach ($category as $cate)
                <div class="col-md-4 mb-3">
                    <a href="{{ url('view category/'. $cate->slug) }}">
                    <div class="card"  >
                        <img src="{{ asset('admin/uploads/new/' . $cate->image) }}" class="card-img-top user-image" alt="cateegory image">
                        <div class="card-body">
                        <h5 class="card-title"> {{ $cate->name }}</h5>
                        <p class="card-text">{{ $cate->description }}</p>
                        </div>
                    </div>
                </a>
                </div>
                @endforeach
            </div>
        </div>
        </div>
    </div>
</div>

@endsection