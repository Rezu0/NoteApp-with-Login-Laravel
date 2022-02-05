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
            <a href="/todo" class="btn btn-secondary my-2">View all Todo List</a>
        </div>
        @foreach ($list as $l)
            <div class="col-md-4 col-sm-6 col-xs-12 mt-4">
                <x-card todoOrNote="Todo List" title="{{ $l->name_list }}" body="{{ $l->created_at->diffForHumans() }}" count="{{ $l->todo->count() }}" nameList="{{ $l->name_list }}" slug="{{ $l->slug }}"></x-card>
            <div class="row" id="{{ $l->slug }}1" style="display: none">
                <div class="col-md-12 col-sm-6 col-xs-12 mt-2">
                    @foreach ($l->todo as $i)
                    <div class="list-group">
                        <a class="list-group-item list-group-item-action" aria-current="true">
                          <div class="d-flex w-100 justify-content-between">
                              @if ($i->finish)
                                <h5 class="mb-1">{{ $i->title }} <i class="fas fa-check text-success"></i></h5> 
                              @else
                                <h5 class="mb-1">{{ $i->title }}</h5>
                              @endif
                            <small>{{ $i->created_at->diffForHumans() }}</small>
                          </div>
                          <p class="mb-1">{{ $i->desc }}</p>
                          <small>
                              @if ($i->finish)
                                <form action="/todo/{{ $i->id }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="badge rounded-pill bg-danger border-0 fs-6 " onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
                                </form>
                              @else
                            <form action="/todo/finish/{{ $i->id }}" method="post" class="d-inline">
                                @csrf
                                @method('PUT')
                                <button class="badge rounded-pill bg-success border-0 fs-6"><i class="fas fa-check"></i></button>
                            </form>
                            <button class="badge rounded-pill bg-warning border-0 fs-6 text-dark linkBtn{{ $i->id }}"><i class="fal fa-edit"></i></button>
                            <form action="/todo/{{ $i->id }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="badge rounded-pill bg-danger border-0 fs-6 " onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
                            </form>
                                @endif
                        </small>
                        <script>
                            $('.linkBtn{{ $i->id }}').click(function(){
                                window.location.href='/todo/{{ $i->id }}/edit';
                            })
                        </script>
                          
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            <script>
                $('#{{ $l->slug }}').click(function(){
                    var txt = $('#{{ $l->slug }}1').is(':visible') ? 'Read More!' : 'Read Less'
                    $(this).text(txt)
                    $('#{{ $l->slug }}1').slideToggle()
                })
            </script>
            </div>
        @endforeach
    </div>
    <div class="row my-3" id="row-note" style="display: none">
        <h3 class="mt-4 mb-2 fw-bolder">Note List</h3>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <x-card todoOrNote="Todo" title="Masih kosong" body="Masih Kosong juga gan!" count="0" nameList="0" slug="0"></x-card>
        </div>
    </div>
@endsection