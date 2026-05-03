<?php

require_once 'includes/session.php';
require_once 'includes/config.php';
require_once 'includes/functions.php';
check_login();


$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();

$stmt = $pdo->prepare("SELECT COUNT(*) as total_reviewers FROM reviewers WHERE user_id = ?");
$stmt->execute([$_SESSION['user_id']]);
$stats = $stmt->fetch();

$stmt = $pdo->prepare("SELECT SUM(downloads) as total_downloads FROM reviewers WHERE user_id = ?");
$stmt->execute([$_SESSION['user_id']]);
$downloads = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | CS Reviewer Hub</title>
</head>

<body>
    <?php include 'components/sidebar.php'; ?>
    <?php include 'components/topbar.php'; ?>

    <main>
        <div class="profile-card">
            <h2><?= $_SESSION['avatar_initials'] ?></h2>
            <h3><?= $user['full_name'] ?></h3>
            <p><?= $user['email'] ?></p>
            <p><?= $user['university'] ?></p>
            <p>Joined: <?= $user['created_at'] ?></p>
        </div>

        <div class="stats">
            <h3>Statistics</h3>
            <p>Total Reviewers: <?= $stats['total_reviewers'] ?></p>
            <p>Total Downloads: <?= $downloads['total_downloads'] ?></p>
        </div>
    </main>
</body>

</html>