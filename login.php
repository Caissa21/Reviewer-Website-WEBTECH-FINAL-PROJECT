<?php require_once 'includes/session.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Login | CS Reviewer Hub</title>
</head>
<body>
    <div class="auth-container">
        <div class="auth-logo">
            <i class="fas fa-code"></i>
        </div>

        <h1>Welcome Back</h1>
        <p class="auth-subtitle">Sign in to access CS Reviewer Hub</p>

        <div class="auth-card">
            <form action="actions/login.php" method="POST">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="your.email@university.edu">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter your password">
                </div>

                <div class="remember-row">
                    <label class="remember-label">
                        <input type="checkbox" name="remember_me"> Remember me
                    </label>
                    <a href="#">Forgot password?</a>
                </div>

                <button type="submit" class="btn-primary">Sign In</button>

                <p class="auth-footer">Don't have an account? <a href="register.php">Sign up</a></p>
            </form>
        </div>
    </div>
</body>
</html>