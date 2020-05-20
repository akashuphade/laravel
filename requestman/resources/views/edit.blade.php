@extends('layouts.app')

@section('content')
{{$student->name}}
    <div class="row justify-content-center">
        <div class="card col-md-8">
            <div class="card-header text-center"><h3 class="text-info">Edit Student</h3></div>
            <div class="card-body">
                <form method="POST" action="/request">

                    @csrf 
                    <div class="form-group row">
                        <label for="name" class="col-form-label col-md-4 text-md-right">Name</label>
                        <div class="col-md-6">
                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="">

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-form-label col-md-4 text-md-right">E-mail</label>
                        <div class="col-md-6">
                            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="class" class="col-form-label col-md-4 text-md-right">Class</label>
                        <div class="col-md-6">
                            <input type="number" id="class" name="class" class="form-control @error('class') is-invalid @enderror" min="0" value="{{old('class')}}">

                            @error('class')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            
            </div>
        </div>
    </div>
@endsection