@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-custom">
                <div class="card-header font-weight-bolder">Inbox</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(count($messages) > 0)
                        <ul class="list-group">                       
                        @foreach($messages as $message)
                            <li class="list-group-item">
                                <a href="view/{{$message->id}}"><strong class="text-info">From: {{$message->fromUser->name}}</strong> | Subject: {{$message->subject}}</a>
                                @if(!$message->read)
                                    <span class="badge badge-danger float-right">Unread</span>
                                @endif
                            </li>
                        @endforeach
                        </ul>
                    @else
                        No Messages!
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
