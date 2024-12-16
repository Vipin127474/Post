resources/views/my_blogs.blade.php

<h2>My Blogs</h2>

<form method="GET" action="{{ route('blogs.my') }}">
    <input type="text" name="search" placeholder="Search blogs" value="{{ $search }}">
    <select name="category">
        <option value="">All Categories</option>
        @foreach($categories as $cat)
            <option value="{{ $cat->category }}" {{ $category == $cat->category ? 'selected' : '' }}>
                {{ $cat->category }}
            </option>
        @endforeach
    </select>
    <button type="submit">Filter</button>
</form>

@if($blogs->isEmpty())
    <p>You haven't created any blogs yet.</p>
@else
    <ul>
        @foreach($blogs as $blog)
            <li>
                <h3>{{ $blog->post_name }}</h3>
                <p>{{ $blog->post_desc }}</p>
                <img src="{{ asset('uploads/' . $blog->post_image) }}" alt="Blog Image" style="width:100px;">
                <p>Category: {{ $blog->category }}</p>
            </li>
        @endforeach
    </ul>
@endif

{{ $blogs->links() }}
