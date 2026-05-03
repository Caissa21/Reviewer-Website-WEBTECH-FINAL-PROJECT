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

//sadasdasdasd
 //asdasdasd
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Reviewer | CS Reviewer Hub</title>
</head>

<body>
    <?php include 'components/sidebar.php'; ?>
    <?php include 'components/topbar.php'; ?>

</body>
</html>


