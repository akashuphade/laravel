@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        @foreach ($students as $student)
            <div class="card m-2">
                <div class="card-header">
                    <h3 class="text-center">Class: {{ $student->class}}</h3>
                </div>
                <div class="card-body">
                    <label>Total Students: &nbsp;</label><a href= "/students/{{$student->class}}"> {{ $student->student_count}} </a>
                </div>
            </div>
            
        @endforeach
    </div>
@endsection