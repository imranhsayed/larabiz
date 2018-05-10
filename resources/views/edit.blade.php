@extends( 'layouts.app' )

@section( 'content' )
    <a href="{{url( '/dashboard' )}}" class="btn btn-outline-secondary">Go Back</a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Listings</div>
                <div class="card-body">
                    {!!Form::open(['action' => [ 'ListingsController@update', $listing->id ],'method' => 'POST'])!!}
                    {{Form::bsText('name',$listing->name,['placeholder' => 'Company Name'])}}
                    {{Form::bsText('website',$listing->website,['placeholder' => 'Company Website'])}}
                    {{Form::bsText('email',$listing->email,['placeholder' => 'Contact Email'])}}
                    {{Form::bsText('phone',$listing->phone,['placeholder' => 'Contact Phone'])}}
                    {{Form::bsText('address',$listing->address,['placeholder' => 'Business Address'])}}
                    {{Form::bsTextArea('bio',$listing->bio,['placeholder' => 'About This Business'])}}
                    {{Form::hidden('_method','PUT' )}}
                    {{Form::bsSubmit('submit')}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection