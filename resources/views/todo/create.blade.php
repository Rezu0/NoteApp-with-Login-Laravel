@extends('app.layouts')

@section('title', $title)

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 col-sm-12">
            <h3 class="fw-bolder">New Task</h3>
            <form action="/todo" method="post">
                @csrf
                <select class="form-select mb-3" name="lists_id" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                        @foreach ($list as $l)
                            <option value="{{ $l->id }}">{{ $l->name_list }}</option>
                        @endforeach
                </select>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="title" id="title" placeholder="Title...">
                    <label for="title">Your Title</label>
                </div>
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave your Description" name="desc" id="desc" style="height: 100px"></textarea>
                    <label for="desc">Leave your Description</label>
                </div>

                <button class="btn btn-success w-100 my-3">Save</button>
            </form>
        </div>
    </div>
@endsection