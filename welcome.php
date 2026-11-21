<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: index.php?error=unauthorized");
    exit();
}

$user = $_SESSION['user'];
$login_time = $_SESSION['login_time'] ?? date('Y-m-d H:i:s');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Successful - Luvkush Sharma (24BTRSN022)</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="card profile-card">
            <!-- Success Alert Badge -->
            <div class="alert alert-success">
                <span>✅</span>
                <span><strong>Authentication Successful!</strong> Welcome to the portal.</span>
            </div>

            <div class="avatar">
                <?php echo strtoupper(substr($user['username'], 0, 1)); ?>
            </div>

            <div class="card-header">
                <h2>Welcome, <?php echo htmlspecialchars($user['fullname']); ?>!</h2>
                <p><span class="badge"><?php echo htmlspecialchars($user['role']); ?></span></p>
            </div>

            <table class="info-table">
                <tr>
                    <th>Login Name</th>
                    <td><?php echo htmlspecialchars($user['username']); ?></td>
                </tr>
                <tr>
                    <th>Full Name</th>
                    <td><?php echo htmlspecialchars($user['fullname']); ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                </tr>
                <tr>
                    <th>Role</th>
                    <td><?php echo htmlspecialchars($user['role']); ?></td>
                </tr>
                <tr>
                    <th>Login Time</th>
                    <td><?php echo htmlspecialchars($login_time); ?></td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td><span style="color: #10b981; font-weight: bold;">● Active Session</span></td>
                </tr>
            </table>

            <div style="display: flex; gap: 10px; margin-top: 20px;">
                <a href="logout.php" class="btn btn-danger">Log Out</a>
            </div>
        </div>
    </div>
</body>
</html>
