<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

</head>
<body>
<style>

body {
    font-family: "Poppins", sans-serif;
    margin: 0;
    padding: 0;
    background-image: url("../img/property-1.jpg");
    /* background-repeat: no-repeat;
    background-size: cover; */
    width: 100%;
    height: 100%;
}
.container {
    margin-top: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.card {
    background-color: #ffffff7e;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 20px;
}

.card-header {
    font-size: larger;
    font-weight: bold;
    padding: 10px;
    text-align: center;
}

.form-group {
    margin-bottom: 20px;
    margin-right: 20px;
}

input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}
.btn-primary {
    display: block;
    margin: 0 auto;
    background-color: #007bff;
    color: #fff;
    padding: 10px 100px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.btn-link {
    display: block;
    margin-top: 10px;
}

</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">{{ __('Email Address') }}</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        {{-- <div class="form-group">
                            <label for="role">{{ __('Login as') }}</label>
                            <select name="role" class="form-control" required>
                                <option value="tenant">Tenant</option>
                                <option value="landlord">Landlord</option>
                            </select>
                        </div> --}}

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            <a class="btn btn-link" href="{{ route('register') }}">
                                {{ __('Do not have an account?') }}
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>
