<?php 
require_once 'includes/session.php';
require_once 'includes/config.php';
check_login();
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
    </main>
</body>

</html>