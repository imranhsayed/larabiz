{!!Form::open(['action' => [ 'ListingsController@destroy', $listing->id ],'method' => 'POST', 'onsubmit' => 'return confirm( "Are you sure?" )'])!!}
{{Form::hidden('_method','DELETE' )}}
{{Form::bsSubmit('Delete', ['class' => 'btn btn-danger'])}}
{!! Form::close() !!}