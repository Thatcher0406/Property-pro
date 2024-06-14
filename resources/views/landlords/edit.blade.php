@extends('layouts.app')

@section('content')
    <h1>Edit Landlord</h1>
    <form action="{{ route('landlords.update', $landlord->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $landlord->name }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $landlord->email }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
