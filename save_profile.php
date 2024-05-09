<?php
// Start session
session_start();

// Check if user is logged in
if(isset($_SESSION['username'])) {
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database_name = "flightbooking";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database_name);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve email of logged-in user from session
    $email = $_SESSION['username'];

    // Get profile data from AJAX request
    $profileData = json_decode(file_get_contents("php://input"), true);

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("UPDATE logindata SET gender=?, dob=?, age=?, status=?, phone=?, nationality=? WHERE reg_email=?");
    $stmt->bind_param("sssssss", $profileData['gender'], $profileData['dob'], $profileData['age'], $profileData['status'], $profileData['phone'], $profileData['nationality'], $email);

    // Execute SQL statement
    if ($stmt->execute()) {
        echo "Profile saved successfully";
    } else {
        echo "Error: " . $conn->error;
    }

    // Close connections
    $stmt->close();
    $conn->close();
} else {
    echo "User not logged in";
}
?>
