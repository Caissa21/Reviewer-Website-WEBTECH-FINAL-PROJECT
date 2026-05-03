<?php
require_once 'includes/session.php';

if (isset($_SESSION['user_id'])) {
        header('Location: /cs-reviewer-hub/dashboard.php');
} else {
        header('Location: /cs-reviewer-hub/login.php');
}
exit;