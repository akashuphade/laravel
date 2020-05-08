@extends('layouts.app')

@section('content')

<h1 class="text-center mt-4"> Edit Todo </h1>
    
    <div class="form-center mt-4">
        <form method="post" action="/todo/{{$todo->id}}">

            @csrf 
            @method('PUT')

            <div class="form-group">
                <label for="title" class="font-weight-bold label-style">Title</label>
                <input type="text" class="form-control input-style @error('title') is-invalid @enderror" name="title" id="title" placeholder="Enter title" value="{{ old('title') ? old('title') : $todo->title }}">
                
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

            </div>
            <div class="form-group">
                <label for="content" class="font-weight-bold label-style">Content</label>
                <input type="text" class="form-control input-style @error('content') is-invalid @enderror" name="content" id="content" placeholder="Enter content" value="{{ old('content') ? old('content') : $todo->content }}">

                @error('content')
                    <p class="text-danger"> {{ $message }} </p>
                @enderror

            </div>
            <div class="form-group">
                <label for="due" class="font-weight-bold label-style">Due</label>
                <input type="text" class="form-control input-style @error('due') is-invalid @enderror" name="due" id="due" placeholder="Enter due day" value="{{ old('due') ? old('due') : $todo->due }}">

                @error('due')
                    <p class="text-danger"> {{ $message }} </p>
                @enderror
            </div>
            
            <div class="col-md-10 text-center">
                <button type="submit" class="btn btn-success button-style">Update</button>
            </div>
        </form>
    </div>

@endsection