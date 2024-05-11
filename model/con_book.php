<?php
include '../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update-btn'])) {
    // Retrieve the ID of the record to be confirmed
    $passenger_id = $_POST['passenger_id'];

    // Prepare and execute the query to move the record to the confirmed bookings table
    $stmt_confirm_passenger = $conn->prepare("INSERT INTO booking_confirm SELECT * FROM main_passengers WHERE MainPassenger = ?");
    $stmt_confirm_passenger->bind_param("i", $passenger_id);

    if ($stmt_confirm_passenger->execute()) {
        // Record moved to confirmed bookings successfully
        // Now, if you want to delete the record from the main table, you can uncomment the following lines:
        $stmt_delete_passenger = $conn->prepare("DELETE FROM main_passengers WHERE MainPassenger = ?");
        $stmt_delete_passenger->bind_param("i", $passenger_id);
        $stmt_delete_passenger->execute();

        echo "success";
    } else {
        // Handle confirmation failure
        echo "error";
    }
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
