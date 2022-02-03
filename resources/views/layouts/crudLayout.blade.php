<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2d12050ae0.js" crossorigin="anonymous"></script>
    <title>Crud</title>
</head>
<body>

<nav class="navbar bg-primary mb-4">
    <div class="container">
        <div class="d-flex flex-column align-items-center">
            <h1 class="text-white text-center">@lang("CRUD with laravel 8.0 and bootstrap")</h1>
            <div>
                <a href="/set_language/es"><img class="img-fluid" style="width: 50px; height: 45px" src="{{asset("images/spanish.png")}}"></a>
                <a href="/set_language/en"><img class="img-fluid" style="width: 50px; height: 45px" src="{{asset("images/english.png")}}"></a>
                <a href="/set_language/ca"><img class="img-fluid" style="width: 50px; height: 35px" src="{{asset("images/img.png")}}"></a>
            </div>
        </div>
        @auth
            <p class="text-white m-0">@lang("Welcome") {{auth()->user()->name}}</p>
            <form class="m-0" action="{{route("logout")}}" method="POST">
                @csrf
                <button class="btn btn-light" type="submit">@lang("Logout")</button>
            </form>
        @else
            <div class="d-flex">
                <a class="nav-link text-white" href="{{route("login")}}">@lang("Log In")</a>
                <a class="nav-link text-white" href="{{route("register")}}">@lang("Register")</a>
            </div>
        @endauth
    </div>
</nav>

@yield('content')


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>
