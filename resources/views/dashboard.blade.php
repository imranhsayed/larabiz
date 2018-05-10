@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Dashboard <span class="float-right"><a href="{{url( '/listings/create' )}}" class="btn btn-success-xs">Add Listing</a></span></div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                @if( count( $listings ) )
                    <h3>Your listings</h3>
                    <table class="table table-striped">
                        <tr>
                            <th>Company</th>
                            <th></th>
                            <th></th>
                        </tr>
                    @foreach( $listings as $listing )
                        <td>{{$listing->name}}</td>
                        @endforeach
                    @endif
                    </table>
            </div>
        </div>
    </div>
</div>
@endsection
