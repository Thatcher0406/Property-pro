@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Application Success</h2>
    <p>Your application has been submitted successfully!</p>
    <a href="{{ route('tenant.apartments.index') }}" class="btn btn-primary">Back to Apartments</a>
</div>
@endsection
