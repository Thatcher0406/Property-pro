@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Application Submitted Successfully</h2>
    <p>Your application to rent the apartment has been submitted successfully.</p>
    <a href="{{ route('tenant.apartments.index') }}" class="btn btn-primary">Back to Apartments</a>
</div>
@endsection
