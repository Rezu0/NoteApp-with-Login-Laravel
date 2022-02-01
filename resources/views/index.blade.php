@extends('app.layouts')

@section('title', 'Note & Todo List Apps')

@section('content')
    <div class="col-md-12 col-sm-12 mb-3">
        <button class="btn btn-primary" id="btn-todo">Todo List</button>
        <button class="btn btn-info" id="btn-note">Note</button>
    </div>
    <div class="row" id="row-todo">
        <h3 class="mt-4 mb-2 fw-bolder">Todo List</h3>
        <div class="col-12">
            <a href="/todo" class="btn btn-secondary my-2">Create new Todo List</a>
        </div>
        @foreach ($list as $l)
            <div class="col-md-3 col-sm-6 col-xs-12">
                <x-card todoOrNote="Todo List" title="{{ $l->name_list }}" body="{{ $l->created_at->diffForHumans() }}"></x-card>
            </div>
        @endforeach
    </div>
    <div class="row my-3" id="row-note" style="display: none">
        <h3 class="mt-4 mb-2 fw-bolder">Note List</h3>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <x-card todoOrNote="Todo" title="Masih kosong" body="Masih Kosong juga gan!"></x-card>
        </div>
    </div>
@endsection