@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create New Apartment</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('landlord.apartments.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" id="address" name="address" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="rent">Rent</label>
                                <input type="number" id="rent" name="rent" class="form-control">
                            </div>

                            <!-- Add more form fields as needed -->

                            <button type="submit" class="btn btn-primary">Create Apartment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
