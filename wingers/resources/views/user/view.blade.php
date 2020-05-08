@extends('layouts.app')

@section('content')

<div class="bg-light">

    <div class="row">
        <div class="col-md-4 col-md-left"> 
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
        </div>
        <div class="col-md-6 m-4">
            <h1>{{ Auth::user()->name }}</h1>
            <h3>Software Developer</h3>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-md-6 float-right">
            <nav>
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="true">About</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                    <form>
                        <div class="form-group row">
                            <label class="col-form-label col-md-4 text-right font-weight-bold">Name:</label>
                            <label class="col-md-6 col-form-label">{{ $user->name }}</label>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-4 text-right font-weight-bold">E-mail:</label>
                            <label class="col-md-6 col-form-label">{{ $user->email }}</label>
                        </div>
                    </form>
                </div>
                        
            </div>
    </div>
        
</div>

@endsection