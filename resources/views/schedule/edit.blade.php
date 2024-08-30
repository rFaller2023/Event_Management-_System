@extends('home')
@section('table')


<div class="container">

    <div class="row">
        <div class="col-lg-12">
            <h2 class="float-left">Edit Schedule Form</h2>
            
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

    <form action="{{ route('schedule.update', $schedule->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="event_id">Event ID:</label>
                    <input type="text" name="event_id" value="{{ $schedule->event_id }}" class="form-control" placeholder="Event ID">
                    @error('event_id')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" value="{{ $schedule->name }}" class="form-control" placeholder="Name">
                    @error('name')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="text" name="description" value="{{ $schedule->description }}" class="form-control" placeholder="Description">
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
                    <input type="text" name="start_date" value="{{ $schedule->start_date }}" class="form-control" placeholder="Start Date">
                    @error('start_date')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="end_date">End Date:</label>
                    <input type="text" name="end_date" value="{{ $schedule->end_date }}" class="form-control" placeholder="End Date">
                    @error('end_date')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-sm btn-danger btn-back" href="{{ route('schedule.index') }}">Back</a>
                <button type="submit" class="btn btn-sm btn-primary ml-3">Submit</button>
            </div>
        </div>

    </form>
</div>


@endsection
