@extends('layouts.app')

@section('content')
    <h1>{{ $photo->title }} </h1>
    <p> {{ $photo->description}} </p>
    <form method="post" action="{{route('photo-delete', $photo->id)}}">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger float-right" type="submit">Delete</button>
    </form>
    <a href="/albums/{{$photo->album_id}}" class="btn btn-secondary">Go back</a>
    <small class="text-mute">Size: {{$photo->size}}</small>
    <hr>
    <img src="/storage/albums/{{$photo->album_id}}/{{$photo->photo}}" width="80%" height="400px">
@endsection