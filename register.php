<?php require_once 'includes/session.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Register | CS Reviewer Hub</title>
</head>
<body>
    <div class="auth-container">
        <div class="auth-logo">
            <i class="fas fa-code"></i>
        </div>

        <h1>Create Account</h1>
        <p class="auth-subtitle">Join the CS Reviewer Hub community</p>

        <div class="auth-card">
            <form action="actions/register.php" method="POST">
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="first_name" placeholder="John">
                </div>

                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="last_name" placeholder="Doe">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="your.email@university.edu">
                </div>

                <div class="form-group">
                    <label>University</label>
                    <input type="text" name="university" placeholder="Your University Name">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Create a strong password">
                </div>

                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" placeholder="Confirm your password">
                </div>

                <div class="remember-row">
                    <label class="remember-label">
                        <input type="checkbox" name="agree_terms"> I agree to the Terms of Service and Privacy Policy
                    </label>
                </div>

                <button type="submit" class="btn-primary">Create Account</button>

                <p class="auth-footer">Already have an account? <a href="login.php">Sign in</a></p>
            </form>
        </div>
    </div>
</body>
</html>