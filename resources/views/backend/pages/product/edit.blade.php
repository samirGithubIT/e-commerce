
@extends('backend.layout.master')

@section('page-title', 'Edit product')

@section('content')

<div class="row">
    <div class="col-12 m-auto">
        <div class="card">
            <div class="card-header d-flex">
                <h3>Edit <span>{{ $product->name }}</span></h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    @method('PUT')
                    <div class="my-4">
                        <label class="form-label">Enter Your product Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $product->name ?? '' }}">
                      </div>

                      @error('name')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror

                    <div class="my-4">
                        <label class="form-label">Describe about your product</label>
                        <textarea name="description" class="form-control summernote" rows="2">{{ $product->description }}"</textarea>
                      </div>

                      @error('description')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror

                    <div class="my-4">
                        <label class="form-label">Selete category</label>
                       <select name="category" class="form-select">

                        <option>--Select--</option>
                       @foreach ( $categoryOptions as $category_id => $category_names)
                       
                       <option value="{{ $category_id }}"
                       
                       @if ($product->category_id == $category_id)
                           selected
                       @endif

                       >{{ $category_names }}</option>

                       @endforeach
                       </select>
                      </div>

                      @error('category')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror

                    <div class="my-4">
                        <label class="form-label">ADD a Price</label>
                        <input type="text" class="form-control" name="price" value="{{ $product->price ?? '' }}">
                      </div>

                      @error('price')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror

                    <div class="my-4">
                        <label class="form-label">place a Stock quantity</label>
                        <input type="text" class="form-control" name="stock_quantity" value="{{ $product->stock_quantity ?? '' }}">
                      </div>

                      @error('stock_quantity')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror

                    <div class="my-4">
                        <label class="form-label">attach a image </label>
                        <div>
                            <img src="{{ Storage::url($product->image) }}" width="130" class="img-fluid">
                        </div>
                        <input type="file" class="form-control" name="image">
                      </div>

                      @error('image')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror

                      <button class="btn btn-outline-primary" type="submit">Update</button>
                      <a href="{{ route('admin.product.index') }}" class="btn btn-success ms-3">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection