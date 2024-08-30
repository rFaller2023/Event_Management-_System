@extends('home')
@section('table')

<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit User Form</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-sm btn-primary" href="{{ route('user.index') }}" enctype="multipart/form-data"> Back</a>
            </div>
        </div>
    </div>

    @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
    @endif

    <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')


        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="name"><strong>Name :</strong></label>
                    <input type="text" name="user_name" value="{{ $user->name }}" class="form-control" placeholder="Enter Name">
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="role"><strong>Role :</strong></label>
                    <input type="text" name="role_name" value="{{ $user->role_name }}" class="form-control" placeholder="Enter Role">
                    @error('role_name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="email"><strong>Email Address:</strong></label>
                    <input type="text" name="email" value="{{ $user->email }}" class="form-control" placeholder="Enter Email Address">
                    @error('email')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="password"><strong>Password:</strong></label>
                    <input type="text" name="password" value="{{ $user->password }}" class="form-control" placeholder="Enter Password">
                    @error('email')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>


        <button type="submit" class="btn btn-sm btn-primary ml-3">Submit</button>

    </form>
</div>
@endsection

