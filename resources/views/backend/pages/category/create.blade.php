@extends('backend.layout.master')

@section('page-title', 'New category')

@section('content')

<div class="row">
    <div class="col-12 m-auto">
        <div class="card">
            <div class="card-header d-flex">
                <h3>Create a new Category</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.category.store') }}" method="POST">
                    @csrf 
                    <div class="my-4">
                        <label class="form-label">Enter Your Category Name</label>
                        <input type="text" class="form-control" name="name">
                      </div>

                      @error('name')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror

                      <button class="btn btn-outline-primary" type="submit">Add</button>
                      <a href="{{ route('admin.category.index') }}" class="btn btn-success ms-3">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
