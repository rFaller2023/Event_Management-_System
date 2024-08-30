@extends('home')
@section('table')

<div class="container">

    <div class="row">
        <div class="col-lg-12">
            <h2 class="float-left">Edit Ticket Form</h2>
            
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

    <form action="{{ route('ticket.update', $ticket->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="event_id">Event ID:</label>
                    <input type="text" name="event_id" value="{{ $ticket->event_id }}" class="form-control" placeholder="Event ID">
                    @error('event_id')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="attendee_id">Attendee ID:</label>
                    <input type="text" name="attendee_id" value="{{ $ticket->attendee_id }}" class="form-control" placeholder="Attendee ID">
                    @error('attendee_id')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="ticket_type">Ticket Type:</label>
                    <input type="text" name="ticket_type" value="{{ $ticket->ticket_type }}" class="form-control" placeholder="Ticket Type">
                    @error('ticket_type')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-danger btn-back" href="{{ route('ticket.index') }}">Back</a>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </div>

    </form>
</div>


@endsection
