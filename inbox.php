<?php
// Retrieve the main passenger ID sent from admin_dashboard.php
if (isset($_POST['mainPassengerId'])) {
    $mainPassengerId = $_POST['mainPassengerId'];

    // Process the data as needed
    // For example, you can perform database operations or send emails based on the confirmed booking
    // You can include your processing logic here
    // For demonstration purposes, I'll simply echo the received ID
    echo "Confirmed booking for Main Passenger ID: " . $mainPassengerId;
} else {
    // Handle the case where the main passenger ID is not set
    echo "Error: Main passenger ID not received.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmed Booking</title>
</head>
<body>
    <header>
        <h1>Confirmed Booking Details</h1>
    </header>

    <main>
        <table border="1">
            <tr>
                <th>Main Passenger ID</th>
            </tr>
            <tr>
                <td><?php echo isset($mainPassengerId) ? $mainPassengerId : ''; ?></td>
            </tr>
        </table>
    </main>

    <footer>
        <p>Thank you for using our service!</p>
    </footer>
</body>
</html>
