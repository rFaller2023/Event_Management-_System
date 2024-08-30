@extends('home')
@section('table')


<div class="container">

    <div class="row">
        <div class="col-lg-12">
            <h2 class="float-left">Edit Organizer Form</h2>
            
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

    <form action="{{ route('organizer.update', $organizer->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" value="{{ $organizer->name }}" class="form-control" placeholder="Name">
                    @error('name')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="contact_info">Contact Info:</label>
                    <input type="text" name="contact_info" value="{{ $organizer->contact_info }}" class="form-control" placeholder="Contact Info">
                    @error('contact_info')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-sm btn-danger btn-back" href="{{ route('organizer.index') }}">Back</a>
                <button type="submit" class="btn btn-sm btn-primary ml-3">Submit</button>
            </div>
        </div>

    </form>
</div>


@endsection
