@extends('home')
@section('table')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Schedule Table</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Schedule Table</h2>
            </div>
            <div class="pull-right mb-2">
                {{-- @if(Auth::user()->role == 'admin') --}}
                <a class="btn btn-success" href="{{ route('schedule.create') }}"> Create Schedule</a>
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
            <th>Event ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($schedules as $schedule)
        <tr>
            <td>{{ $schedule->id }}</td>
            <td>{{ $schedule->event_id }}</td>
            <td>{{ $schedule->name }}</td>
            <td>{{ $schedule->description }}</td>
            <td>{{ $schedule->start_date }}</td>
            <td>{{ $schedule->end_date }}</td>
            <td>
                <form action="{{ route('schedule.destroy', $schedule->id) }}" method="POST">
                    {{-- @if(Auth::user()->role == 'admin') --}}
                    <a class="btn btn-primary" href="{{ route('schedule.edit', $schedule->id) }}">Edit</a>
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
