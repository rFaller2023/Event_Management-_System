@extends('home')
@section('table')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Schedule Information - Laravel 10 CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h2>Schedule Information</h2>
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

    <form action="{{ route('schedule.store') }}" method="POST" enctype="multipart/form-data">
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

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                    @error('name')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="text" name="description" id="description" class="form-control" placeholder="Description">
                    @error('description')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="start_date">Start Date:</label>
                    <input type="date" name="start_date" id="start_date" class="form-control" placeholder="Start Date">
                    @error('date')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="end_date">End Date:</label>
                    <input type="date"  name="end_date"  id="end_date" class="form-control" placeholder="End Date">
                    @error('date')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-right">
                <a class="btn btn-danger btn-back" href="{{ route('schedule.index') }}">Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>

</body>
</html>
@endsection
