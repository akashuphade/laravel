@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $listing->name }}
                    <a href="/" class="btn btn-primary float-right">Go Back</a>
                </div>

                <div class="card-body">
                    <div class="list-group">
                        <div class="list-group-item">
                            <strong class="text-md-right">Website: </strong> <a href="{{ $listing->website }}">{{ $listing->website }}</a>
                        </div>
                        <div class="list-group-item"><strong class="text-md-right">E-mail: </strong><a href="mailto:{{ $listing->email }}?subject=mail from listing">{{ $listing->email }}</a></div>
                        <div class="list-group-item"><strong>Address: </strong>{{ $listing->address }}</div>
                        <div class="list-group-item"><strong>Phone: </strong>{{ $listing->phone }}</div>
                        <div class="list-group-item"><strong>Bio: </strong>{{ $listing->bio }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection