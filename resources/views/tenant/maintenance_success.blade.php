
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="alert alert-success">
            Maintenance request received. We will get back to you shortly.
        </div>
        <a href="{{ route('tenant.dashboard') }}" class="btn btn-primary">Go to Dashboard</a>
    </div>
@endsection
