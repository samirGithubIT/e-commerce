@extends('backend.layout.master')

@section('page-title', 'New product')

@push('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush

@section('content')

<div class="row">
    <div class="col-12 m-auto">
        <div class="card">
            <div class="card-header d-flex">
                <h3>Create a new product</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    <div class="my-4">
                        <label class="form-label">Enter Your product Name</label>
                        <input type="text" class="form-control" name="name">
                      </div>

                      @error('name')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror

                    <div class="my-4">
                        <label class="form-label">Describe about your product</label>
                        <textarea name="description" class="form-control summernote" rows="2"></textarea>
                      </div>

                      @error('description')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror

                    <div class="my-4">
                        <label class="form-label">Selete category</label>
                       <select name="category" class="form-select">

                        <option value="">--Select--</option>
                       @foreach ( $categoryOptions as $category_id => $category_names)
                       
                       <option value="{{ $category_id }}">{{ $category_names }}</option>

                       @endforeach
                       </select>
                       
                       @error('category')
                       <span class="text-danger">{{ $message }}</span>
                       @enderror
                    </div>
                       
                    <div class="my-4">
                        <label class="form-label">ADD a Price</label>
                        <input type="text" class="form-control" name="price">
                      </div>

                      @error('Price')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror

                    <div class="my-4">
                        <label class="form-label">place a Stock quantity</label>
                        <input type="text" class="form-control" name="stock_quantity">
                      </div>

                      @error('Stock_quantity')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror

                    <div class="my-4">
                        <label class="form-label">attach a image </label>
                        <input type="file" class="form-control" name="image">
                      </div>

                      @error('image')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror

                      <button class="btn btn-outline-primary" type="submit">Add</button>
                      <a href="{{ route('admin.product.index') }}" class="btn btn-success ms-3">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js_files')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>
    $(document).ready(function() {
    $('.summernote').summernote({
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
    });
</script>
@endpush
