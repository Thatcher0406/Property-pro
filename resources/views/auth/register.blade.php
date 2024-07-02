<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>
                    <div class="card-body">
                        <form id="register-form" method="POST" action="{{ route('register.post') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">{{ __('Name') }}</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">{{ __('Email Address') }}</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>
                                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password">
                                <meter max="4" id="password-strength-meter"></meter>
                                <p id="password-strength-text"></p>
                                @error('password')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                <input type="password" id="password-confirm" name="password_confirmation" class="form-control" required autocomplete="new-password">
                                <span id="password-confirmation-message"></span>
                            </div>

                            <div class="form-group">
                                <label for="phone">{{ __('Phone') }}</label>
                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" >
                                @error('phone')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="dob">{{ __('Date of Birth') }}</label>
                                <input type="date" name="dob" class="form-control @error('dob') is-invalid @enderror" value="{{ old('dob') }}" >
                                @error('dob')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="role">{{ __('Role') }}</label>
                                <select name="role" class="form-control @error('role') is-invalid @enderror" required>
                                    <option value="tenant">Tenant</option>
                                    <option value="landlord">Landlord</option>
                                    <option value="admin">Admin</option>
                                </select>
                                @error('role')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include zxcvbn.js -->
    <script src="{{ asset('js/zxcvbn.js') }}"></script>

    <!-- Password Strength Meter and Confirmation Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var form = document.getElementById('register-form');
            var password = document.getElementById('password');
            var passwordConfirm = document.getElementById('password-confirm');
            var meter = document.getElementById('password-strength-meter');
            var text = document.getElementById('password-strength-text');
            var confirmationMessage = document.getElementById('password-confirmation-message');

            password.addEventListener('input', function () {
                var val = password.value;
                var result = zxcvbn(val);

                // Update the password strength meter
                meter.value = result.score;

                // Update the text indicator
                if (val !== "") {
                    text.innerHTML = "Strength: " + ["Worst", "Bad", "Weak", "Good", "Strong"][result.score];
                } else {
                    text.innerHTML = "";
                }
            });

            passwordConfirm.addEventListener('input', function () {
                if (password.value !== passwordConfirm.value) {
                    confirmationMessage.style.color = 'red';
                    confirmationMessage.innerHTML = 'Passwords do not match';
                } else {
                    confirmationMessage.style.color = 'green';
                    confirmationMessage.innerHTML = 'Passwords match';
                }
            });

            form.addEventListener('submit', function (e) {
                if (password.value !== passwordConfirm.value) {
                    e.preventDefault();
                    confirmationMessage.style.color = 'red';
                    confirmationMessage.innerHTML = 'Passwords do not match';
                } else if (meter.value < 2) {
                    e.preventDefault();
                    text.style.color = 'red';
                    text.innerHTML = 'Password is too weak';
                }
            });
        });
    </script>
</body>
</html>
