<?php $current_page = basename($_SERVER['PHP_SELF']); ?>

<nav class="sidebar">
    <div class="sidebar-logo">
        <h2>CS Reviewer Hub</h2>
        <p>Share & Learn Together</p>
    </div>

    <ul class="sidebar-links">
        <li><a href="dashboard.php" class="<?= $current_page === 'dashboard.php' ? 'active' : '' ?>"><i class="fas fa-home"></i> Dashboard</a></li>
        <li><a href="upload.php" class="<?= $current_page === 'upload.php' ? 'active' : '' ?>"><i class="fas fa-upload"></i> Upload Reviewer</a></li>
        <li><a href="my-reviewers.php" class="<?= $current_page === 'my-reviewers.php' ? 'active' : '' ?>"><i class="fas fa-book"></i> My Reviewers</a></li>
        <li><a href="profile.php" class="<?= $current_page === 'profile.php' ? 'active' : '' ?>"><i class="fas fa-user"></i> Profile</a></li>
    </ul>

    <div class="sidebar-bottom">
        <a href="actions/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
</nav>