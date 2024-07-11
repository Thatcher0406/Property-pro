@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Submit Maintenance Request</h1>
        <form action="{{ route('tenant.submitMaintenanceRequest') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
