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
                <h2>Organizers Table</h2>
            </div>
            <div class="pull-right mb-2">
                {{-- @if(Auth::user()->role == 'admin') --}}
                <a class="btn btn-success" href="{{ route('organizer.create') }}">Create Organizer</a>
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
                <th>Contact Info</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($organizers as $organizer)
            <tr>
                <td>{{ $organizer->id }}</td>
                <td>{{ $organizer->name }}</td>
                <td>{{ $organizer->contact_info }}</td>
                <td>
                    {{-- @if(Auth::user()->role == 'admin') --}}
                    <form id="delete-form-{{ $organizer->id }}" action="{{ route('organizer.destroy', $organizer->id) }}" method="POST" style="display: inline;">
                        <a class="btn btn-sm btn-primary" href="{{ route('organizer.edit', $organizer->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $organizer->id }})">Delete</button>
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

<script>
function confirmDelete(organizerId) {
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
            document.getElementById('delete-form-' + organizerId).submit();
        }
    });
}
</script>


@endsection
