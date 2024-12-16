<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="left-panel">
            <h1>Application Registration Page</h1>
            <p>Create an account to access all features.</p>
        </div>
        <div class="right-panel">
            <div class="form-container">
                <h2>Register</h2>
                <form action="{{ route('registerSave') }}" method="post">
                    @csrf  
                    <div class="input-group">
                        <label for="name">Name</label>
                        <input type="text" id="username" name="name" required>
                    </div>
                    <div class="input-group">
                        <label for="email">Email</label>
                        <input type="email" id="useremail" name="email" required>
                    </div>
                    <div class="input-group">
                        <label for="password">Password</label>
                        <input type="password" id="userpassword" name="password" required>
                    </div>
                    <div class="input-group">
                        <label for="confirm-password">Confirm Password</label>
                        <input type="password" id="confirm-password" name="password_confirmation" required>
                    </div>
                    <div class="input-group">
                        <button type="submit">Register</button>
                    </div>
                </form>

                <a href="{{ route('login') }}">Already have an account? <span>Login now</span></a>

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
