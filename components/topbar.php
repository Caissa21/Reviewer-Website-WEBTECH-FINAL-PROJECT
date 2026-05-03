
<div class="topbar">
    <form action="dashboard.php" method="GET">
        <input type="text" name="search">
        <button type="submit">Search</button>
    </form>

    <div class="user-info">
        <div class="avatar"><?= $_SESSION['avatar_initials'] ?></div>
        <span><?= $_SESSION['full_name'] ?></span>
    </div>
</div>












