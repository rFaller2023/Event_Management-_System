<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Http\Request;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $venues =  Venue::get();

        return view('venue.index', compact('venues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('venue.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Venue::create($request->all());
        return redirect()->route('venue.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Venue $attends)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venue $venue)
    {
        // dd($attends);
        return view('venue.edit', compact('venue'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venue $venues)
    {
        //
        $venues->update($request->all());

        return redirect()->route('venue.index');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VenueController $venues)
    {
        //
        $venues->delete();

        return redirect()->route('venue.index');
    }
}
