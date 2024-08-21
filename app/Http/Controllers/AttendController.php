<?php

namespace App\Http\Controllers;

use App\Models\Attend;
use App\Models\Attendees;
use Illuminate\Http\Request;

class AttendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $attends =  Attend::get();

        return view('attend.index', compact('attends'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('attend.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Attend::create($request->all());
        return redirect()->route('attend.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Attend $attends)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attend $attend)
    {
        // dd($attends);
        return view('attend.edit', compact('attend'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attend $attends)
    {
        //
        $attends->update($request->all());

        return redirect()->route('attend.index');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attend $attends)
    {
        //
        $attends->delete();

        return redirect()->route('attend.index');
    }
}
