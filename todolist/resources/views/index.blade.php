@extends('layouts.app')

@section('content')
    <h1>Todos</h1>

    @if (count($todos) > 0)
        @foreach ($todos as $todo)
            <div class="card m-2 p-2">
                <div class="row">
                    <h2 class="col-md-4"><a href="todo/{{ $todo->id }}" data-toggle="tooltip" title="View it"> {{ $todo->title }} </a></h2>
                </div>    
                <label class="badge badge-danger mt-2"> {{ $todo->due }} </label>
            </div>
        @endforeach
    @endif
@endsection    