<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Check if the number of passengers is provided
if (!isset($_POST['passengers'])) {
    // Redirect the user back to the booking page if the number of passengers is not provided
    header("Location: booking.php?flight_id=" . $_GET['flight_id'] . "&departure_date=" . $_GET['departure_date'] . "&arrival_date=" . $_GET['arrival_date']);
    exit();
}

// Retrieve number of passengers from the form
$passenger_count = $_POST['passengers'];

$ticket_price = $_POST['price'];
$total_price = $ticket_price * $passenger_count;


include_once './config/database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/confirm_booking.css">
    <link rel="icon" href="./assets/images/favicon.jpg">
    <title>Skyline - Confirm Booking</title>
</head>
<body>

<header>
    <div class="logo">
        <img src="./assets/images/logo.jpg" alt="Airline Logo">
        <div class="title">
            <h1>Skyline - Confirm Booking</h1>
        </div>
    </div>
    <nav>
    <ul>
        <li><a href="index.php">Dashboard</a></li>
        <li><a href="flights.php">Flights</a></li>
        <li><a href="offers.php">Offers</a></li>
        <?php
        echo '<li class="dropdown">'; 
        echo '<a class="dropbtn">Hello, ' . $_SESSION['username'] . '</a>'; 
        echo '<div class="dropdown-content">';
        echo '<a href="#">Profile</a>';
        echo '<a href="logout.php" class="logout">Logout</a>';
        echo '</div>';
        echo '</li>';
        ?>
    </ul>  
</nav>
</header> 

<main>
    <div class="passenger-details">
        <h2 style="padding-left: 620px;">Passenger Details</h2>
        <form action="payment.php" method="POST">
        <?php
            // Loop to generate form fields based on the number of passengers
            for ($i = 1; $i <= $passenger_count; $i++) {
                echo '<div class="passenger-info">';
                echo '<h3>Passenger ' . $i . '</h3>';
                echo '<label for="first_name_' . $i . '">First Name:</label>';
                echo '<input type="text" id="first_name_' . $i . '" name="first_name_' . $i . '" required>';
                echo '<label for="last_name_' . $i . '">Last Name:</label>';
                echo '<input type="text" id="last_name_' . $i . '" name="last_name_' . $i . '" required>';
                
                if ($i === 1) {
                    echo '<label for="email_' . $i . '">Email:</label>';
                    echo '<input type="email" id="email_' . $i . '" name="email_' . $i . '" required>';
                }
                if ($i === 1) {
                    echo '<label for="contact_number_' . $i . '">Contact Number:</label>';
                    echo '<input type="text" id="contact_number_' . $i . '" name="contact_number_' . $i . '" required>';
                }
                echo '<label for="dob_' . $i . '">Date of Birth:</label>';
                echo '<input type="date" id="dob_' . $i . '" name="dob_' . $i . '" required>';
                
                echo '</div>';
            }
            ?>

            <!-- Display total price -->
            <div class="total-price">
                <h3>Total Price: ₱<?php echo $total_price; ?></h3>
            </div>

            <!-- Pass the ticket price to the next page -->
            <input type="hidden" name="ticket_price" value="<?php echo $ticket_price; ?>">
            <div class="payment-methods">
        <h3>Select Payment Method</h3>
        <ul>
            <li>
                <input type="radio" id="gcash" name="payment_method" value="gcash">
                <label for="gcash">GCash</label>
            </li>
            <li>
                <input type="radio" id="paypal" name="payment_method" value="paypal">
                <label for="paypal">PayPal</label>
            </li>
            <li>
                <input type="radio" id="credit_card" name="payment_method" value="credit_card">
                <label for="credit_card">Mastercard</label>
            </li>
        </ul>
            <input type="submit"  value="Confirm Booking">
        </form>
    </div>
</main> 

<footer>
    <div class="payment-methods">
        <h3>Available Payment Methods</h3>
        <ul>
            <li>
                <img src="./assets/images/gcash" alt="Gcash">
                <span>Gcash</span>
            </li>
            <li>
                <img src="./assets/images/paypal" alt="PayPal">
                <span>PayPal</span>
            </li>
            <li>
                <img src="./assets/images/mastercard.jpg" alt="Mastercard">
                <span>Mastercard</span>
            </li>
            
        </ul>
    </div>
</footer>

</body>
</html>
