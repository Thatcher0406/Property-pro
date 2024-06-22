<!DOCTYPE html>
<html>
<head>
    <title>Activation Pending</title>
    <style>
        body {
            font-family: "Poppins", sans-serif;
            text-align: center;
            background-image: url("../img/property-2.jpg");
            /*background-repeat: no-repeat;
            background-size: 100%; */
        }

        h1 {
            color: #000000;
        }

        p {
            color: #000000;
        }

        .loader {
            display: inline-block;
            border: 4px solid #f3f3f3;
            border-top: 4px solid #3498db;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            animation: spin 2s linear infinite;
        }

        .btn-primary {
            display: inline-block;
            margin: 0 auto;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <h1>Thank you for registering!</h1>
    <p>Please check your email and click the activation link to activate your account.</p>
    <div class="loader"></div>
    <br>
    <br>
    <a href="https://mail.google.com/" target="_self">
        <button class="btn btn-primary">Go to Email</button>
    </a>
    </a>
</body>
</html>
