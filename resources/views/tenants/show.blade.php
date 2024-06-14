@extends('layouts.app')

@section('content')
    <h1>Tenant Details</h1>
    <div>
        <strong>Name:</strong> {{ $tenant->name }}
    </div>
    <div>
        <strong>Email:</strong> {{ $tenant->email }}
    </div>
    <a href="{{ route('tenants.index') }}" class="btn btn-secondary">Back</a>
@endsection
