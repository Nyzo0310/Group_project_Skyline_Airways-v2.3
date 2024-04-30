<?php
session_start(); // Start session at the beginning of the script

// Check if the user is already logged in
if(isset($_SESSION['username'])) {
    if ($_SESSION['is_admin'] == 1) {
        header("Location: admin.php");
    } else {
        header("Location: index.php");
    }
    exit();
}

include_once 'config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the user is an admin
    $stmt = $conn->prepare("SELECT * FROM admins WHERE email = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $admin_result = $stmt->get_result();

    if ($admin_result->num_rows == 1) {
        $admin_row = $admin_result->fetch_assoc();
        $admin_stored_password = $admin_row['password'];

        // Compare plain text passwords
        if ($password === $admin_stored_password) {
            $_SESSION['username'] = $username;
            $_SESSION['is_admin'] = 1;
            header("Location: admin.php");
            exit();
        } else {
            // Incorrect password
            $errorMessage = "Invalid password. Please try again.";
        }
    } else {
        // Check if the user is a regular user
        $stmt = $conn->prepare("SELECT * FROM logindata WHERE reg_email = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $regular_result = $stmt->get_result();

        if ($regular_result->num_rows == 1) {
            $regular_row = $regular_result->fetch_assoc();
            $regular_stored_password = $regular_row['reg_pass'];
            if (password_verify($password, $regular_stored_password)) {
                $_SESSION['username'] = $username;
                header("Location: index.php");
                exit();
            } else {
                $errorMessage = "Invalid password. Please try again.";
            }
        } else {
            $errorMessage = "Invalid username or password. Please try again.";
        }
    }
}
?>

