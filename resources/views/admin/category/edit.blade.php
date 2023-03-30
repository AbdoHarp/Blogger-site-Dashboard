@extends('layouts.Admin')

@section('content')
    <div class="container-fluid px-4 mt-3 mb-3">
        <div class="card">
            <div class="card-header">
                <h4>Add Category</h4>
            </div>
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif


                <form action="{{ url('/admin/edit_category' . '/' . $category->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label>Category Name</label>
                        <input type="text" class="form-control" value="{{ $category->name }}" name="name">
                    </div>
                    <div class="mb-3">
                        <label>Slug</label>
                        <input type="text" class="form-control" value="{{ $category->slug }}" name="slug">
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea type="text" id="mySummernote" class="form-control" rows="3" name="description">{{ $category->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" required class="form-control" name="image"><br>
                        <img src="{{ asset($category->image) }}" alt="img" width="80px" height="80px" />
                    </div>

                    <h6>SED Tags :</h6>
                    <div class="mb-3">
                        <label>Mate_Title</label>
                        <input type="text" class="form-control" value="{{ $category->mate_title }}" name="mate_title">
                    </div>
                    <div class="mb-3">
                        <label>Mate_Description</label>
                        <textarea type="text" class="form-control" rows="3" name="mate_description">{{ $category->mate_description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label>Mate_Keyword</label>
                        <textarea type="text" class="form-control" rows="3" name="mate_keyword">{{ $category->mate_keyword }}</textarea>
                    </div>
                    <h6>Status Mode :</h6>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label>navbar_status</label>
                            <input type="checkbox" {{ $category->navbar_status == '1' ? 'checked' : '' }}
                                name="navbar_status">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label>status</label>
                            <input type="checkbox" {{ $category->status == '1' ? 'checked' : '' }} name="status">
                        </div>
                        <div class="col-md-3 mb-3">
                            <button type="submit" class="btn btn-success">Update Category</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
