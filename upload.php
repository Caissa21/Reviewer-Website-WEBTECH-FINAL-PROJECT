<?php
require_once 'includes/session.php';
require_once 'includes/config.php';
require_once 'includes/functions.php';
check_login();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Upload Reviewer | CS Reviewer Hub</title>
</head>

<body>
    <?php include 'components/sidebar.php'; ?>
    <?php include 'components/topbar.php'; ?>


    <main>
        <form action="actions/upload-reviewer.php" method="POST" enctype="multipart/form-data">
            <label for="">Title</label>
            <input type="text" name="title">

            <label>Topic</label>
            <select name="topic">
                <option value="C++">C++</option>
                <option value="JavaScript">JavaScript</option>
                <option value="Python">Python</option>
                <option value="Java">Java</option>
                <option value="PHP">PHP</option>
                <option value="HTML/CSS">HTML/CSS</option>
                <option value="SQL">SQL</option>
                <option value="Data Structures">Data Structures</option>
                <option value="Algorithms">Algorithms</option>
                <option value="Web Development">Web Development</option>
            </select>

            <label for="">Description</label>
            <textarea name="description"></textarea>

            <label for="">Tags</label>
            <input type="text" name="tags">

            <label for="">File</label>
            <input type="file" name="file">

            <button type="submit">Upload Reviewer</button>
            <button type="button" onclick="window.location.href='dashboard.php'">Cancel</button>
        </form>
    </main>

</body>

</html>