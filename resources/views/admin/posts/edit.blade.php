@extends('layouts/Admin')

@section('title', 'Add Post')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-3">



            <div class="card-header">
                <h4>Add Post
                    <a href="{{ url('admin/post') }}" class="btn btn-danger float-end">Back</a>
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


                <form action="{{ url('admin/edit_post/' . $posts->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="">Category</label>
                        <select name="category_id" class="form-control">
                            <option value="">-- Select category --</option>
                            @foreach ($category as $cateitem)
                                <option value="{{ $cateitem->id }}"
                                    {{ $posts->category_id == $cateitem->id ? 'selected' : '' }}>
                                    {{ $cateitem->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Post Name</label>
                        <input type="text" value="{{ $posts->name }}" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="">Slug</label>
                        <input type="text" value="{{ $posts->name }}" class="form-control" name="slug">
                    </div>
                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea rows="4" id="mySummernote" class="form-control" name="description">{{ $posts->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for=""> Iframe Link</label>
                        <input type="text" value="{{ $posts->name }}" class="form-control" name="yt_iframe">
                    </div>
                    <h4>SEO Tags</h4>
                    <div class="mb-3">
                        <label for="">Meta_Title</label>
                        <input type="text" value="{{ $posts->name }}" class="form-control" name="meta_title">
                    </div>
                    <div class="mb-3">
                        <label for="">Meta_Description</label>
                        <textarea rows="3" class="form-control" name="meta_description">{{ $posts->meta_description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Meta_Keyword</label>
                        <textarea rows="3" class="form-control" name="meta_keyword">{{ $posts->meta_keyword }}</textarea>
                    </div>
                    <h4>Status</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="">Status</label>
                                <input type="checkbox" {{ $posts->status == '1' ? 'checked' : '' }} name="status">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success float-end ">Update Post</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
@endsection
