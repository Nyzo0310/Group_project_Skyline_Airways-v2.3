<?php
include '../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the AJAX request
    $con_fname = $_POST['con_fname'];
    $con_lname = $_POST['con_lname'];
    $con_email = $_POST['con_email'];
    $con_seat = $_POST['con_seat'];
    $con_acc = $_POST['con_acc'];
    $con_price = $_POST['con_price'];

    // Insert data into the database
    $stmt = $conn->prepare("INSERT INTO booking_confirm (con_fname, con_lname, con_email, con_seat, con_acc, con_price) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $con_fname, $con_lname, $con_email, $con_seat, $con_acc, $con_price);
    
    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }
}
?>
