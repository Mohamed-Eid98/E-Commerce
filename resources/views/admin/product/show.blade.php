@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Products</h4>
        </div>
        <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <td>Id</td>
                <td>Category</td>
                <td>Name</td>
                <td>Description</td>
                <td>Image</td>
                <td>Action</td>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->cate->name }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->small_description }}</td>
                    <td>
                       <img src="{{ asset('admin/uploads/products/' .  $product->image  ) }}" class ='cate-image' alt="image here"> 
                    </td>
                    <td>
                        <form action="{{ route('products.destroy', $product->id)  }}" method="POST">
                            @csrf
                            @method('DELETE')
                            {{-- <a href="{{ route('products.showElement' , $product->id) }}" class="btn btn-primary">show</a> --}}
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-success">Edit</a>
                            <button type="submit" class="btn btn-danger">Delete</button>


                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
@endsection

