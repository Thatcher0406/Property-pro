@extends('layouts.app')

@section('content')
    <h1>Role Details</h1>
    <div>
        <strong>Name:</strong> {{ $role->name }}
    </div>
    <a href="{{ route('roles.index') }}" class="btn btn-secondary">Back</a>
@endsection
