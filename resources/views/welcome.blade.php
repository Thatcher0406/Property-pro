<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome to Property Management System</title>

    <!-- Styles -->
    <style>
        /* Add your custom CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        /* Add more styles as needed */
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the Property Management System</h1>
        <p>Manage your properties, roles, tenants, landlords, and payments with ease.</p>
        <nav>
            <ul>
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
                <!-- Add more navigation links as needed -->
            </ul>
        </nav>
    </div>
</body>
</html>
