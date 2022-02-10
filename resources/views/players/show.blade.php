@extends("layouts.crudLayout")

@section("content")

    <div class="container-sm d-flex justify-content-center">
        <div class="card mt-4 " style="width: 20rem;">
            <img src="{{route("image", $player->image)}}" class="card-img-top " style="width: 100%; height: 13rem"
                 alt="...">

            <div class="card-body d-flex flex-column align-items-center">
                <h4 class="card-title">{{$player->name}} {{$player->lastname}}</h4>
                <p class="card-text">{{$player->description}}</p>
                <p>Position: {{$player->position}}</p>
                <p>Birthdate: {{$player->birthdate}}</p>
                @if($player->retired === true)
                    <p>Retired</p>
                @else
                    <p>Active</p>
                @endif

            </div>
        </div>
    </div>
    <a href="{{route("players.index")}}" class="btn btn-secondary ms-5">@lang("Come back")</a>

@endsection
