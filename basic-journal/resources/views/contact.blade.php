@extends('layouts.app')

@section('content')
    <h1>Contact Us</h1>


    <form method="post" action="{{ route('contact-form-submit') }}">

        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Enter full name">
            @error('name')
            <p class="text-danger">{{ $message }}</p>
            @enderror

        </div>
        
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email"  aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            @error('email')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" id="subject" placeholder="Enter subject">
            @error('subject')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" class="form-control @error('message') is-invalid @enderror" id="message" rows="3"></textarea>
            @error('message')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

@section('sidebar')
    @parent
    this is appended from contact us
@endsection