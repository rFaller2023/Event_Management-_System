@extends('home')
@section('table')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Venues Table</h2>
            </div>
            <div class="pull-right mb-2">
                {{-- @if(Auth::user()->role == 'admin') --}}
                <a class="btn btn-success" href="{{ route('venue.create') }}">Create Venue</a>
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
            @foreach ($venues as $venue)
            <tr>
                <td>{{ $venue->id }}</td>
                <td>{{ $venue->name }}</td>
                <td>{{ $venue->address }}</td>
                <td>{{ $venue->city }}</td>
                <td>{{ $venue->state }}</td>
                <td>{{ $venue->zip_code }}</td>
                <td>{{ $venue->country }}</td>
                <td>
                    @if($venue->photo_path)
                    <img src="{{ asset('storage/' . $venue->photo_path) }}" alt="Photo" style="width: 50px; height: 50px;">
                    @else
                    <img src="{{ asset('assets/img/hero-bg.jpg') }}" alt="No Photo" style="width: 50px; height: 50px;">
                    @endif
                </td>
                <td>
                    {{-- @if(Auth::user()->role == 'admin') --}}
                    <form id="delete-form-{{ $venue->id }}" action="{{ route('venue.destroy', $venue->id) }}" method="POST" style="display: inline;">
                        <a class="btn btn-sm btn-primary" href="{{ route('venue.edit', $venue->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $venue->id }})">Delete</button>
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

<!-- Combined Bootstrap and Dependencies Script -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
function confirmDelete(venueId) {
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
      document.getElementById('delete-form-' + venueId).submit();
    }
  });
}
</script>


@endsection
