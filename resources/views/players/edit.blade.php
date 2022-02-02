@extends("layouts.crudLayout")

@section("content")
    <div class="container-sm px-md-5">

        @if ($errors->any())
            <div class="alert alert-danger container mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/players/{{$player->player_id}}" method="POST" class="container">
            @csrf
            @method("PUT")
            <div class="mb-3">
                <label for="" class="form-label">@lang("Name")</label>
                <input id="name" name="name" type="text" class="form-control" value="{{$player->name}}" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">@lang("Lastname")</label>
                <input id="lastname" name="lastname" type="text" class="form-control" value="{{$player->lastname}}" required>
            </div>
            <div class="mb-3">
                <p class="text-primary fs-5">@lang("Select postion")</p>
                <div class="mb-3 d-flex">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="position" value="G" {{ $player->position == 'G' ? 'checked' : '' }}>
                        <label class="form-check-label me-2" for="">
                            G
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="position" value="F" {{ $player->position == 'F' ? 'checked' : '' }}>
                        <label class="form-check-label me-2" for="">
                            F
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="position"  value="C" {{ $player->position == 'C' ? 'checked' : '' }}>
                        <label class="form-check-label me-2" for="">
                            C
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">@lang("Birthdate")</label>
                    <input id="birthdate" name="birthdate" type="date" class="form-control" value="{{$player->birthdate}}" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">@lang("Description")</label>
                    <textarea id="description" name="description" class="form-control">{{$player->description}}</textarea>
                </div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">@lang("Salary")</label>
                <input  name="salary" type="text" class="form-control" value="{{$player->salary}}">
            </div>
            <div class="mb-3">
                <p class="text-primary fs-5">@lang("Retired? (only one option)")</p>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" {{ $player->retired == '1' ? 'checked' : '' }} name="retired">
                    <label class="form-check-label" for="">
                        @lang("Yes")
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="0" {{ $player->retired == '0' ? 'checked' : '' }} name="retired">
                    <label class="form-check-label" for="">
                        @lang("No")
                    </label>
                </div>
            </div>
            <a href="{{route("players.index")}}" class="btn btn-secondary">@lang("Cancel")</a>
            <button type="submit" class="btn btn-primary">@lang("Save")</button>
        </form>
    </div>

@endsection
