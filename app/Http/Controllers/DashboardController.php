<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Meaning this dashboard will not be accessible if the user is not logged in.
    	$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->id();
        $user = User::find( $user_id );
        $listings =  $user->listings;
    	return view('dashboard', compact( 'listings' ) );
    }
}
