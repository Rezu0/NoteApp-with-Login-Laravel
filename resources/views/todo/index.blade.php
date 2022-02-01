@extends('app.layouts')

@section('title', $title)

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
                      {{ $l->name_list }}
                      <span class="badge bg-primary rounded-pill">
                        {{ $l->todo->count() }}
                      </span>
                    </li>
                    <ol id="{{ $l->slug }}1" style="display: none" class="list-group list-group-numbered">
                        @foreach ($l->todo as $i)
                            <div class="d-flex justify-content-between mb-2">
                                <div class="fw-bolder fs-6">
                                    @if ($i->finish)
                                        <del>{{ $i->title }}</del> <i class="fas fa-check-circle text-success"></i>
                                    @else
                                        {{ $i->title }}
                                    @endif
                                    
                                </div>
                                <div>
                                    <div class="row fs-6">
                                        <div class="co-12">
                                            @if ($i->finish)
                                                <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                            @else
                                                <form action="/todo/finish/{{ $i->id }}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('PUT')
                                                    <button class="btn btn-success"><i class="fas fa-check"></i></button>
                                                </form>
                                                <button class="btn btn-info"><i class="fal fa-eye"></i></button>
                                                <a href="/todo/{{ $i->id }}/edit" class="btn btn-warning"><i class="fal fa-edit"></i></a>
                                                <form action="/todo/{{ $i->id }}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </ol>
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