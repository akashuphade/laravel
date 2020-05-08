@extends('layouts.app')

@section('content')

<div class="bg-light">

    <div class="row">
        <div class="col-md-4 col-md-left"> 
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
        </div>
        <div class="col-md-6 m-4">
            <h1>{{ Auth::user()->name }}</h1>
            <h3>
        </div>
    </div>
        
</div>

@endsection