@extends('layouts.app')

@section('content')
    <h1>Tenants</h1>
    <a href="{{ route('tenants.create') }}" class="btn btn-primary">Add Tenant</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tenants as $tenant)
                <tr>
                    <td>{{ $tenant->name }}</td>
                    <td>{{ $tenant->email }}</td>
                    <td>
                        <a href="{{ route('tenants
