@extends('home')
@section('table')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Attendees Table</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Attendees Table</h2>
            </div>
            <div class="pull-right mb-2">
                {{-- @if(Auth::user()->role == 'admin') --}}
                <a class="btn btn-success" href="{{ route('attend.create') }}">Create Attendee</a>
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
                <th>Name</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>Zip Code</th>
                <th>Country</th>
                <th>Photo</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($attends as $attend)
            <tr>
                <td>{{ $attend->id }}</td>
                <td>{{ $attend->name }}</td>
                <td>{{ $attend->address }}</td>
                <td>{{ $attend->city }}</td>
                <td>{{ $attend->state }}</td>
                <td>{{ $attend->zip_code }}</td>
                <td>{{ $attend->country }}</td>
                <td>
                    @if($attend->photo_path)
                    <img src="{{ asset('storage/' . $attend->photo_path) }}" alt="Photo" style="width: 50px; height: 50px;">
                    @else
                    <img src="{{ asset('assets/img/hero-bg.jpg') }}" alt="No Photo" style="width: 50px; height: 50px;">
                    @endif
                </td>
                <td>
                    {{-- @if(Auth::user()->role == 'admin') --}}
                    <form action="{{ route('attend.destroy', $attend->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('attend.edit', $attend->id) }}">Edit</a>
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
