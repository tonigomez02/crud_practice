@extends('layouts.crudLayout')

@section('content')
    <div class="container-lg d-flex flex-column align-items-center">
        @can("create", $newPlayer)
            <div class="alert alert-success container-lg mt-3">
                <p class="text-center my-2">@lang("You have admin permissions!!")</p>
            </div>
            <a href="{{route("players.create")}}" class="btn btn-primary mt-3 px-3" style="width:fit-content ">@lang("Add")</a>
        @else
            <div class="alert alert-success container mt-3">
                <p class="text-center my-2 ">@lang("You only can read content")</p>
            </div>
            <a href="{{route("players.create")}}" class="btn btn-primary mt-3 px-3" style="width:fit-content ">@lang("Add")</a>
        @endcan

        <div class="container-md d-flex flex-column flex-md-row justify-content-md-between align-items-center align-items-md-start flex-wrap mb-5">
            @foreach($players as $player)
                <div class="card mt-4" style="width: 20rem;">
                @if($player->image)
                        <img src="{{route("image", $player->image)}}" class="card-img-top " style="width: 100%; height: 13rem"
                             alt="...">
                    @else
                        <img src="{{asset("storage/images/nba-logo.jpg")}}" class="card-img-top " style="width: 100%; height: 12rem"
                             alt="...">
                    @endif
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
                        <a href="{{route("players.show", $player)}}" class="btn btn-secondary mb-2">@lang("Show")</a>
                        @can("create", $newPlayer)
                            <form action="{{route("players.destroy", $player)}}" method="POST">
                                @method("DELETE")
                                @csrf
                                <a href="{{route("players.edit", $player)}}" class="btn btn-dark">@lang("Edit")</a>
                                <button type="submit" class="btn btn-danger">@lang("Delete")</button>
                            </form>
                        @else
                            <p class="text-primary">@lang("No actions")</p>
                        @endcan

                    </div>
                </div>
            @endforeach
        </div>

        @can("create", $newPlayer)
            <table class="table table-white table-striped mt-5 mb-5 d-none d-lg-table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">@lang("Name")</th>
                    <th scope="col">@lang("Lastname")</th>
                    <th scope="col">@lang("Position")</th>
                    <th scope="col">@lang("Birthdate")</th>
                    <th scope="col">@lang("Retired")</th>
                    <th scope="col">@lang("Description")</th>
                    <th scope="col">@lang("Salary")</th>
                    <th scope="col">@lang("Actions")</th>
                </tr>
                </thead>
                <tbody>
                @foreach($players as $player)
                    <tr>
                        <td>{{$player->player_id}}</td>
                        <td>{{$player->name}}</td>
                        <td>{{$player->lastname}}</td>
                        <td>{{$player->position}}</td>
                        <td>{{$player->birthdate}}</td>
                        @if($player->retired === true)
                            <td>Yes</td>
                        @else
                            <td>No</td>
                        @endif
                        <td>{{$player->description}}</td>
                        <td>{{$player->salary}}$</td>
                        <td>
                            @can("update", $newPlayer)
                                <form action="{{route("players.destroy", $player)}}" method="POST">
                                    @method("DELETE")
                                    @csrf
                                    <a href="{{route("players.edit", $player)}}" class="btn btn-dark">@lang("Edit")</a>
                                    <button type="submit" class="btn btn-danger">@lang("Delete")</button>
                                </form>
                            @else
                                <p class="text-primary">@lang("No actions")</p>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endcan
        @endsection
    </div>

