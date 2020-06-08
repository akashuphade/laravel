@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="card col-md-6 card-custom">

            <div class="card-header">

                <div class="row">
                    <label class="col-md-4 text-md-right font-weight-bolder">To Name: </label>
                    <div class="col-md-5 text-md-left text-success">   
                        {{$message->toUser->name}}
                    </div>
                    <div class="col-md-3">
                        <a href="/sent" class="btn btn-success btn-sm">Go back</a>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-4 text-md-right font-weight-bolder">To E-mail: </label>
                    <div class="col-md-6 text-md-left text-success">   
                        {{$message->toUser->email}}
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
        </div>
    </div>
@endsection