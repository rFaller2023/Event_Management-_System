@extends('home')
@section('table')


<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Attendee Table</h2>
            </div>
            <div class="pull-right mb-2"> 
                {{-- @if(Auth::User()->role == 'admin') --}}
                <a class="btn btn-success" href="{{ route('attendee.create') }}"> Create Attendee</a>
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
            <th>Email</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($attendees as $attendee)
        <tr>
            <td>{{ $attendee->id }}</td>
            <td>{{ $attendee->name }}</td>
            <td>{{ $attendee->email }}</td>
            <td>
                <form action="{{ route('attendee.destroy', $attendee->id) }}" method="POST">
                    {{-- @if(Auth::User()->role == 'admin') --}}
                    <a class="btn btn-sm btn-primary" href="{{ route('attendee.edit', $attendee->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
                {{-- @endif --}}
            </td>
        </tr>
        @endforeach
    </table>
    </div>
    <div class="pull-right">
        <a class="btn btn-sm btn-primary" href="{{ route('home') }}">Back</a>
    </div>
</div>


@endsection
