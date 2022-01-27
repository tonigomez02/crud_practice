@extends("layouts.crudLayout")

@section("content")
    <div class="container-sm px-md-5">
        <form action="/players" method="POST" class="container px-md-5">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input id="name" name="name" type="text" class="form-control" value="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Lastname</label>
                <input id="lastname" name="lastname" type="text" class="form-control "value="">
            </div>
            <div class="mb-3">
                <p class="text-primary fs-5">Select postion</p>
                <div class="mb-3 d-flex">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="position" value="G">
                        <label class="form-check-label me-2" for="">
                            G
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="position" value="F">
                        <label class="form-check-label me-2" for="">
                            F
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="position"  value="C">
                        <label class="form-check-label me-2" for="">
                            C
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Birthdate</label>
                    <input id="birthdate" name="date" type="date" class="form-control" value="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Description</label>
                    <textarea id="description" name="description" class="form-control" ></textarea>
                </div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Salary</label>
                <input  name="salary" type="text" class="form-control" value="">
            </div>
            <div class="mb-3">
                <p class="text-primary fs-5">Retired? (only one option)</p>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="Yes" name="Retired">
                    <label class="form-check-label" for="">
                        Yes
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="No" name="Retired">
                    <label class="form-check-label" for="">
                        No
                    </label>
                </div>
            </div>
            <a href="" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>

@endsection
