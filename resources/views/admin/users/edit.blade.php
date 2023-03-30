@extends('layouts/Admin')

@section('title', 'Update User')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-3">



            <div class="card-header">
                <h4>Update User
                    <a href="{{ url('admin/users') }}" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif


                <form action="{{ url('admin/edit_users/' . $editusers->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="">User Name</label>
                        <input type="text" value="{{ $editusers->name }}" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="">User Email</label>
                        <input type="text" readonly value="{{ $editusers->email }}" class="form-control" name="email">
                    </div>
                    <div class=" mb-3">
                        <label>Password</label><br />
                        <input name="password" type="password" class="form-control">
                    </div>
                    <div class=" mb-3">
                        <label>Select Role</label>
                        <select name="role_as" class="form-control">
                            <option value="">select Role</option>
                            <option value="0" {{ $editusers->role_as == '0' ? 'selected' : '' }}>User</option>
                            <option value="1" {{ $editusers->role_as == '1' ? 'selected' : '' }}>Admin</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success float-end ">Update User</button>
                    </div>
                </form>
            </div>
        </div>


    </div>
@endsection
