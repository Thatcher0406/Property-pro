@extends('layouts.app')

@section('content')
    <h1>Landlord Details</h1>
    <div>
        <strong>Name:</strong> {{ $landlord->name }}
    </div>
    <div>
        <strong>Email:</strong> {{ $landlord->email }}
    </div>
    <a href="{{ route('landlords.index') }}" class="btn btn-secondary">Back</a>
@endsection
