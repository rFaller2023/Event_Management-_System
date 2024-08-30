@extends('home')
@section('table')


<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h2>Ticket Information</h2>
        </div>
    </div>

    @if(session('status'))
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        </div>
    </div>
    @endif

    <form action="{{ route('ticket.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="event_id">Event:</label>
                    <select name="event_id" id="event_id" class="form-control">
                        <option value="">Select Event</option>
                        @foreach($events as $event)
                            <option value="{{ $event->id }}">{{ $event->id }}</option>
                        @endforeach
                    </select>
                    @error('event_id')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="attendee_id">Attendee:</label>
                    <select name="attendee_id" id="attendee_id" class="form-control">
                        <option value="">Select Attendee</option>
                        @foreach($attendees as $attendee)
                            <option value="{{ $attendee->id }}">{{ $attendee->name }}</option>
                        @endforeach
                    </select>
                    @error('attendee_id')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="ticket_type">Ticket Type:</label>
                    <input type="text" name="ticket_type" id="ticket_type" class="form-control" placeholder="Ticket Type">
                    @error('ticket_type')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-right">
                <a class="btn btn-sm btn-danger btn-back" href="{{ route('ticket.index') }}">Back</a>
                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>


@endsection
