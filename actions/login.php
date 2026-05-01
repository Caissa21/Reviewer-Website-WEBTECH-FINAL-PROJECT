<?php

require_once '../includes/session.php';
require_once '../includes/functions.php';
require_once '../includes/config.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = sanitize($_POST['email']);
    $password = sanitize($_POST['password']);
    $remember_me = isset($_POST['remember_me']);

    $errors = [];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email";
    }

    if (strlen($password) < 6) {
        $errors[] = "Password too short";
    }


    if (empty($errors)) {
        $stmt = $pdo->prepare("SELECT id, full_name, email, password_hash, avatar_initials FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if (!$user) {
            $errors[] = "Email not found";
        }

        if ($user && !password_verify($password, $user['password_hash'])) {
            $errors[] = "Incorrect password";
        }

        if (empty($errors)) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['full_name'] = $user['full_name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['avatar_initials'] = $user['avatar_initials'];

            header('Location: /cs-reviewer-hub/dashboard.php');
            exit;
        }
    }
}


if (!empty($errors)) {
    foreach ($errors as $error) {
        echo $error . "<br>";
    }
}