@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="card col-md-6 card-custom">

            <div class="card-header">

                <div class="row">
                    <label class="col-md-4 text-md-right font-weight-bolder">From Name: </label>
                    <div class="col-md-5 text-md-left text-success">   
                        {{$message->fromUser->name}}
                    </div>
                    <div class="col-md-3">
                        <a href="/home" class="btn btn-success btn-sm">Go back</a>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-4 text-md-right font-weight-bolder">From E-mail: </label>
                    <div class="col-md-6 text-md-left text-success">   
                        {{$message->fromUser->email}}
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-4 text-md-right font-weight-bolder">Subject: </label>
                    <div class="col-md-6 text-md-left text-success">   
                        {{$message->subject}}
                    </div>
                </div>
            </div>

            <div class="card-body text-center">
                {{$message->body}}
            </div>

            @if(!$deleted)
            <div class="row card-footer text-center">
                <a href="{{ route('create', [$message->fromUser->id, $message->subject]) }}" class="col-md-6 btn btn-primary">Reply</a>
                <form method="post" action="/delete/{{$message->id}}" class="col-md-6 text-md-right">
                    {{csrf_field()}}
                    @method('PUT')
                    <button type="submit" class="btn btn-danger w-100">Delete</button>
                </form>
            </div>
            @endif
    
        </div>
    </div>
@endsection