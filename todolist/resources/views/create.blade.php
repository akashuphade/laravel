@extends('layouts.app')

@section('content')

    <h1 class="text-center mt-4"> Create new Todo </h1>
    
    <div class="form-center mt-4">
        <form method="post" action="/todo">

            @csrf 

            <div class="form-group">
                <label for="title" class="font-weight-bold label-style">Title</label>
                <input type="text" class="form-control input-style @error('title') is-invalid @enderror" name="title" id="title" placeholder="Enter title" value="{{ old('title') }}">
                
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

            </div>
            <div class="form-group">
                <label for="content" class="font-weight-bold label-style">Content</label>
                <input type="text" class="form-control input-style @error('content') is-invalid @enderror" name="content" id="content" placeholder="Enter content" value="{{ old('content') }}">

                @error('content')
                    <p class="text-danger"> {{ $message }} </p>
                @enderror

            </div>
            <div class="form-group">
                <label for="due" class="font-weight-bold label-style">Due</label>
                <input type="text" class="form-control input-style @error('due') is-invalid @enderror" name="due" id="due" placeholder="Enter due day" value="{{ old('due') }}">

                @error('due')
                    <p class="text-danger"> {{ $message }} </p>
                @enderror
            </div>
            
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-success button-style">Submit</button>
            </div>
        </form>
    </div>
    
@endsection