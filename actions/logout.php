<?php
require_once '../includes/session.php';
session_destroy();
header('Location: /cs-reviewer-hub/login.php');
exit;
