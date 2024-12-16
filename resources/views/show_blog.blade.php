@extends('layout')
@section('title')
    Blog Details
@endsection

@section('content')
<div class="container d-flex align-items-center justify-content-center vh-100 vw-100">
    <div class="row justify-content-center w-100">
        <!-- Blog Details Wrapper with Border -->
        <div class="col-md-10 border rounded shadow-sm p-3 d-flex mb-4">
            <!-- Blog Image Section -->
            <div class="col-md-6 p-0">
                <img src="{{ asset('/uploads/' . $blog->post_image) }}" alt="Blog Image" class="img-fluid rounded w-100 h-100">
            </div>

            <!-- Blog Details Section -->
            <div class="col-md-6 d-flex flex-column justify-content-between p-4">
                <div class="ms-4 text-center mt-5 color-dark text-dark">
                    <small class="fs-5 text-decoration-underline" style="text-underline-offset: 0.3em;">Latest Release</small>
                    <h2 class="display-5 mt-2 text-capitalize">{{ $blog->post_name }}</h2>
                    <div class="w-25 mx-auto"> 
                        <p class="border rounded bg-light text-muted text-center">{{ $blog->category }}</p>
                    </div>
                    <p class="text-muted mt-4 fs-6">{{ $blog->post_desc }}</p>

                    <!-- Author Information and Quote -->
                    <blockquote class="blockquote">
                        <footer class="blockquote-footer mt-2">{{ $blog->user->name }} <cite title="Source Title">Author</cite></footer>
                    </blockquote>
                    <footer class="blockquote-footer text-end mt-5">{{ $blog->user->email }} </footer>
                </div>

                <!-- Like and Unlike Buttons -->
                <div class="mt-4">
                    @if ($blog->likes()->where('user_id', auth()->id())->exists())
                        <form action="{{ route('posts.unlike', $blog->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Unlike</button>
                        </form>
                    @else
                        <form action="{{ route('posts.like', $blog) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-primary">Like</button>
                        </form>
                    @endif

                    <p class="mt-2">{{ $blog->likes->count() }} likes</p>
                </div>

                <!-- Action Button -->
                {{-- <a href="#" class="btn btn-primary mt-4 align-self-start">Purchase Book</a> --}}
            </div>
        </div>
    </div>
</div>
@endsection
