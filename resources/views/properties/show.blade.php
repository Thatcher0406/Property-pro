@extends('layouts.app')

@section('content')
    <h1>Property Details</h1>
    <div>
        <strong>Name:</strong> {{ $property->name }}
    </div>
    <div>
        <strong>Address:</strong> {{ $property->address }}
    </div>
    <div>
        <strong>Units:</strong> {{ $property->units }}
    </div>
    <a href="{{ route('properties.index') }}" class="btn btn-secondary">Back</a>
@endsection
