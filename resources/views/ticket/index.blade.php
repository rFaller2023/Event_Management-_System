@extends('home')
@section('table')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ticket Table</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Ticket Table</h2>
            </div>
            <div class="pull-right mb-2">
                {{-- @if(Auth::User()->role == 'admin') --}}
                <a class="btn btn-success" href="{{ route('ticket.create') }}"> Create Ticket</a>
                {{-- @endif --}}
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th>#</th>
            {{-- <th>Event ID</th>
            <th>Attendee ID</th> --}}
            <th>Ticket Type</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($tickets as $ticket)
        <tr>
            <td>{{ $ticket->id }}</td>
            {{-- <td>{{ $ticket->event_id }}</td>
            <td>{{ $ticket->attendee_id }}</td> --}}
            <td>{{ $ticket->ticket_type }}</td>
            <td>
                <form action="{{ route('ticket.destroy', $ticket->id) }}" method="POST">
                    {{-- @if(Auth::User()->role == 'admin') --}}
                    <a class="btn btn-primary" href="{{ route('ticket.edit', $ticket->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                {{-- @endif --}}
            </td>
        </tr>
        @endforeach
    </table>
    </div>
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('home') }}">Back</a>
    </div>
</div>

</body>
</html>
@endsection
