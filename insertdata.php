<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection
    include_once './config/database.php';

    // Retrieve total price from the form
 

    // Insert main passenger
    $stmt_main_passenger = $conn->prepare("INSERT INTO main_passengers (first_name, last_name, email, contact_number, dob, seat, accommodation, ticket_price, total_price) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt_main_passenger->bind_param("ssssssddd", $first_name_main, $last_name_main, $email_main, $contact_number_main, $dob_main, $seat_main, $accommodation_main, $ticket_price_main, $total_price_main);

    // Retrieve main passenger details from $_POST array
    $first_name_main = $_POST['first_name_1'] ?? null;
    $last_name_main = $_POST['last_name_1'] ?? null;
    $email_main = $_POST['email_1'] ?? null;
    $contact_number_main = $_POST['contact_number_1'] ?? null;
    $dob_main = $_POST['dob_1'] ?? null;
    $seat_main = $_POST['seat_1'] ?? null;
    $accommodation_main = $_POST['accommodation_1'] ?? null;
    $ticket_price_main = $_POST['displayed_ticket_price_1'] ?? null;
    $total_price_main = $_POST['ticket_price_1'] ?? null;

    // Execute the main passenger insertion
    if (!$stmt_main_passenger->execute()) {
        // Handle insertion error
        echo "Error inserting main passenger: " . $stmt_main_passenger->error;
        exit();
    }

    // Get the ID of the main passenger inserted
    $main_passenger_id = $conn->insert_id;

    // Close main passenger statement
    $stmt_main_passenger->close();

    // Insert other passengers if there are more than 1 passenger
    if ($passenger_count > 1) {
        for ($i = 2; $i <= $passenger_count; $i++) {
            // Retrieve passenger details from $_POST array
            $first_name = $_POST['first_name_' . $i] ?? null;
            $last_name = $_POST['last_name_' . $i] ?? null;
            $email = $_POST['email_' . $i] ?? null;
            $contact_number = $_POST['contact_number_' . $i] ?? null;
            $dob = $_POST['dob_' . $i] ?? null;
            $seat = $_POST['seat_' . $i] ?? null;
            $accommodation = $_POST['accommodation_' . $i] ?? null;
            $ticket_price = $_POST['ticket_price_' . $i] ?? null; // Assuming you have a hidden input field in the form to capture the ticket price

            // Prepare SQL statement for other passengers
            $stmt_other_passenger = $conn->prepare("INSERT INTO other_passengers (main_passenger_id, first_name, last_name, email, contact_number, dob, seat, accommodation, ticket_price) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt_other_passenger->bind_param("isssssssd", $main_passenger_id, $first_name, $last_name, $email, $contact_number, $dob, $seat, $accommodation, $ticket_price);

            // Execute the statement
            if (!$stmt_other_passenger->execute()) {
                // Handle insertion error
                echo "Error inserting other passenger: " . $stmt_other_passenger->error;
                exit();
            }

            // Close other passenger statement
            $stmt_other_passenger->close();
        }
    }

    // Close database <connection></connection>
    $conn->close();

    // Redirect to a thank you page or wherever you want
    header("Location: confirm_booking.php");
    exit();
} else {

    header("Location: booking.php");
    exit();
}
?>