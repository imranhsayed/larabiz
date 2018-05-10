<?php

namespace App\Http\Controllers;

use App\Listing;
use Illuminate\Http\Request;

class ListingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$listings = Listing::orderBy( 'created_at', 'desc' )->get();
        return view( '/listings',compact( 'listings' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'createlisting' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate, the next line of code is not executed if the validation does not pass.
    	$this->validate( request(), [
        	'name' => 'required',
	        'website' => 'required',
	        'email' => 'email',
	        'phone' => 'required',
	        'address' => 'required',
        ] );

    	// Insert data into database.
	    $listing = new Listing;
	    $listing ->user_id = auth()->id();
	    $listing ->name = $request->input( 'name' );
	    $listing ->address = $request->input( 'address' );
	    $listing ->website = $request->input( 'website' );
	    $listing ->email = ( $request->input( 'email' ) ) ? $request->input( 'email' ) : '';
	    $listing ->phone = $request->input( 'phone' );
	    $listing ->bio = ( $request->input( 'bio' ) ) ? $request->input( 'bio' ) : '';
	    $listing->save();

	    // Redirect.
	    return redirect( url( '/dashboard' ) )->with( 'success', 'Your listing has been added' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listing = Listing::find( $id );
        return view( 'showlisting', compact( 'listing' ) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listing = Listing::find( $id );
        return view( 'edit', compact( 'listing' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
	    // Validate, the next line of code is not executed if the validation does not pass.
	    $this->validate( request(), [
		    'name' => 'required',
		    'website' => 'required',
		    'email' => 'email',
		    'phone' => 'required',
		    'address' => 'required',
	    ] );

    	$listing = Listing::find( $id );
	    $listing ->user_id = auth()->id();
	    $listing ->name = $request->input( 'name' );
	    $listing ->address = $request->input( 'address' );
	    $listing ->website = $request->input( 'website' );
	    $listing ->email = ( $request->input( 'email' ) ) ? $request->input( 'email' ) : '';
	    $listing ->phone = $request->input( 'phone' );
	    $listing ->bio = ( $request->input( 'bio' ) ) ? $request->input( 'bio' ) : '';
	    $listing->save();

	    return redirect( url( '/dashboard' ) )->with( 'success', 'Listing edited successfully' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listing = Listing::find( $id );
        $listing->delete();
        return redirect( '/dashboard' )->with( 'success', 'Deleted record successfully' );
    }
}
