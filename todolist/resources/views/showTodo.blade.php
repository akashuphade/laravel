@extends('layouts.app')

@section('content')
   

<div class="card text-center">
    <div class="card-body">
        <h3 class="card-title"> {{ $todo->title }} </h3>
        <p class="badge badge-danger"> {{ $todo->due }} </p>
        <p class="card-text"> {{ $todo->content }} </p>
        <div class="mt-2 border border-success d-inline-block">
            <a href='/' class="btn btn-primary m-1 btn-sm"> Go back </a>
            <a href='/todo/{{ $todo->id }}/edit' class="btn btn-primary m-1 btn-sm"> Edit </a>

            <form class="d-inline-block" method="post" action="/todo/{{ $todo->id }}">
                @csrf 
                @method('DELETE')
                <button type="submit" class="btn btn-danger m-1 btn-sm"> Delete </button>
            </form>
        </div>
    </div>
</div>
@endsection
