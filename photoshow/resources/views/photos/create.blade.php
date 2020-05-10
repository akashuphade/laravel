@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">

        <div class="card w-75">
            <div class="card-header text-center">Create new Photo</div>
            <div class="card-body">
                <form method="POST" action="{{ route('photo-store') }}" enctype="multipart/form-data">
                    @csrf 
                    <input type="hidden" name="album_id" value="{{ $albumId }}">
                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>
                        <div class="col-md-6">
                            <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Please enter title">
                        
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                        <div class="col-md-6">
                            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Please enter Description">{{ old('description') }}</textarea>
                        
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="photo" class="col-md-4 col-form-label text-md-right">Photo</label>
                        <div class="col-md-6">
                            <input type="file" id="photo" name="photo" class="form-control @error('photo') is-invalid @enderror">
                        
                            @error('photo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>    

                    <div class="row justify-content-center">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>    

                </form>
            </div>
        </div>
    </div>
@endsection