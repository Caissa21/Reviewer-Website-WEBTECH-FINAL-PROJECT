<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | CS Reviewer Hub</title>
</head>

<body>

    <h1>Create Account</h1>
    <p>Join the CS Reviewer Hub community</p>
    <form action="actions/register.php" method="POST">
        <label>First Name</label>
        <input type="text" name="first_name">

        <label>Last Name</label>
        <input type="text" name="last_name">

        <label>Email</label>
        <input type="email" name="email">

        <label>University</label>
        <input type="text" name="university">

        <label>Password</label>
        <input type="password" name="password">

        <label>Confirm Password</label>
        <input type="password" name="confirm_password">

        <label>Agree to Terms</label>
        <input type="checkbox" name="agree_terms">

        <button type="submit">Create Account</button>
        <button type="button" onclick="window.location.href='login.php'">Cancel</button>

        <a href="login.php">Already have an account? Sign in</a>
    </form>
</body>

</html>