@extends('home')
@section('table')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit About Form - Laravel 10 CRUD Tutorial</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">

    <div class="row">
        <div class="col-lg-12">
            <h2 class="float-left">Edit About Form</h2>
            {{-- <a class="btn btn-danger float-right" href="{{ route('about.index') }}"> Back</a> --}}
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

    <form action="{{ route('about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" class="form-control" placeholder="Description">{{ $about->description }}</textarea>
                    @error('description')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="location">Location:</label>
                    <input type="text" name="location" value="{{ $about->location }}" class="form-control" placeholder="Location">
                    @error('location')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="date">Date:</label>
                    <input type="date" name="date" value="{{ $about->date }}" class="form-control" placeholder="Date">
                    @error('date')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-danger btn-back" href="{{ route('about.index') }}">Back</a>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </div>

    </form>
</div>

</body>
</html>
@endsection
