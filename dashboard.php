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
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Dashboard | CS Reviewer Hub</title>
</head>

<body>

    <?php include 'components/sidebar.php'; ?>

    <div class="content-wrapper">
        <?php include 'components/topbar.php'; ?>

        <main>
            <h1>Dashboard</h1>
            <div class="filter">
                <a href="dashboard.php" class="filter-btn <?= empty($topic) ? 'active' : '' ?>">All Topics</a>
                <a href="dashboard.php?topic=C++" class="filter-btn <?= $topic === 'C++' ? 'active' : '' ?>">C++</a>
                <a href="dashboard.php?topic=JavaScript" class="filter-btn <?= $topic === 'JavaScript' ? 'active' : '' ?>">JavaScript</a>
                <a href="dashboard.php?topic=Python" class="filter-btn <?= $topic === 'Python' ? 'active' : '' ?>">Python</a>
                <a href="dashboard.php?topic=Java" class="filter-btn <?= $topic === 'Java' ? 'active' : '' ?>">Java</a>
                <a href="dashboard.php?topic=PHP" class="filter-btn <?= $topic === 'PHP' ? 'active' : '' ?>">PHP</a>
                <a href="dashboard.php?topic=HTML/CSS" class="filter-btn <?= $topic === 'HTML/CSS' ? 'active' : '' ?>">HTML/CSS</a>
                <a href="dashboard.php?topic=SQL" class="filter-btn <?= $topic === 'SQL' ? 'active' : '' ?>">SQL</a>
                <a href="dashboard.php?topic=Data Structures" class="filter-btn <?= $topic === 'Data Structures' ? 'active' : '' ?>">Data Structures</a>
                <a href="dashboard.php?topic=Algorithms" class="filter-btn <?= $topic === 'Algorithms' ? 'active' : '' ?>">Algorithms</a>
                <a href="dashboard.php?topic=Web Development" class="filter-btn <?= $topic === 'Web Development' ? 'active' : '' ?>">Web Development</a>
            </div>

            <div class="reviewers-grid">
                <?php if (empty($reviewers)): ?>
                    <p>No reviewers found.</p>
                <?php else: ?>
                    <?php foreach ($reviewers as $reviewer): ?>
                        <div class="reviewer-card">
                            <div class="card-top">
                                <h3><?= $reviewer['title'] ?></h3>
                                <span class="rating">⭐ 0.0</span>
                            </div>

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
                            <span class="topic-badge <?= $badge_class ?>"><?= $reviewer['topic'] ?></span>

                            <div class="card-author">
                                <i class="fas fa-user"></i>
                                <?= $reviewer['full_name'] ?> • <?= date('M d, Y', strtotime($reviewer['created_at'])) ?>
                            </div>

                            <div class="card-footer">
                                <div class="card-stats">
                                    <span><i class="fas fa-download"></i> <?= $reviewer['downloads'] ?></span>
                                    <span><i class="fas fa-eye"></i> <?= $reviewer['views'] ?></span>
                                </div>
                                <a href="view-reviewer.php?id=<?= $reviewer['id'] ?>">View</a>
                            </div>
                        </div>

                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </main>
    </div>
</body>

</html>