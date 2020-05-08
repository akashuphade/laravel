@extends('layouts.app');

@section('content')
    <h3 class="text-center">Messages</h3>
    <table class="table table-bordered table-striped table-sm" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Sender Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
        </tr>
        </thead>
        <tbody>
        @foreach($messages as $message)
        <tr class="{{$loop->index % 2 == 0 ? 'table-primary' : 'table-success' }}">
            <td>{{ $message->name }}</td>
            <td>{{ $message->email }}</td>
            <td>{{ $message->subject }}</td>
            <td>{{ $message->message }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection