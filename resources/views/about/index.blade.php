@extends('home')
@section('table')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Table</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>About Table</h2>
            </div>
            <div class="pull-right mb-2">
                {{-- @if(Auth::User()->role == 'admin') --}}
                <a class="btn btn-success" href="{{ route('about.create') }}"> Create About</a>
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
            <th>Description</th>
            <th>Location</th>
            <th>Date</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($abouts as $about)
        <tr>
            <td>{{ $about->id }}</td>
            <td>{{ $about->description }}</td>
            <td>{{ $about->location }}</td>
            <td>{{ $about->date }}</ td>
            <td>
                <form action="{{ route('about.destroy', $about->id) }}" method="POST">
                    {{-- @if(Auth::User()->role == 'admin') --}}
                    <a class="btn btn-primary" href="{{ route('about.edit', $about->id) }}">Edit</a>
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
