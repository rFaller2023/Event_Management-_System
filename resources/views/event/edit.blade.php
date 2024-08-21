@extends('home')
@section('table')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Event Form - Laravel 10 CRUD Tutorial</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">

    <div class="row">
        <div class="col-lg-12">
            <h2 class="float-left">Edit Event Form</h2>
            {{-- <a class="btn btn-danger float-right" href="{{ route('events.index') }}"> Back</a> --}}
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

    <form action="{{ route('event.update', $event->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" value="{{ $event->name }}" class="form-control" placeholder="Name">
                    @error('name')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="text" name="description" value="{{ $event->description }}" class="form-control" placeholder="Description">
                    @error('description')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="start_time">Start Time:</label>
                    <input type="text" name="start_time" value="{{ $event->start_time }}" class="form-control" placeholder="Start Time">
                    @error('start_time')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="end_time">End Time:</label>
                    <input type="text" name="end_time" value="{{ $event->end_time }}" class="form-control" placeholder="End Time">
                    @error('end_time')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>


        {{-- <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="venue_id">Venue ID:</label>
                    <input type="text" name="venue_id" value="{{ $event->venue_id }}" class="form-control" placeholder="Venue ID">
                    @error('venue_id')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div> --}}
            {{-- <div class="col-md-6">
                <div class="form-group">
                    <label for="organizer_id">Organizer ID:</label>
                    <input type="text" name="organizer_id" value="{{ $event->organizer_id }}" class="form-control" placeholder="Organizer ID">
                    @error('organizer_id')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div> --}}


        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-danger btn-back" href="{{ route('event.index') }}">Back</a>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </div>

    </form>
</div>

</body>
</html>
@endsection