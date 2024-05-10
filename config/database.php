<?php
$servername = "localhost";
$username = "root";
$password = "";
$database_name = "fbooking2";

// Attempt to connect to the database
$conn = new mysqli($servername, $username, $password, $database_name);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
