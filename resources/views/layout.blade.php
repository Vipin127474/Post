<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid"> <!-- Changed to container-fluid -->
        <div class="row p-0">
            <div class="col-12 p-0">
                <div class="d-flex align-items-center justify-content-start pb-2 shadow-sm">
                    <!-- Back Arrow Button -->
                    <button class="btn" onclick="history.back()">
                        <p class="display-6 mb-0">&#8592;</p>
                    </button>
                    
                    <!-- Page Title -->
                    <h4 class="mb-0 ms-2">@yield('title')</h4>
                </div>
            </div>
        </div>
    <div class="row">
    <div class="col-8">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-8">
        @yield('content')
    </div>
</div>
</div>
</body>
</html>