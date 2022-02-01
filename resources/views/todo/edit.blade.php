@extends('app.layouts')

@section('title', 'Edit | ' . $todo->title)

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 col-sm-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb fs-5 fw-bolder">
                  <li class="breadcrumb-item">Edit</li>
                  <li class="breadcrumb-item">{{ $todo->title }}</li>
                </ol>
            </nav>
            <form action="/todo/{{ $todo->id }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ $todo->title }}">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <label for="title">Your Title</label>
                </div>
                <div class="form-floating">
                    <textarea class="form-control @error('desc') is-invalid @enderror" name="desc" id="desc" style="height: 100px">{{ $todo->desc }}</textarea>
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