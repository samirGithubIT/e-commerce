@extends('backend.layout.master')

@section('page-title', 'category list')

@section('content')

<div class="row">
    <div class="col-12 m-auto">
        <div class="card">
            <div class="card-header d-flex">
                <h3>List of category</h3>
                <a href="{{ route('admin.category.create') }}" class="btn btn-outline-primary ms-3">Add new category</a>
            </div>
            <div class="card-body">

                <table class="table table-hover info">
                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th>name</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $categories as $category)
                            
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->created_at }}</td>
                            <td>
                                <div>
                                    <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-outline-info">edit</a>

                                    <a href="#" class="btn btn-outline-danger"
                                    onclick="
                                        event.preventDefault(); 
                                        document.getElementById('delete-category{{ $category->id }}').submit();
                                        " 
                                        >Delete</a>

                                    <form action="{{ route("admin.category.destroy", $category->id) }}" method="post" id="delete-category{{ $category->id }}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
