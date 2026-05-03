<?php
require_once 'includes/session.php';
require_once 'includes/config.php';
require_once 'includes/functions.php';
check_login();

$sql = "SELECT reviewers.*, users.full_name 
FROM reviewers 
JOIN users ON reviewers.user_id = users.id
WHERE reviewers.user_id = ?
ORDER BY reviewers.created_at DESC";


$stmt = $pdo->prepare($sql);
$stmt->execute([$_SESSION['user_id']]);
$reviewers = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>My Reviewer | CS Reviewer Hub</title>
</head>

<body>
    <?php include 'components/sidebar.php'; ?>

    <div class="content-wrapper">
        <?php include 'components/topbar.php'; ?>


        <main>
            <h1>My Reviewers</h1>

            <div class="reviewers-grid">
                <?php if (empty($reviewers)): ?>
                    <p>No reviewers found.</p>
                <?php else: ?>
                    <?php foreach ($reviewers as $reviewer): ?>
                        <div class="reviewer-card">
                            <h3><?= $reviewer['title'] ?></h3>
                            <p><?= $reviewer['topic'] ?></p>
                            <p>By: <?= $reviewer['full_name'] ?></p>
                            <p>Downloads: <?= $reviewer['downloads'] ?></p>
                            <p>Views: <?= $reviewer['views'] ?></p>
                            <p>Date: <?= $reviewer['created_at'] ?></p>
                            <a href="view-reviewer.php?id=<?= $reviewer['id'] ?>">View</a>
                            <a href="edit-reviewer.php?id=<?= $reviewer['id'] ?>">Edit</a>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </main>
    </div>
</body>

</html>