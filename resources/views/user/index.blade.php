@extends('home')
@section('table')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Users</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- SweetAlert2 Script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<div class="container mt-2">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Users</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('user.create') }}">Add User</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class = "table-responsive">
    <table class="table table-bordered">
        <tr>
            <th>#</th>
            {{-- <th>Role</th> --}}
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            {{-- <th>Password</th> --}}
            <th width="280px">Action</th>
        </tr>


        <tr>
            @foreach($user as $users)
            {{-- @if($users->role == 'spectator') --}}
            {{-- <td>{{++$i}}</td> --}}
            <td>{{$users->id}}</td>
            {{-- <td>{{$users->role}}</td> --}}
            <td>{{$users->name}}</td>
            <td>{{$users->email}}</td>
            <td>{{$users->role_name}}</td>

            <td>
                <form action="{{route('user.destroy', $users->id)}}" method="POST">
                    <a class="btn btn-primary" href="{{route('user.edit', $users->id)}}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        {{-- @endif --}}
        @endforeach
    </table>
    </div>
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('home') }}">Back</a>
    </div>
</div>

<script>
function confirmDelete(userId) {
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
            document.getElementById('delete-form-' + userId).submit();
        }
    });
}
</script>

</body>
</html>
@endsection
