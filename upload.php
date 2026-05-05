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

    <div class="content-wrapper">
        <?php include 'components/topbar.php'; ?>


        <main>
            <div class="page-header">
                <h1>Upload Reviewer</h1>
                <p class="page-subtitle">Share your knowledge with the community</p>
            </div>

            <div class="form-card">
                <form action="actions/upload-reviewer.php" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" placeholder="e.g., Comprehensive Python OOP Guide">
                    </div>

                    <div class="form-group">
                        <label>Programming Language / Topic</label>
                        <select name="topic">
                            <option value="">Select a topic...</option>
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
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" rows="5" placeholder="Provide a brief description of what this reviewer covers..."></textarea>
                    </div>

                    <div class="form-group">
                        <label>Tags</label>
                        <input type="text" name="tags" placeholder="e.g., beginner, exam-prep, comprehensive (comma-separated)">
                    </div>

                    <div class="form-group">
                        <label>Upload File</label>
                        <div class="file-upload-area">
                            <i class="fas fa-upload"></i>
                            <p>Drop your file here or click to browse</p>
                            <span>Supported formats: PDF, DOCX, TXT (Max 10MB)</span>
                            <input type="file" name="file">
                        </div>
                    </div>

                    <div class="guidelines-box">
                        <i class="fas fa-file-alt"></i>
                        <div>
                            <strong>Submission Guidelines</strong>
                            <ul>
                                <li>Ensure content is original or properly cited</li>
                                <li>Use clear formatting and organization</li>
                                <li>Include examples and explanations</li>
                                <li>Keep content focused on CS topics only</li>
                            </ul>
                        </div>
                    </div>

                    <div class="form-buttons">
                        <button type="submit" class="btn-primary">Upload Reviewer</button>
                        <button type="button" class="btn-secondary" onclick="window.location.href='dashboard.php'">Cancel</button>
                    </div>

                </form>
            </div>
        </main>
    </div>

</body>

</html>