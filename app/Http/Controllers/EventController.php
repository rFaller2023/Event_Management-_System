<?php

namespace App\Http\Controllers;

use App\Mail\EventNotification;
use App\Models\Event;
use App\Models\Organizer;
use App\Models\User;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $events =  Event::get();

        return view('event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
       $venues =   Venue::all();
       $organizers = Organizer::all();
        return view('event.create', compact('venues', 'organizers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $event = Event::create($request->all());

        // Get all users to notify (this can be modified based on your requirements)
        $users = User::all(); // Or filter to a specific group of users
    
        // Send an email notification to each user
        foreach ($users as $user) {
            Mail::to($user->email)->send(new EventNotification($event, $user));
        }
    
        return redirect()->route('event.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
        return view('event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
        $event->update($request->all());

        return redirect()->route('event.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route('event.index')->with('success', 'Event deleted successfully.');
    }
}
