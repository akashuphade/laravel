@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="card col-md-10 card-custom">
            <div class="card-header font-weight-bolder">Send Message</div>
            <div class="card-body">
                <form method="POST" action="/send">

                    {{csrf_field()}}

                    <div class="row form-group">
                        <label for="to" class="col-md-4 col-form-label text-md-right">To</label>
                        <div class="col-md-6">
                            <select id="to" name="to" class="custom-select @error('to') is-invalid @enderror" >
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>

                            @error('to')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="subject" class="col-md-4 col-form-label text-md-right">Subject</label>
                        <div class="col-md-6">
                            <input type="text" name="subject" id="subject" class="form-control @error('subject') is-invalid @enderror" placeholder="Enter subject" value="{{$subject}}">

                            @error('subject')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="body" class="col-md-4 col-form-label text-md-right">Message</label>
                        <div class="col-md-6">
                            <textarea name="body" id="body" class="form-control @error('body') is-invalid @enderror" placeholder="Enter message" rows=3></textarea>

                            @error('body')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>

                    <div class="row py-2">
                        <div class="col-md-4"></div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary w-25">Send</button>
                        </div>
                    </div>    
                </form>
            </div>
        </div>
    </div>
@endsection