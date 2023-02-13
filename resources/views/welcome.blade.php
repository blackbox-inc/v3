<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<style> 
    body {
        font-family: 'Nunito', sans-serif;
       
        background: url('{{ asset('img/bg.jpg') }}');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        background-size: cover;

    }

    .imbox{
        position: absolute;
        top: 50%;
        left: 50%;
        height: 330px;
        width: 300px;
        transform: translate(-50%, -50%)
    }
    .imbox img{
        height: 100%;
        width: 100%;
      
    }

    .center_login{
        text-align: center;
        position: absolute;
        top: 100%;
        left: 50%;
        height: 330px;
        width: 300px;
        transform: translate(-50%, -50%)

    }
</style>
<body>


    <div class="imbox">
        <img src="{{ asset('img/logo.png') }}" >
    </div>










    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="center_login">
                @auth
                    <a href="{{ url('/home') }}" class="btn btn-secondary m-3">GO BACK TO DASHBOARD</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-secondary m-3">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif
</body>
</html>