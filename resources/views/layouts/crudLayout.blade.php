<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Crud</title>
</head>
<body>

<nav class="navbar bg-primary mb-4">
    <div class="container">
        <h1 class="text-white text-center p-3">CRUD with laravel 8.0</h1>
        @auth
            <form class="m-0" action="{{route("logout")}}" method="POST">
                @csrf
                <button class="btn btn-danger" type="submit">Logout</button>
            </form>
        @else
            <div class="d-flex">
                <a class="nav-link text-white" href="{{route("login")}}">Log In</a>
                <a class="nav-link text-white" href="{{route("register")}}">Register</a>
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
