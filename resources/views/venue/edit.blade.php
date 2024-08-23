@extends('home')
@section('table')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Venue Form - Laravel 10 CRUD Tutorial</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">

    <div class="row">
        <div class="col-lg-12">
            <h2 class="float-left">Edit Venue Form</h2>
            <a class="btn btn-danger float-right" href="{{ route('venue.index') }}"> Back</a>
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

    <form action="{{ route('venue.update', $venue->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" value="{{ $venue->name }}" class="form-control" placeholder="Name">
                    @error('name')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" name="address" value="{{ $venue->address }}" class="form-control" placeholder="Address">
                    @error('address')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="city">City:</label>
                    <input type="text" name="city" value="{{ $venue->city }}" class="form-control" placeholder="City">
                    @error('city')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="state">State:</label>
                    <input type="text" name="state" value="{{ $venue->state }}" class="form-control" placeholder="State">
                    @error('state')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="zip_code">Zip Code:</label>
                    <input type="text" name="zip_code" value="{{ $venue->zip_code }}" class="form-control" placeholder="Zip Code">
                    @error('zip_code')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="country">Country:</label>
                    <input type="text" name="country" value="{{ $venue->country }}" class="form-control" placeholder="Country">
                    @error('country')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="photo_path">Photo:</label>
                    <input type="file" name="photo_path" id="photo_path" class="form-control">
                    @error('photo_path')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                    {{-- @if($venue->photo_path) --}}
                    <img src="{{ asset('storage/' . $venue->photo_path) }}" alt="Current Photo" style="width: 100px; height: auto; margin-top: 10px;">
                    {{-- @endif --}}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-danger btn-back" href="{{ route('venue.index') }}">Back</a>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </div>

    </form>
</div>

</body>
</html>
@endsection
