@extends('layouts.app')

@section('content')
    
    @if (count($students) > 0)
        
        <div class="card">
            <div class="card-header text-center"><h2>Students</h2></div>
            <div class="card-body">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Class</th>
                        <th>Created at</th>
                        <th>modified at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($students as $student)
                    <tr>
                        <td>{{$student->name}}</td>
                        <td>{{$student->email}}</td>
                        <td>{{$student->class}}</td>
                        <td>{{date('d-m-Y H:i:s', strtotime($student->created_at))}}</td>
                        <td>{{date('d-m-Y H:i:s', strtotime($student->updated_at))}}</td>
                        <td>    
                            <a href="request/{{$student->id}}/edit" class="btn btn-secondary">Edit</a>
                            <form method="post" action="/request/{{$student->id}}">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>    
                    </tr>
                
                @endforeach
                </tbody>
            </table>    
            </div>
        </div>
    @else 
        <span>No students</span>
    @endif
@endsection