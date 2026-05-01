<form action="dashboard.php" method="GET">
    <input type="text" name="search">
    <button type="submit">Search button</button>
</form>

<div><?= $_SESSION['avatar_initials'] ?></div>
<span><?= $_SESSION['full_name'] ?></span>
