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
    <h1>Welcome Back</h1>
    <p>Sign in to access CS Reviewer Hub</p>

    <form action="actions/login.php" method="POST">

        <label>Enter your Email</label>
        <input type="email" name="email">

        <label>Enter your Password</label>
        <input type="password" name="password">

        <label>Remember me</label>
        <input type="checkbox" name="remember_me">

        <button type="submit">Sign in</button>

        <a href="register.php">Sign up</a>
    </form>
</body>
</html>