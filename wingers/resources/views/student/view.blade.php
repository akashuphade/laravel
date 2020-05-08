@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="card w-75">
        <div class="card-header text-center">Student List</div>
        <div class="card-body">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Class</th>
                        <th>Board</th>
                        <th>Birth Date</th>
                        <th>Joining Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                    <tr>
                        <td>{{$student->firstname.' '.$student->lastname}}</td>
                        <td>{{$student->class}}</td>
                        <td>{{$student->board->board_name}}</td>
                        <td>{{$student->birth_date}}</td>
                        <td>{{$student->joining_date}}</td>
                        <td>
                            <a href="/students/{{$student->id}}/edit" class="btn btn-sm btn-primary">Edit</a>
                            <form method="POST" class="row d-inline-block ml-2" action="/students/{{$student->id}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="ml-1 btn btn-sm btn-danger">Delete</button>
                            </form>    
                        </td>
                    </tr>
                    
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection