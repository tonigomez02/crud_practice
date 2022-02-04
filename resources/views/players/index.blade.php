@extends('layouts.crudLayout')

@section('content')
    <div class="container-md">
        @can("create", $newPlayer)
            <div class="alert alert-success container mt-3">
                <p class="text-center my-2">@lang("You have admin permissions!!")</p>
            </div>
            <a href="{{route("players.create")}}" class="btn btn-primary mt-3">@lang("Add")</a>
        @else
            <div class="alert alert-success container mt-3">
                <p class="text-center my-2">@lang("You only can read content")</p>
            </div>
        @endcan
        <table class="table table-white table-striped mt-4">
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
        @endsection
    </div>

