<div class="topbar">
    <form action="dashboard.php" method="GET">
        <div class="search-bar">
            <i class="fas fa-search"></i>
            <input type="text" name="search" placeholder="Search reviewers, topics, or users..." value="<?= isset($_GET['search']) ? sanitize($_GET['search']) : '' ?>">
        </div>
    </form>

    <div class="user-info">
        <div class="avatar"><?= $_SESSION['avatar_initials'] ?></div>
        <span><?= $_SESSION['full_name'] ?></span>
    </div>
</div>