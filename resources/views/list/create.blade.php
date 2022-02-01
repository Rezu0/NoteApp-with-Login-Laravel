@extends('app.layouts')

@section('title', $title)

@section('content')
    <div class="row my-3 justify-content-center">
        <div class="col-md-8 col-sm-12">
            <h3 class="fw-bolder mb-3">Create new List</h3>
            <form action="/list" method="post">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('name_list') is-invalid @enderror" name="name_list" id="name_list" placeholder="List...">
                    @error('name_list')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <label for="floatingInput">Input List</label>
                </div>

                <button class="btn btn-success w-100">Save</button>
            </form>
        </div>
    </div>
@endsection