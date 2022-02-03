@extends('app.layouts')

@section('title', $title)

{{ session()->forget('name_list'); }}

@section('content')
    <div class="row">
        <div class="col-12 my-3">
            <h3 class="fw-bolder"><i class="fas fa-clipboard-list"></i> Your Todo List, {{ Auth::user()->username }}</h3>
            <div class="d-flex justify-content-end">
                <a href="/list/create" class="btn btn-info"><i class="fas fa-plus-circle"></i> New Todo List</a>
            </div>
        </div>
        @if ($list->count())
        @foreach ($list as $l)
            <div class="col-12">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-dark text-light fs-4 my-2" id="{{ $l->slug }}" style="cursor: pointer">
                        <form action="/list/{{ $l->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="text-decoration-none text-light position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger fs-6 border-0"><i class="fas fa-trash"></i></button>
                        </form>

                        <a href="/todo/create?key={{ $l->name_list }}" class="text-decoration-none text-light position-absolute top-0 start-0 translate-middle badge rounded-pill bg-success fs-6" >
                            <i class="fas fa-plus"></i>
                        </a>
                      {{ $l->name_list }}
                      <span class="badge bg-primary rounded-pill">
                          @if ($l->todo->count())
                            {{ $count = $l->todo->count() - $l->todo[0]->finish }}
                          @else
                              Tidak ada task!
                          @endif
                      </span>
                    </li>
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-8">
                            @if ($l->todo->count())
                            <ol id="{{ $l->slug }}1" style="display: none; border: 1px black solid;" class="list-group list-group-numbered py-2 px-4">
                                @foreach ($l->todo as $i)
                                    <div class="d-flex justify-content-between mb-2">
                                        <div class="fw-bolder fs-6">
                                            @if ($i->finish)
                                                <del>{{ $loop->iteration . '. ' . $i->title }}</del> <i class="fas fa-check-circle text-success"></i>
                                            @else
                                                {{ $loop->iteration . '. ' . $i->title }}
                                            @endif
                                            
                                        </div>
                                        <div>
                                            <div class="row fs-6">
                                                <div class="co-12">
                                                    @if ($i->finish)
                                                        <form action="/todo/{{ $i->id }}" method="post" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="badge rounded-pill bg-danger border-0 fs-6" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
                                                        </form>
                                                    @else
                                                        <form action="/todo/finish/{{ $i->id }}" method="post" class="d-inline">
                                                            @csrf
                                                            @method('PUT')
                                                            <button class="badge rounded-pill bg-success border-0 fs-6"><i class="fas fa-check"></i></button>
                                                        </form>
                                                        <button class="badge rounded-pill bg-info border-0 fs-6"><i class="fal fa-eye"></i></button>
                                                        <a href="/todo/{{ $i->id }}/edit" class="badge rounded-pill bg-warning border-0 fs-6 text-dark"><i class="fal fa-edit"></i></a>
                                                        <form action="/todo/{{ $i->id }}" method="post" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="badge rounded-pill bg-danger border-0 fs-6 " onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </ol>
                            @endif
                        </div>
                    </div>
                </ul>
            </div>
        <script>
            $('#{{ $l->slug }}').click(function(){
                $('#{{ $l->slug }}1').slideToggle();
            });
        </script>
        @endforeach
            
        @else
            <div class="col-12">
                You don't have a todo list
            </div>
        @endif

        <div class="row">
            <div class="col-12 d-flex justify-content-end">
                {{ $list->links() }}
            </div>
        </div>

    </div>
@endsection