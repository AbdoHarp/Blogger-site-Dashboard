@extends('layouts.Admin')

@section('content')
    <div class="container-fluid px-4 mt-3 mb-3">

        <div class="card">
            <div class="card-header">
                <h4>View Category
                    <a href="{{ url('/admin/add_category') }}" class="btn btn-success btn-sm float-end">
                        Add Category
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
                                <th>Category Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $categitem)
                                <tr>
                                    <td>{{ $categitem->id }}</td>
                                    <td>{{ $categitem->name }}</td>
                                    <td>
                                        <img src="{{ asset($categitem->image) }}" alt="img" width="80px"
                                            height="80px" />
                                    </td>
                                    <td>{{ $categitem->status == '1' ? 'Hiddin' : 'Show' }}</td>
                                    <td>
                                        <a href="{{ url('admin/edit_category/' . $categitem->id) }}"
                                            class="btn btn-success btn-sm">
                                            Edit
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/delete_category/' . $categitem->id) }}"
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
