@if( count( $errors->all() ) )
    @foreach( $errors->all() as $error )
        <div class="alert alert-danger">
            {{ $error }}
        </div>
        @endforeach
    @endif

@if( count( $success_message = session( 'success' ) ) )
    <div class="alert alert-success">
        {{$success_message}}
    </div>
    @endif

@if( count( $error_message = session( 'error' ) ) )
    <div class="alert alert-danger">
        {{$error_message}}
    </div>
@endif