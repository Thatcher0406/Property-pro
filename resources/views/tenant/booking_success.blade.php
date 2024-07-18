@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Booking Success</h2>
    <p>Your appointment has been booked successfully!</p>
    <a href="{{ route('tenant.apartments.index') }}" class="btn btn-primary">Back to Apartments</a>
</div>
@endsection


