
@extends('backend.layout.master')

@section('page-title', 'Edit Category')

@section('content')

<div class="row">
    <div class="col-12 m-auto">
        <div class="card">
            <div class="card-header d-flex">
                <h3>Edit <span>{{ $category->name }}</span></h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
                    @csrf 
                    @method('PUT')
                    <div class="my-4">
                        <label class="form-label">Enter Your Category Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $category->name }}">
                      </div>

                      @error('name')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror

                      <button class="btn btn-outline-primary" type="submit">Update</button>
                      <a href="{{ route('admin.category.index') }}" class="btn btn-success ms-3">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection