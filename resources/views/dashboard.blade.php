@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Dashboard <span class="float-right"><a href="{{url( '/listings/create' )}}" class="btn btn-success-xs">Add Listing</a></span></div>

            <div class="card-body">

                @if( count( $listings ) )
                    <h3>Your listings</h3>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Company</th>
                            <th>Edit</th>
                        </tr>
                        </thead>
                        <tbody>
                    @foreach( $listings as $listing )
                        @php $id = $listing->id; @endphp
                            <tr>
                            <td>{{$listing->name}}</td>
                            <td><a href="{{ url( "listings/{$id}/edit" ) }}">Edit</a></td>
                            <td>
                                @include( 'inc.delete-form' )
                            </td>
                        </tr>
                        @endforeach
                    @endif
                        <tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
@endsection
