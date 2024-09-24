<?php
session_start(); // Start the session
include 'connect.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // This part always redirects to dashboard.php regardless of credentials
    header("Location: dashboard.php");
    exit();
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colorful Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #e3f2fd, #ffe0b2); /* Light pastel gradient */
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Arial', sans-serif;
        }
        .login-container {
            background: rgba(255, 255, 255, 0.95); /* Slightly transparent white */
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        h2 {
            margin-bottom: 20px;
            color: #ffab40; /* Light orange */
            text-align: center;
        }
        .form-control {
            border-radius: 8px;
            border: 2px solid #80deea; /* Light teal */
            transition: border-color 0.3s ease-in-out;
        }
        .form-control:focus {
            border-color: #ffab40; /* Light orange */
            box-shadow: 0 0 0 0.2rem rgba(255, 171, 64, 0.25);
        }
        .btn-primary {
            background-color: #80deea; /* Light teal */
            border-color: #80deea;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #ffab40; /* Light orange */
            border-color: #ffab40;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
        }
        .footer a {
            color: #80deea; /* Light teal */
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>User Login</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
        <p class="footer mt-3">Don't have an account? <a href="registration.php">Register here</a>.</p>
    </div>
</body>
</html>
