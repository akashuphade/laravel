@extends('layouts.app')

@section('content')
    
    <div class="container">    
        <h3>About</h3>

        <p>I am an individual developer. Looking for enhancing my Laravel skills by developing 
        various new projects. This is my first project.</p>
        
    </div>        
@endsection

@section('sidebar')
    @parent
    <p>This is appended from home </p>
@endsection