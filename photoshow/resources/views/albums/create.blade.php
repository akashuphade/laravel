@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">

        <div class="card w-75">
            <div class="card-header text-center">Create new Album</div>
            <div class="card-body">
                <form method="POST" action="{{ route('album-store') }}" enctype="multipart/form-data">
                    @csrf 
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                        <div class="col-md-6">
                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Please enter name">
                        
                            @error('name')
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
                        <label for="cover-image" class="col-md-4 col-form-label text-md-right">Cover Image</label>
                        <div class="col-md-6">
                            <input type="file" id="cover-image" name="cover-image" class="form-control @error('cover-image') is-invalid @enderror">
                        
                            @error('cover-image')
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