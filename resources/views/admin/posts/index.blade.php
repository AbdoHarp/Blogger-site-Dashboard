@extends('layouts.Admin')

@section('content')
    <div class="container-fluid px-4 mt-3 mb-3">

        <div class="card">
            <div class="card-header">
                <h4>View Posts
                    <a href="{{ url('/admin/add_category') }}" class="btn btn-success btn-sm float-end">
                        Add Post
                    </a>
                </h4>

            </div>
            <div class="card-body">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <div>
                    <table id="myDataTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Post Name</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $postitem)
                                <tr>
                                    <td>{{ $postitem->id }}</td>
                                    <td>{{ $postitem->category->name }}</td>
                                    <td>{{ $postitem->name }}</td>
                                    <td>{{ $postitem->status == '1' ? 'Hiddin' : 'Show' }}</td>
                                    <td>
                                        <a href="{{ url('admin/edit_post/' . $postitem->id) }}"
                                            class="btn btn-success btn-sm">
                                            Edit
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/delete_post/' . $postitem->id) }}"
                                            class="btn btn-danger btn-sm">
                                            Delete
                                        </a>
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
