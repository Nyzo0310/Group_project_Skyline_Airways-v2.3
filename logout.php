<?php
session_start(); // Start the session

// Check if the user is an administrator
$is_admin = isset($_SESSION['is_admin']) && $_SESSION['is_admin'];

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Set a cookie to indicate logout (optional)
setcookie(session_name(), '', time() - 3600);

// Redirect based on user role
if ($is_admin) {
    // Redirect administrators to login.php
    header("Location: login.php");
} else {
    // Redirect regular users to index.php
    header("Location: index.php");
}

exit();
?>
