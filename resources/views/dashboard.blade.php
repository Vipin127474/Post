
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Card</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>

    <div class="container">
<h3>Dashboard</h3>        
    </div>
    
    <div class="profile-card">
        <div class="profile-header">
            <img src="https://t3.ftcdn.net/jpg/02/43/12/34/360_F_243123463_zTooub557xEWABDLk0jJklDyLSGl2jrr.jpg" alt="Profile Image" class="profile-img">
            <h2>{{ Auth::user()->email }}</h2>
            <p>{{ Auth::user()->name }}</p>

        </div>
        <div class="sidebar-menu">
            <ul>
                <li><a href="{{route('blogs.index')}}">Blogs</a></li>
                <li><a href="{{route('blogs.create')}}">Add Blog</a></li>
                {{-- <li><a href="{{ route('my.blogs') }}">My Blogs</a></li> --}}
                {{-- <li><a href="#">Tasks</a></li> --}}
                <li><a href="#">Help</a></li>
            </ul>
        </div>
        <div class="profile-actions">
            {{-- <a  class="btn inner-btn" href="{{route('inner')}}">Inner</a> --}}
            <a  class="btn logout-btn" href="{{route('logout')}}">Logout</a>
            <a class="btn delete-btn" href="{{ route('delete', Auth::user()->id) }}">Deactivate</a>
        </div>
    </div>
</body>
</html>
