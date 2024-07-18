@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Maintenance Request Success</h2>
    <p>Your maintenance request has been submitted successfully!</p>
    <a href="{{ route('tenant.apartments.index') }}" class="btn btn-primary">Back to Apartments</a>
</div>
@endsection
