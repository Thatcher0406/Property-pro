
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Submit Maintenance Request</h1>
    <form method="POST" action="{{ route('tenant.submitMaintenanceRequest') }}">
        @csrf
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
