@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Latest Business listings</div>

                <div class="card-body">
                    @if( count( $listings ) )
                        <ul class="list-groups">
                            @foreach( $listings as $listing )
                                <li class="list-group-item"><a href="{{url( "/listings/{$listing->id}" )}}">{{$listing->name}}</a></li>
                            @endforeach
                        </ul>
                        @else
                        <p>No listings found</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
