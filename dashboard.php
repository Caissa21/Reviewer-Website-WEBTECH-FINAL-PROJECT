<?php
require_once 'includes/session.php';
require_once 'includes/config.php';
require_once 'includes/functions.php';
check_login();

$search = isset($_GET['search']) ? sanitize($_GET['search']) : '';
$topic = isset($_GET['topic']) ? sanitize($_GET['topic']) : '';

$sql = "SELECT reviewers.*, users.full_name FROM reviewers JOIN users ON reviewers.user_id = users.id";
$params = [];

if (!empty($topic)) {
    $sql .= " WHERE reviewers.topic = ?";
    $params[] = $topic;
}

if (!empty($search)) {
    $sql .= empty($topic) ? " WHERE" : " AND";
    $sql .= " (reviewers.title LIKE ? OR reviewers.description LIKE ?)";
    $params[] = "%$search%";
    $params[] = "%$search%";
}

$sql .= " ORDER BY reviewers.created_at DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$reviewers = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | CS Reviewer Hub</title>
</head>

<body>
    <?php include 'components/sidebar.php'; ?>
    <?php include 'components/topbar.php'; ?>

    <main>
        <h1>Dashboard</h1>
        <div class="filter">
            <a href="dashboard.php">All Topics</a>
            <a href="dashboard.php?topic=C++">C++</a>
            <a href="dashboard.php?topic=JavaScript">JavaScript</a>
            <a href="dashboard.php?topic=Python">Python</a>
            <a href="dashboard.php?topic=Java">Java</a>
            <a href="dashboard.php?topic=PHP">PHP</a>
            <a href="dashboard.php?topic=HTML/CSS">HTML/CSS</a>
            <a href="dashboard.php?topic=SQL">SQL</a>
            <a href="dashboard.php?topic=Data Structures">Data Structures</a>
            <a href="dashboard.php?topic=Algorithms">Algorithms</a>
            <a href="dashboard.php?topic=Web Development">Web Development</a>
        </div>

        <div class="reviewers-grid">
            <?php if(empty($reviewers)):?>
                <p>No reviewers found.</p>
            <?php else: ?>
                <?php foreach($reviewers as $reviewer): ?>
                    <div class="reviewer-card">
                        <h3><?=  $reviewer['title'] ?></h3>
                        <p><?= $reviewer['topic'] ?></p>
                        <p>By: <?= $reviewer['full_name'] ?></p>
                        <p>Downloads: <?= $reviewer['downloads'] ?></p>
                        <p>Views: <?= $reviewer['views'] ?></p>
                        <p>Date: <?= $reviewer['created_at'] ?></p>
                        <a href="view-reviewer.php?id=<?= $reviewer['id'] ?>">View</a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </main>
</body>

</html>