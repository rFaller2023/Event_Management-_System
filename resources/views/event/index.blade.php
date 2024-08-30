@extends('home')
@section('table')

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert2 Script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Event Table</h2>
            </div>
            <div class="pull-right mb-2">
                {{-- @if(Auth::User()->role == 'admin') --}}
                <a class="btn btn-success" href="{{ route('event.create') }}">Create Event</a>
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
                <th>Description</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Venue ID</th>
                <th>Organizer ID</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($events as $event)
            <tr>
                <td>{{ $event->id }}</td>
                <td>{{ $event->name }}</td>
                <td>{{ $event->description }}</td>
                <td>{{ $event->start_time }}</td>
                <td>{{ $event->end_time }}</td>
                <td>{{ $event->venue_id }}</td>
                <td>{{ $event->organizer_id }}</td>
                <td>
                    <form id="delete-form-{{ $event->id }}" action="{{ route('event.destroy', $event->id) }}" method="POST" style="display: inline;">
                        {{-- @if(Auth::User()->role == 'admin') --}}
                        <a class="btn btn-sm btn-primary" href="{{ route('event.edit', $event->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $event->id }})">Delete</button>
                        {{-- @endif --}}
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('home') }}">Back</a>
    </div>
</div>

<script>
function confirmDelete(eventId) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + eventId).submit();
        }
    });
}
</script>


@endsection
