<?php

$message_data = array(
    'name' => "'" . $_POST['name'] . "'",
    'email' => "'" . $_POST['email'] . "'",
    'message' => "'" . $_POST['message'] . "'"
);

save_message($message_data);

function save_message($data)
{
    include '../config/database.php';

    // Escape and format data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $attributes = implode(", ", array_keys($data));
    $values = implode(", ", array_values($data));

    $query = "INSERT INTO contact_information ($attributes) VALUES ($values)";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Set success message if insertion is successful
        $success_message = 'Your message has been submitted successfully!';
        
        // Reset form fields after successful submission
        $name = $email = $message = '';
    } else {
        // Handle insertion failure
        $success_message = 'Failed to submit your message. Please try again later.';
    }

    mysqli_close($conn);
}
?>
