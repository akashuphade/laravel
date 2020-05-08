@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard
                    <span class="float-right">
                        <a href="/listings/create" class="btn btn-primary">Create Listing</a>
                    </span>
                </div>

                <div class="card-body">
                    <h1> Your Listings </h1>
                    @if (count($listings))
                        
                        <table class="table table-striped">
                            <tr>
                                <th>Company</th>
                                <th>Action</th>
                            </tr>

                            @foreach ($listings as $listing)
                                <tr>
                                    <td>{{ $listing->name }}</td>
                                    <td class="row">
                                        <a href="/listings/{{ $listing->id }}/edit" class="btn btn-sm btn-primary">Edit</a>
                                        <form class="ml-2" method="post" action="/listings/{{$listing->id}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-primary">Delete</button>
                                        </form>    
                                    </td>
                                </tr>
                            @endforeach

                        </table>

                    @else
                        <p> You don't have any listings yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
