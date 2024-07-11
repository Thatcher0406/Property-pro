
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="alert alert-success">
            Thank you for your feedback. We will review it shortly.
        </div>
        <a href="{{ route('tenant.dashboard') }}" class="btn btn-primary">Go to Dashboard</a>
    </div>
@endsection
