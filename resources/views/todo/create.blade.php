@extends('app.layouts')

@section('title', $title)

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 col-sm-12">
            <h3 class="fw-bolder">New Task</h3>
            <div class="row">
                <div class="col-12">
                    <h5 class="fw-bolder">
                        @if (session()->has('successList'))
                            {{ session('successList') }}
                        @endif
                    </h5>
                </div>
            </div>
            <form action="/todo" method="post">
                @csrf
                @foreach ($list as $l)
                    @if ($l->name_list === $session)
                        <input type="hidden" name="lists_id" value="{{ $l->id }}">
                    @endif
                @endforeach
                <select class="form-select mb-3" aria-label="Default select example" @foreach ($list as $l) @if($l->name_list === $session) {{ 'disabled' }} @endif @endforeach>
                    <option selected>Open this select menu</option>
                        @foreach ($list as $l)
                            <option value="{{ $l->id }}" @if($l->name_list === $session) {{ 'selected' }} @endif>{{ $l->name_list }}</option>
                        @endforeach
                </select>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Title...">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <label for="title">Your Title</label>
                </div>
                <div class="form-floating">
                    <textarea class="form-control @error('desc') is-invalid @enderror" placeholder="Leave your Description" name="desc" id="desc" style="height: 100px"></textarea>
                    @error('desc')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <label for="desc">Leave your Description</label>
                </div>

                <button class="btn btn-success w-100 my-3">Save</button>
            </form>
        </div>
    </div>
@endsection