@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Category Page</h4>
    </div>
    <div class="card-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <td>Id</td>
            <td>Name</td>
            <td>Description</td>
            <td>Image</td>
            <td>Action</td>
          </tr>
        </thead>
        <tbody>
          @foreach ($category as $item)
            <tr>
              <td>{{ $item->id }}</td>
              <td>{{ $item->name }}</td>
              <td>{{ $item->description }}</td>
              <td>
                <img src="{{ asset('admin/uploads/new/' . $item->image ) }}" class='cate-image' alt="Image is here">
              </td>
              <td>
                <form action="{{ route('categories.destroy', $item->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <a href="{{ route('categories.edit' , $item->id) }}" class = "btn btn-success">Edit</a>
                  <button type="submit" class="btn btn-danger" >Delete</button>
              </form>             
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  
  
  @endsection