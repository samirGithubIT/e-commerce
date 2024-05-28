@extends('backend.layout.master')

@section('page-title', 'Comment Lists')

@section('content')

<div class="row">
    <div class="col-12 m-auto">
        <div class="card">
            <div class="card-header d-flex">
                <h3>List of Comments</h3>
            </div>
            <div class="card-body">

                <table class="table table-hover info">
                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Phone_Number</th>
                            <th>Message</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $comment as $user_comment )
                            
                        <tr>
                            <td>{{ $user_comment->id }}</td>
                            <td>{{ $user_comment->name }}</td>
                            <td>{{ $user_comment->email }}</td>
                            <td>{{ $user_comment->phoneNumber }}</td>
                            <td>{{ $user_comment->message }}</td>
                            <td>{{ $user_comment->created_at }}</td>
                            <td>
                                <a href="#" class="btn btn-outline-info">Show</a>
                                <a href="#" class="btn btn-outline-danger"
                                    onclick="
                                        event.preventDefault(); 
                                        document.getElementById('delete-comment{{ $user_comment->id }}').submit();
                                        " 
                                        >Delete</a>

                                    <form action="{{ route("admin.comment.destroy", $user_comment->id) }}" method="post" id="delete-comment{{ $user_comment->id }}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                            </td>
                        </tr>
                    </tbody>

                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

@endsection