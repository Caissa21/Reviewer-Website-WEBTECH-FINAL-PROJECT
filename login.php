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
        <div class="auth-card">
            <h1>Welcome Back</h1>
            <p>Sign in to access CS Reviewer Hub</p>

            <form action="actions/login.php" method="POST">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Enter your email">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter your password">
                </div>

                <div class="form-group">
                    <label><input type="checkbox" name="remember_me"> Remember me</label>
                </div>

                <button type="submit" class="btn-primary">Sign In</button>
                <button type="button" class="btn-secondary" onclick="window.location.href='register.php'">Create Account</button>
            </form>

            <p>Don't have an account? <a href="register.php">Sign up</a></p>
        </div>
    </div>
</body></html>