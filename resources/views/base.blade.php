<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>@yield('title')</title>
    <style>
        .user-info {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 10;
        }
        .center-content {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        body {
            background-color:gray;
            margin:0;
        }
        table {
            width: 100%;  
        background-color: white; 
        border-radius: 8px; 
        }
        .content-wrapper {
        background-color: white;  
        margin: 20px;  
        padding: 20px;  
        border-radius: 10px;  
    }
    </style>
</head>
<body>
@if (auth()->check())
    <div class="user-info">
        <a href="http://127.0.0.1:8000/woning" class="btn btn-info mb-3">Woningen</a>
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn btn-danger mb-3">Logout</button>
        </form>
    </div>
@endif


    <div class="container center-content" style="margin-top: 40px;">
        <h1 class="display-3 text-center">@yield('title')</h1>
        @yield('content')
    </div>
</body>
</html>
