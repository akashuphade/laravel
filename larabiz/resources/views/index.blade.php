@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Latest Business Listings</div>

                <div class="card-body">
                    @if (count($listings))
                        
                        <div class="list-group">
                            @foreach ($listings as $listing)
                                <div class="list-group-item"> {{ $listing->name }}
                                <a href="/listings/{{$listing->id}}" class="btn btn-sm btn-primary float-right">View</a>
                                </div>                                
                            @endforeach
                        </div>
                    @else
                        <p> You don't have any listings yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>


@endsection