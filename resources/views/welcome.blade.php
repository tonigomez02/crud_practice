    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2d12050ae0.js" crossorigin="anonymous"></script>
    <title>Crud</title>
</head>
<body>
<nav class="navbar navbar-light bg-primary p-md-3" style="height: 12vh">
    <div class="container-fluid d-flex ">
        <a class="navbar-brand text-white" href="#">Crud</a>
        @guest()
        <div class="d-flex aliign-items-center p-md-3">
            <a class="nav-link text-dark fs-5 text-white" href="{{route("login")}}">@lang("Log In")</a>
            <a class="nav-link text-dark fs-5 text-white" href="{{route("register")}}">@lang("Register")</a>
        </div>
        @else
            <form class="m-0 align-items-center d-flex flex-column" action="{{route("logout")}}" method="POST">
                @csrf
                <button class="btn btn-light" type="submit">@lang("Logout")</button>
                <p class="text-white m-0 mt-2">@lang("Welcome") {{auth()->user()->name}}</p>
            </form>
        @endguest
    </div>
</nav>

<div class="container col-xxl-8 px-4 py-5 d-flex justify-content-center" style="height: 88vh">
    <div class="row flex-md-row-reverse align-items-center g-5 py-5">
        <div class="col-12 col-lg-6">
            <img src="{{asset("/images/nba-logo.png")}}" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes"
                  style="width: 100%" loading="lazy">
        </div>
        <div class="col-12 col-lg-6">
            <h1 class="display-5 fw-bold lh-1 mb-3">@lang("Welcome to Anthony's CRUD")</h1>
            <p class="lead">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum finibus pellentesque tellus, ac
                malesuada nisl lobortis eget. Phasellus quis nunc a tellus semper accumsan ac vel dui. Proin sed luctus
                dui. Donec sit amet velit euismod, tincidunt magna ut, mattis turpis. Vivamus enim dui, fringilla et
                orci id, venenatis posuere. </p>
            @guest()
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <button type="button" class="btn btn-primary btn-lg px-4 me-md-2"><a class="nav-link text-white"
                                                                                     href="{{route("login")}}">@lang("Log In")</a>
                </button>
                <button type="button" class="btn btn-outline-secondary btn-lg px-4"><a class="nav-link text-dark"
                                                                                       href="{{route("register")}}">@lang("Register")</a>
                </button>
            </div>
            @else
                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                    <button type="button" class="btn btn-primary btn-lg px-4 me-md-2"><a class="nav-link text-white"
                                                                                         href="{{route("players.index")}}">@lang("Players")</a>
                    </button>
                </div>
            @endguest
        </div>
    </div>
</div>
</body>
</html>
