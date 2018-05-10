<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    function user() {
    	return $this->belongsTo( 'App\User' );
    }
}
