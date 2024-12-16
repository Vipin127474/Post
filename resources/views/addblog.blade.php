@extends('layout')
@section('title')
    Add Blogs
@endsection

@section('content')
<form action="{{route('blogs.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mt-5">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="post_name" class="form-control">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">description</label>
        <input type="text" name="post_desc" class="form-control">
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Upload Image</label>
        <input type="file" name="post_image" class="form-control">
    </div>
    <div class="mb-3">
        <label for="category">Category</label>
        <select name="category" id="category" class="form-control">
            <option value="Technology">Technology</option>
            <option value="Lifestyle">Lifestyle</option>
            <option value="Education">Education</option>
            <option value="Business">Business</option>
        </select>
    </div>
    <button type="submit" class="btn btn-dark">Create</button>
  </form>
@endsection
