@extends('layouts.Admin')

@section('content')
    <div class="container-fluid px-4 mt-3 mb-3">

        <div class="card">
            <div class="card-header">
                <h4>View Posts
                    <a href="{{ url('/admin/add_users') }}" class="btn btn-success btn-sm float-end">
                        Add User
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
                                <th>User Name</th>
                                <th>User E_mail</th>
                                <th>Type</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $usersitem)
                                <tr>
                                    <td>{{ $usersitem->id }}</td>
                                    <td>{{ $usersitem->name }}</td>
                                    <td>{{ $usersitem->email }}</td>
                                    <td>{{ $usersitem->role_as == '1' ? 'Admin' : 'User' }}</td>
                                    <td>
                                        <a href="{{ url('admin/edit_users/' . $usersitem->id) }}"
                                            class="btn btn-success btn-sm">
                                            Edit
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/delete_users/' . $usersitem->id) }}"
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
