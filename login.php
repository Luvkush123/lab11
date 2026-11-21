<?php
session_start();
require_once 'db.php';

// Ensure this file only processes POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: login.html");
    exit();
}

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Check credentials against the database
$user = authenticate_user($username, $password, $database);

if ($user) {
    // If credentials match -> Set session and redirect to successful login page
    $_SESSION['user'] = $user;
    $_SESSION['login_time'] = date('Y-m-d H:i:s');
    header("Location: welcome.php");
    exit();
} else {
    // If credentials mismatch -> Show failure message page
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Failed</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container">
            <div class="card profile-card">
                <div class="alert alert-error">
                    <span>❌</span>
                    <span><strong>Login Failed!</strong></span>
                </div>

                <div class="avatar" style="background: #fee2e2; color: #ef4444;">
                    !
                </div>

                <div class="card-header">
                    <h2>Access Denied</h2>
                    <p>The login name or password you entered does not match the database records.</p>
                </div>

                <div style="margin-top: 24px;">
                    <a href="login.html" class="btn">Try Again</a>
                    <a href="index.php" class="btn btn-secondary" style="margin-top: 10px;">Back to Home</a>
                </div>
            </div>
        </div>
    </body>
    </html>
    <?php
    exit();
}
