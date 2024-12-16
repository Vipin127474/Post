@extends('layout')
@section('title')
    Edit Blogs
@endsection

@section('content')
<form action="{{route('blogs.update', $blog->id )}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mt-4">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="post_name" class="form-control" value="{{ $blog->post_name }}">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <input type="text" name="post_desc" class="form-control" value="{{ $blog->post_desc }}">
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Upload Image</label>
        <input type="file" name="post_image" class="form-control">
        @if($blog->post_image)
            <img src="{{ asset('uploads/' . $blog->post_image) }}" alt="Blog Image" width="100">
        @endif
    </div>
    <div class="mb-3">
        <label for="category">Category</label>
        <select name="category" id="category" class="form-control" value="{{ $blog->category }}">
            <option value="Technology">Technology</option>
            <option value="Lifestyle">Lifestyle</option>
            <option value="Education">Education</option>
            <option value="Business">Business</option>
        </select>
    </div>
    <button type="submit" class="btn btn-dark">Update</button>
</form>
@endsection
