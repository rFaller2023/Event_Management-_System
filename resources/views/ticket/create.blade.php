@extends('home')
@section('table')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Ticket Information - Laravel 10 CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

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

        {{-- <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="event_id">Event ID:</label>
                    <input type="text" name="event_id" id="event_id" class="form-control" placeholder="Event ID">
                    @error('event_id')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="attendee_id">Attendee ID:</label>
                    <input type="text" name="attendee_id" id="attendee_id" class="form-control" placeholder="Attendee ID">
                    @error('attendee_id')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div> --}}

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
                <a class="btn btn-danger btn-back" href="{{ route('ticket.index') }}">Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>

</body>
</html>
@endsection