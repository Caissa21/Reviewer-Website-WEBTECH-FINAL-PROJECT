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

$stmt = $pdo->prepare("SELECT * FROM reviewers WHERE user_id = ? ORDER BY created_at DESC");
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
    <title>Profile | CS Reviewer Hub</title>
</head>

<body>
    <?php include 'components/sidebar.php'; ?>

    <div class="content-wrapper">
        <?php include 'components/topbar.php'; ?>

<main>
    <h1>Profile</h1>
    <p class="page-subtitle">Manage your account and view your contributions</p>

    <div class="profile-layout">

        <!-- LEFT COLUMN -->
        <div class="profile-left">

            <div class="profile-card">
                <div class="profile-avatar">
                    <?= $_SESSION['avatar_initials'] ?>
                </div>
                <h2><?= $user['full_name'] ?></h2>
                <p class="profile-role">Computer Science Student</p>

                <div class="profile-details">
                    <p><i class="fas fa-envelope"></i> <?= $user['email'] ?></p>
                    <p><i class="fas fa-map-marker-alt"></i> <?= $user['university'] ?></p>
                    <p><i class="fas fa-calendar"></i> Joined <?= date('F Y', strtotime($user['created_at'])) ?></p>
                </div>

                <a href="edit-profile.php" class="btn-primary">Edit Profile</a>
            </div>

            <div class="achievements-card">
                <h3>Achievements</h3>
                <div class="achievement-list">
                    <?php if ($downloads['total_downloads'] > 1000): ?>
                    <div class="achievement-item">
                        <div class="achievement-icon orange">
                            <i class="fas fa-trophy"></i>
                        </div>
                        <span>Top Contributor</span>
                    </div>
                    <?php endif; ?>

                    <?php if ($downloads['total_downloads'] >= 100): ?>
                    <div class="achievement-item">
                        <div class="achievement-icon green">
                            <i class="fas fa-download"></i>
                        </div>
                        <span>100+ Downloads</span>
                    </div>
                    <?php endif; ?>

                    <?php if ($stats['total_reviewers'] >= 10): ?>
                    <div class="achievement-item">
                        <div class="achievement-icon blue">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <span>10 Reviewers</span>
                    </div>
                    <?php endif; ?>

                    <?php if ($downloads['total_downloads'] < 100 && $stats['total_reviewers'] < 10): ?>
                    <p class="no-achievements">Upload more reviewers to earn achievements!</p>
                    <?php endif; ?>
                </div>
            </div>

        </div>

        <!-- RIGHT COLUMN -->
        <div class="profile-right">

            <div class="stats-card">
                <h3>Statistics</h3>
                <div class="stats-grid">
                    <div class="stat-item">
                        <h2><?= $stats['total_reviewers'] ?></h2>
                        <p>Reviewers Uploaded</p>
                    </div>
                    <div class="stat-item">
                        <h2><?= $downloads['total_downloads'] ?? 0 ?></h2>
                        <p>Total Downloads</p>
                    </div>
                    <div class="stat-item">
                        <h2>0.0</h2>
                        <p>Average Rating</p>
                    </div>
                </div>
            </div>

            <div class="your-reviewers-card">
                <h3>Your Reviewers</h3>
                <?php if (empty($reviewers)): ?>
                    <p>No reviewers uploaded yet.</p>
                <?php else: ?>
                    <?php foreach ($reviewers as $reviewer): ?>
                    <?php
                    $badge_class = match ($reviewer['topic']) {
                        'C++' => 'badge-cpp',
                        'JavaScript' => 'badge-javascript',
                        'Python' => 'badge-python',
                        'Java' => 'badge-java',
                        'PHP' => 'badge-php',
                        'HTML/CSS' => 'badge-htmlcss',
                        'SQL' => 'badge-sql',
                        'Data Structures' => 'badge-datastructures',
                        'Algorithms' => 'badge-algorithms',
                        'Web Development' => 'badge-webdevelopment',
                        default => 'badge-default'
                    };
                    ?>
                    <div class="profile-reviewer-item">
                        <div class="profile-reviewer-top">
                            <h4><?= $reviewer['title'] ?></h4>
                            <a href="edit-reviewer.php?id=<?= $reviewer['id'] ?>" class="edit-link">Edit</a>
                        </div>
                        <span class="topic-badge <?= $badge_class ?>"><?= $reviewer['topic'] ?></span>
                        <div class="profile-reviewer-stats">
                            <span><i class="fas fa-download"></i> <?= $reviewer['downloads'] ?></span>
                            <span><i class="fas fa-eye"></i> <?= $reviewer['views'] ?> views</span>
                            <span><?= date('M d, Y', strtotime($reviewer['created_at'])) ?></span>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

        </div>
    </div>
</main>    </div>
</body>

</html>