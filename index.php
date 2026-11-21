<?php
session_start();
require_once 'db.php';

// If user is already logged in, redirect directly to the successful login page
if (isset($_SESSION['user'])) {
    header("Location: welcome.php");
    exit();
}

$error_message = '';
$info_message = '';
$entered_username = '';

// Check for feedback messages via GET
if (isset($_GET['msg']) && $_GET['msg'] === 'logged_out') {
    $info_message = 'You have been successfully logged out.';
} elseif (isset($_GET['error']) && $_GET['error'] === 'unauthorized') {
    $error_message = 'Please log in first to access the dashboard.';
}

// Handle Form Submission (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $entered_username = $_POST['username'] ?? '';
    $entered_password = $_POST['password'] ?? '';

    $user = authenticate_user($entered_username, $entered_password, $database);

    if ($user) {
        // Successful Login: Save user to session and redirect
        $_SESSION['user'] = $user;
        $_SESSION['login_time'] = date('Y-m-d H:i:s');
        header("Location: welcome.php");
        exit();
    } else {
        // Failed Login: Show failure message
        $error_message = 'Invalid Login Name or Password! Access Denied.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login &amp; Validation - Luvkush Sharma (24BTRSN022)</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>User Login</h2>
                <p>Enter your credentials to access your account &bull; Luvkush Sharma (24BTRSN022)</p>
            </div>

            <!-- Failure / Error Message -->
            <?php if (!empty($error_message)): ?>
                <div class="alert alert-error">
                    <span>❌</span>
                    <span><strong>Login Failed:</strong> <?php echo htmlspecialchars($error_message); ?></span>
                </div>
            <?php endif; ?>

            <!-- Info Message (e.g. Logged Out) -->
            <?php if (!empty($info_message)): ?>
                <div class="alert alert-info">
                    <span>ℹ️</span>
                    <span><?php echo htmlspecialchars($info_message); ?></span>
                </div>
            <?php endif; ?>

            <!-- Login Form -->
            <form action="index.php" method="POST" autocomplete="off">
                <div class="form-group">
                    <label for="username">Login Name (Username)</label>
                    <input 
                        type="text" 
                        id="username" 
                        name="username" 
                        required 
                        placeholder="Enter your username"
                        value="<?php echo htmlspecialchars($entered_username); ?>"
                        autofocus
                    >
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        required 
                        placeholder="Enter your password"
                    >
                </div>

                <button type="submit" class="btn">Sign In</button>
            </form>
        </div>
    </div>
</body>
</html>
