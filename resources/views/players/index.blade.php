@extends('layouts.crudLayout')

@section('content')
    <div class="container-md">
        @can("create", $newPlayer)
            <a href="players/create" class="btn btn-primary mt-5">Add</a>
            <div class="alert alert-success container mt-3">
                <p class="text-center">You have admin permissions!!</p>
            </div>
        @endcan
        <table class="table table-dark table-striped mt-4">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Lastname</th>
                <th scope="col">Position</th>
                <th scope="col">Birthdate</th>
                <th scope="col">Retired</th>
                <th scope="col">Description</th>
                <th scope="col">Salary</th>
                <th scope="col">Actions</th>
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
                    <td>{{$player->salary}} $</td>
                    <td>
                        @can("create", $newPlayer)
                            <form action="/players/{{$player->player_id}}" method="POST">
                                @method("DELETE")
                                @csrf
                                <a href="/players/{{$player->player_id}}/edit" class="btn btn-info">Edit</a>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        @else
                            <p class="text-primary">No actions</p>
                        @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @endsection
    </div>

