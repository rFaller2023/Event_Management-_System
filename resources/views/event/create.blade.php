@extends('home')
@section('table')

<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h2>Event Information</h2>
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

    <form action="{{ isset($event) ? route('event.update', $event->id) : route('event.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($event))
            @method('PUT')
        @endif

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ old('name', isset($event) ? $event->name : '') }}">
                    @error('name')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="text" name="description" id="description" class="form-control" placeholder="Description" value="{{ old('description', isset($event) ? $event->description : '') }}">
                    @error('description')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        @php
        $startTime = old('start_time', isset($event) ? $event->start_time : now()->format('H:i'));
        $endTime = old('end_time', isset($event) ? $event->end_time : now()->addHours(8)->format('H:i'));
        @endphp

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="start_time">Start Time:</label>
                    <input type="time" name="start_time" value="{{ $startTime }}" id="start_time" class="form-control" placeholder="Start time">
                    @error('start_time')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="end_time">End Time:</label>
                    <input type="time" name="end_time" value="{{ $endTime }}" id="end_time" class="form-control" placeholder="End time">
                    @error('end_time')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="venue_id">Venue:</label>
                    <select name="venue_id" id="venue_id" class="form-control">
                        <option value="">Select Venue</option>
                        @foreach($venues as $venue)
                            <option value="{{ $venue->id }}" {{ old('venue_id', isset($event) ? $event->venue_id : '') == $venue->id ? 'selected' : '' }}>
                                {{ $venue->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('venue_id')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="organizer_id">Organizer:</label>
                    <select name="organizer_id" id="organizer_id" class="form-control">
                        <option value="">Select Organizer</option>
                        @foreach($organizers as $organizer)
                            <option value="{{ $organizer->id }}" {{ old('organizer_id', isset($event) ? $event->organizer_id : '') == $organizer->id ? 'selected' : '' }}>
                                {{ $organizer->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('organizer_id')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-right">
                <a class="btn btn-sm btn-danger btn-back" href="{{ route('event.index') }}">Back</a>
                <button type="submit" class="btn btn-sm btn-primary">{{ isset($event) ? 'Update' : 'Submit' }}</button>
            </div>
        </div>
    </form>
</div>


@endsection
