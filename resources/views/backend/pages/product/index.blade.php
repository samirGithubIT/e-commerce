@extends('backend.layout.master')

@section('page-title', 'product list')

@section('content')

<div class="row">
    <div class="col-12 m-auto">
        <div class="card">
            <div class="card-header d-flex">
                <h3>List of Products</h3>
                <a href="{{ route('admin.product.create') }}" class="btn btn-outline-primary ms-3">Add new product</a>
            </div>
            <div class="card-body">

                <table class="table table-hover info">
                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th>category</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Stock quantity</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $products as $product)
                            
                        <tr>
                            <td>{{ $product->id }}</td> 
                            <td>{{ $product->category->name }}</td> 
                            <td>
                                <img width="100" src="{{ asset( $product->image ? Storage::url($product->image) : 'assets/asset/img/No Product Image.png' )}}" alt="photo" class="img-fluid">
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->stock_quantity }}</td>
                            <td>{{ $product->created_at }}</td>
                            <td>
                                <div>
                                    <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-outline-info">edit</a>

                                    <a href="#" class="btn btn-outline-danger"
                                    onclick="
                                        event.preventDefault(); 
                                        document.getElementById('delete-product{{ $product->id }}').submit();
                                        " 
                                        >Delete</a>

                                    <form action="{{ route("admin.product.destroy", $product->id) }}" method="post" id="delete-product{{ $product->id }}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>

                {!! $products->links() !!}
            </div>
        </div>
    </div>
</div>

@endsection
