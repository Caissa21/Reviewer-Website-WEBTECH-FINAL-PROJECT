<?php

require_once '../includes/session.php';
require_once '../includes/functions.php';
require_once '../includes/config.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = sanitize($_POST['first_name']);
    $last_name = sanitize($_POST['last_name']);
    $full_name = $first_name . " " . $last_name;

    $email = sanitize($_POST['email']);
    $university = sanitize($_POST['university']);
    $password = sanitize($_POST['password']);
    $confirm_password = sanitize($_POST['confirm_password']);
    $agree_terms = isset($_POST['agree_terms']);


    $errors = [];

    if (strlen($full_name) < 2) {
        $errors[] = "Full name is too short";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email";
    }

    if (strlen($university) < 2) {
        $errors[] = "University is too short";
    }

    if (strlen($password) < 8) {
        $errors[] = "Password is too short";
    }

    if ($password !== $confirm_password) {
        $errors[] = "Passwords don't match";
    }

    if (!$agree_terms) {
        $errors[] = "Terms not checked";
    }


    if (empty($errors)) {
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $existing_user = $stmt->fetch();

        if ($existing_user) {
            $errors[] = "Email already exists";
        }

        if (empty($errors)) {
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $avatar_initials = strtoupper(substr($first_name, 0, 1) . substr($last_name, 0, 1));

            $stmt = $pdo->prepare("INSERT INTO users (full_name, email, university, password_hash, avatar_initials) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$full_name, $email, $university, $password_hash, $avatar_initials]);

            $user_id = $pdo->lastInsertId();

            $_SESSION['user_id'] = $user_id;
            $_SESSION['full_name'] = $full_name;
            $_SESSION['email'] = $email;
            $_SESSION['avatar_initials'] = $avatar_initials;

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