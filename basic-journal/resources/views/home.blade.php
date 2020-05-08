@extends('layouts.app')

@section('content')
    
    <div class="container">    
        <h3>Home</h3>

        <p>There are lot of benefits of daily journaling. Some of these are as below</p>
        <ul>
            <li>Keep your thoughts organized</li>
            <li>Improve your writing</li>
            <li>Set & achieve your goals</li>
            <li>Record ideas on-the-go</li>
            <li>Relieve stress</li>
        </ul>
    </div>        
@endsection

@section('sidebar')
    @parent
    <p>This is appended from home </p>
@endsection