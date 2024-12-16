@extends('layout')
@section('title')
    All Blogs
@endsection

@section('content')

<div class="container my-5">
    <!-- Search Form -->
    <div class="container">
        <div class="row">
            <!-- Search Form -->
            @if (request('type')=='all' || request()->has('search') || request()->has('category'))
                
            <div class="col-md-6">
                <form action="{{ route('blogs.index') }}" method="GET" class="mb-4">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search blogs" value="{{ request()->input('search') }}">
                        <button type="submit" class="btn btn-dark">Search</button>
                    </div>
                </form>
            </div>
    
            <!-- Category Filter Form -->
            <div class="col-md-6">
                <form action="{{ route('blogs.index') }}" method="GET" class="mb-4">
                    <div class="input-group">
                        <select name="category" class="form-control">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->category }}" {{ request()->input('category') == $category->category ? 'selected' : '' }}>
                                {{ $category->category }}
                            </option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-dark">Filter</button>
                    </div>
                </form>
            </div>
            @endif
            {{-- MY BLOGS OR OTHER BLOGS --}}
            <div class="col-md-6">
                <form action="{{ route('blogs.index') }}" method="GET" class="mb-4">
                    <div class="input-group">
                        <select name="type" class="form-control">
                            {{-- <option value="">Select Category</o/ption> --}}
                                <option value="all" {{ request('type') === 'all' ? 'selected' : '' }}>All Blogs</option>
                            <option value="own" {{ request('type') === 'own' ? 'selected' : '' }}>My Blogs</option>
                        </select>
                        <button type="submit"  class="btn btn-dark">Filter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <a class="btn btn-dark mt-3" href="{{ route('blogs.create') }}">Add New Blog</a>
    <a class="btn btn-dark mt-3" href="{{ route('dashboard') }}">Dashboard</a>
    {{-- <div class="mt-3 mb-2">
        {{$blogs->links()}}
    </div> --}}
    <div class="mt-3 mb-2">
        {{ $blogs->links() }}
    </div>
    
    <!-- Blog Cards -->
    <div class="row mt-3">
        @if($blogs->isEmpty())
            <p>No blogs found matching your search criteria.</p>
        @else
            @foreach ($blogs as $blog) 
                <div class="col-md-4 mb-4">
                    <div class="card h-100 p-1">
                        <img src="{{ asset('/uploads/' . $blog->post_image) }}" alt="Post Image">
                        <h5 class="card-title">{{ $blog->post_name }}</h5>
                        <p class="card-text">{{ $blog->post_desc }}</p>
                        <p class="card-text">Created By <strong class="text-capitalize">{{ $blog->user->name }}</strong></p>
                        <div class="mt-auto">
                        <p class="card-text border rounded w-50 text-center bg-light text-muted  ">{{ $blog->category }}</p>
                    </div>
                        
                    <div class="mt-3">
                        <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-primary" href="{{ route('blogs.show', $blog->id) }}">Show</a>
                            <a class="btn btn-success" href="{{ route('blogs.edit', $blog->id) }}">Edit</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>

@endsection
