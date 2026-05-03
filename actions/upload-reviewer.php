<?php
require_once '../includes/session.php';
require_once '../includes/functions.php';
require_once '../includes/config.php';
check_login();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = sanitize($_POST['title']);
    $topic = sanitize($_POST['topic']);
    $description = sanitize($_POST['description']);
    $tags = sanitize($_POST['tags']);
    $file = $_FILES['file'];

    $errors = [];

    if (strlen($title) < 5) {
        $errors[] = "Title too short";
    }

    if (strlen($description) < 20) {
        $errors[] = "Description too short";
    }

    if (empty($topic)) {
        $errors[] = "Topic empty";
    }

    $allowed = ['pdf', 'docx', 'doc', 'txt', 'jpg', 'jpeg', 'png', 'ppt', 'pptx'];
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    if ($file['error'] !== 0) {
        $errors[] = "File upload failed";
    }

    if (!in_array($ext, $allowed)) {
       $errors[] = "Invalid file type. Allowed: PDF, DOC, DOCX, TXT, JPG, PNG, PPT, PPTX";
    }

    if ($file['size'] > 20971520) {
        $errors[] = "File too large. Max 10MB";
    }

    if (empty($errors)) {
        $unique_name = uniqid() . '.' . $ext;
        $upload_path = '../uploads/' . $unique_name;
        move_uploaded_file($file['tmp_name'], $upload_path);

        $user_id = $_SESSION['user_id'];

        $stmt = $pdo->prepare("INSERT INTO reviewers (user_id, title, topic, description, file_path, file_name, file_size) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$_SESSION['user_id'], $title, $topic, $description, $upload_path, $file['name'], $file['size']]);

        $reviewer_id = $pdo->lastInsertId();

        if (!empty($tags)) {
            $tag_list = explode(',', $tags);
            foreach ($tag_list as $tag) {
                $tag = trim($tag);
                if (!empty($tag)) {
                    $stmt = $pdo->prepare("INSERT INTO tags (reviewer_id, tag_name) VALUES (?, ?)");
                    $stmt->execute([$reviewer_id, $tag]);
                }
            }
        }

        header('Location: /cs-reviewer-hub/my-reviewers.php');
        exit;
    }
}


if (!empty($errors)) {
    foreach ($errors as $error) {
        echo $error . "<br>";
    }
}
