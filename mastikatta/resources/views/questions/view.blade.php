@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="card w-75">
        <div class="card-header justify-content-center border-0 row">
            <h1 class="text-info">Slambook Questions</h1>
        </div>
        <div class="card-body">
        
            <form method="post" action="/questions/all">
                @csrf
                @method('PUT')
                <table class="table table-hover table-bordered table-striped">
                    <thead>
                        <tr class="text-center">
                            <th width="50%">Question</th>
                            <th width="25%">Required</th>
                            <th width="25%">Visible</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($questions as $question)
                        <tr>
                            <td>{{$question->description}}</td>
                            <td class="text-center">
                                <select class="form-control" name="required_{{$question->id}}">
                                    <option value=1 @if($question->required == 1) Selected @endif >Yes</option>
                                    <option value=0 @if($question->required == 0) Selected @endif >No</option>
                                </select>    
                            </td>
                            <td class="text-center">
                                <select class="form-control" name="visible_{{$question->id}}">
                                    <option value=1 @if($question->visible == 1) Selected @endif >Yes</option>
                                    <option value=0 @if($question->visible == 0) Selected @endif >No</option>
                                </select>
                            </th>
                        @endforeach
                        
                    </tbody>
                </table>

                <div class="row justify-content-center border-0">
                    <a href="questions/create" class="btn btn-primary mr-1">Add</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection