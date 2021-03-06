@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card round">
            <div class="card-header text-center">Add Student</div>
            <div class="card-body">
                <form method="POST" action="/students">
                    @csrf
                    <div class="form-group row">
                        <label for="fname" class="col-md-4 col-form-label text-md-right">{{ __('First name') }}</label>

                        <div class="col-md-6">
                            <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" autofocus>

                            @error('fname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="mname" class="col-md-4 col-form-label text-md-right">{{ __('Middle name') }}</label>

                        <div class="col-md-6">
                            <input id="mname" type="text" class="form-control @error('mname') is-invalid @enderror" name="mname" value="{{ old('mname') }}" autofocus>

                            @error('mname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="lname" class="col-md-4 col-form-label text-md-right">{{ __('Last name') }}</label>

                        <div class="col-md-6">
                            <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" autofocus>

                            @error('lname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="class" class="col-md-4 col-form-label text-md-right">{{ __('Class') }}</label>

                        <div class="col-md-6">
                            <select class="custom-select @error('class') is-invalid @enderror" name="class">
                                <option value="" selected>Choose...</option>
                                <option value="1" {{ old('class') == 1 ? 'selected': ''}}>First</option>
                                <option value="2" {{ old('class') == 2 ? 'selected': ''}}>Second</option>
                                <option value="3" {{ old('class') == 3 ? 'selected': ''}}>Third</option>
                                <option value="4" {{ old('class') == 4 ? 'selected': ''}}>Fourth</option>
                                <option value="5" {{ old('class') == 5 ? 'selected': ''}}>Fifth</option>
                                <option value="6" {{ old('class') == 6 ? 'selected': ''}}>Sixth</option>
                                <option value="7" {{ old('class') == 7 ? 'selected': ''}}>Seventh</option>
                                <option value="8" {{ old('class') == 8 ? 'selected': ''}}>Eighth</option>
                                <option value="9" {{ old('class') == 9 ? 'selected': ''}}>Ninth</option>
                                <option value="10" {{ old('class') == 10 ? 'selected': ''}}>Tenth</option>
                            </select>

                            @error('class')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="board" class="col-md-4 col-form-label text-md-right">{{ __('Education board') }}</label>

                        <div class="col-md-6">
                            <select class="custom-select @error('board') is-invalid @enderror" name="board">
                                <option value="" selected>Choose...</option>
                                @foreach ($boards as $board)
                                    <option value="{{ $board->id }}" {{old('board') == $board->id ? 'selected' : ''}}>{{ $board->board_name }}</option>
                                @endforeach
                            </select>

                            @error('board')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="bdate" class="col-md-4 col-form-label text-md-right">{{__('Birth date')}}</label>

                        <div class="col-md-6">
                            <input type="date" id="bdate" name="bdate" class="form-control @error('bdate') is-invalid @enderror" autofocus>

                            @error('bdate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror    
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="joiningDate" class="col-md-4 col-form-label text-md-right">{{__('Joining date')}}</label>

                        <div class="col-md-6">
                            <input type="date" id="joiningDate" name="joiningDate" class="form-control @error('joiningDate') is-invalid @enderror" autofocus>

                            @error('joiningDate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary w-50">
                                {{ __('Save') }}
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection