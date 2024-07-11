@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Landlord Dashboard</h1>
    <p>Welcome, {{ Auth::user()->name }}</p>
    <a href="{{ route('landlord.applications') }}">View Applications</a>
    <a href="{{ route('landlord.apartments.index') }}">Manage Apartments</a>
</div>
@endsection
