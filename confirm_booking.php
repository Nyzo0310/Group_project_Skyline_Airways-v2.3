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
$ticket_price = $_POST['price']; // Assuming this is the base ticket price
$total_price = $ticket_price * $passenger_count; // Initialize total price with base ticket price

// Initialize total price with the same value as the base ticket price
$price = $total_price;

include_once './config/database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/confirm_booking.css">
    <link rel="icon" href="../assets/images/favicon.jpg">
    <title>Skyline - Confirm Booking</title>
</head>
<body>

<header>
    <div class="logo">
        <img src="./assets/images/logo.jpg" alt="Airline Logo">
        <div class="title">
            <h1>Skyline Confirm Booking</h1>
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
    <div class="passenger-title-container">
        <h2 class="passenger_title">Passenger Details</h2>
    </div>
    <div class="passenger-details">
        <form action="insertdata.php" method="POST"> <!-- Form for submitting passenger data -->
            <!-- Passenger Details -->
            <?php
            // Loop through each passenger
            for ($i = 1; $i <= $passenger_count; $i++) {
            // Passenger details inputs
            echo '<div class="passenger-info">';
            echo '<h3>Passenger ' . $i . '</h3>';
            echo '<label for="first_name_' . $i . '">First Name:</label>';
            echo '<input type="text" id="first_name_' . $i . '" name="first_name_' . $i . '" required>';
            echo '<label for="last_name_' . $i . '">Last Name:</label>';
            echo '<input type="text" id="last_name_' . $i . '" name="last_name_' . $i . '" required>';
            echo '<label for="email_' . $i . '">Email:</label>';
            echo '<input type="email" id="email_' . $i . '" name="email_' . $i . '" required>';
            echo '<label for="contact_number_' . $i . '">Contact Number:</label>';
            echo '<input type="text" id="contact_number_' . $i . '" name="contact_number_' . $i . '" required>';
            echo '<label for="dob_' . $i . '">Date of Birth:</label>';
            echo '<input type="date" id="dob_' . $i . '" name="dob_' . $i . '" required>';
            // Seat Selection for each passenger

            echo '<div class="flight-seats">';
            echo '<label for="seat_' . $i . '">Select Seat:</label>';
            echo '<select id="seat_' . $i . '" name="seat_' . $i . '">';
            echo '<option value="Window Seat">Window Seat</option>';
            echo '<option value="Aisle Seat">Aisle Seat</option>';
            echo '<option value="Middle Seat">Middle Seat</option>';
            echo '</select>';
            echo '</div>';


            echo '<div class="flight-accommodations">';
            echo '<label for="accommodation_' . $i . '">Select Accommodation:</label>';
            echo '<select id="accommodation_' . $i . '" name="accommodation_' . $i . '" onchange="calculateTotalPrice()">';
            echo '<option value="Economy Glass">Economy Glass</option>';
            echo '<option value="Business Glass">Business Glass</option>';
            echo '<option value="First Glass">First Glass</option>';
            echo '</select>';
            echo '</div>';

        }
        ?>
        
       <!-- Total Price -->
<div class="total-price" id="total_price">
    <!-- This will be updated dynamically by JavaScript -->
    <h3>Total Price: ₱<span id="displayed_total_price"><?php echo $price; ?></span></h3>
</div>

<!-- Hidden Input Field for Total Price -->
<input type="hidden" id="total_cost" name="total_cost" value="<?php echo $price; ?>">

        <!-- Discount Message -->
        <div id="discount_message">

        </div>

    <script>
    // Function to calculate total price based on accommodation selection
   // Define a global variable to store the total cost
var totalCost = 0;
var discountApplied = false;

// Function to calculate total price based on accommodation selection
function calculateTotalPrice() {
    totalCost = 0;
    discountApplied = false;
    <?php
    for ($i = 1; $i <= $passenger_count; $i++) {
        echo 'var selectedAccommodation = document.getElementById("accommodation_' . $i . '").value;';
        echo 'var originalPrice = ' . $ticket_price . ';';
        echo 'if (selectedAccommodation === "Economy Glass") {';
        echo 'totalCost += originalPrice;';
        echo '} else if (selectedAccommodation === "Business Glass") {';
        echo 'totalCost += originalPrice * 1.5;';
        echo '} else if (selectedAccommodation === "First Glass") {';
        echo 'totalCost += originalPrice * 2;';
        echo '}';
        // Check if passenger age is 60 or above
        echo 'var dob = new Date(document.getElementById("dob_' . $i . '").value);';
        echo 'var today = new Date();';
        echo 'var age = today.getFullYear() - dob.getFullYear();';
        echo 'if (today.getMonth() < dob.getMonth() || (today.getMonth() === dob.getMonth() && today.getDate() < dob.getDate())) {';
        echo 'age--;';
        echo '}';
        // Apply discount if passenger age is 60 or above
        echo 'if (age >= 60) {';
        echo 'totalCost -= originalPrice * 0.1;';
        echo 'discountApplied = true;';
        echo '}';
    }
    ?>

    // Update the displayed total price
    document.getElementById("displayed_total_price").textContent = totalCost.toFixed(2);

    // Set the total price in the hidden input field
    document.getElementById("total_cost").value = totalCost.toFixed(2);

     // discount message
     if (discountApplied) {
            document.getElementById("discount_message").innerHTML = '<p style="color: green; font-weight: bold; text-align:center;">10% Discount applied for passengers aged 60 or above.</p>';

        } else {
            document.getElementById("discount_message").innerHTML = '';
        }
}

// Call the function to calculate the total price
calculateTotalPrice();

// Now you can use the totalCost variable wherever you need to access the calculated total price
console.log(totalCost); // Example usage

        // discount message
        if (discountApplied) {
            document.getElementById("discount_message").innerHTML = '<p style="color: green; font-weight: bold; text-align:center;">10% Discount applied for passengers aged 60 or above.</p>';

        } else {
            document.getElementById("discount_message").innerHTML = '';
        }
    
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        calculateTotalPrice();
    });
</script>

</div>     
            <!-- Payment Methods -->
            <div class="payment-methods">
                <h3>Available Payment Methods</h3>
                <ul>
                    <li>
                        <input type="radio" id="gcash-radio" name="payment-method" value="Gcash" onclick="togglePopup('gcash-popup')">
                        <label for="gcash-radio">GCash</label>
                    </li>
                    <li>
                        <input type="radio" id="paypal-radio" name="payment-method" value="Paypal" onclick="togglePopup('paypal-popup')">
                        <label for="paypal-radio">PayPal</label>
                    </li>
                    <li>
                        <input type="radio" id="mastercard-radio" name="payment-method" value="Mastercard" onclick="togglePopup('mastercard-popup')">
                        <label for="mastercard-radio">Mastercard</label>
                    </li>
                </ul>
            </div>

            <!-- Submit Button -->
            <div class="submit-button">
                <button id="confirmBooking">Confirm Booking</button>
            </div>
        </form>
    </div>
</main>


<!-- GCash pop-up -->
<div id="gcash-popup" class="popup">
    <div class="popup-content">
        <span class="close-icon" onclick="closePopupAndUnselectRadio('gcash-popup', 'gcash-radio')">&times;</span>
        <div class="payment-method">
            <img src="./assets/images/gcash" alt="GCash Logo" class="payment-logo">
            <h1>GCash Payment</h1>
            <p>Merchant: Airways Flight Booking</p>
            <p>Amount: <?php echo $total_price; ?></p>
            <label for="gcash-mobile-number">Mobile number</label>
            <input type="number" id="gcash-mobile-number" placeholder="Enter your mobile number" required>
            <label for="gcash-password">OTP</label>
            <input type="password" id="gcash-password" placeholder="Enter your GCash OTP" required>
            <button onclick="validateAndLogin('gcash-mobile-number', 'gcash-password', 'gcash-popup')">PROCEED</button>
        </div>
    </div>
</div>

<!-- PayPal pop-up -->
<div id="paypal-popup" class="popup">
    <div class="popup-content">
        <span class="close-icon" onclick="closePopupAndUnselectRadio('paypal-popup', 'paypal-radio')">&times;</span>
        <div class="payment-method">
            <img src="./assets/images/paypal" alt="PayPal Logo" class="payment-logo">
            <h1>PayPal Payment</h1>
            <p>Amount: <?php echo $total_price; ?></p>
            <p>Email or mobile number</p>
            <input type="text" id="paypal-email-or-mobile" placeholder="Enter your email or mobile number" required>
            <p>Password</p>
            <input type="password" id="paypal-password" placeholder="Enter your password" required>
            <button onclick="validateAndLogin('paypal-email-or-mobile', 'paypal-password', 'paypal-popup')">Log In</button>
        </div>
    </div>
</div>

<!-- Mastercard pop-up -->
<div id="mastercard-popup" class="popup">
    <div class="popup-content">
        <span class="close-icon" onclick="closePopupAndUnselectRadio('mastercard-popup', 'mastercard-radio')">&times;</span>
        <div class="payment-method">
            <img src="./assets/images/mastercard.jpg" alt="Mastercard Logo" class="payment-logo">
            <h1>Mastercard Payment</h1>
            <p>Amount: <?php echo $total_price; ?></p>
            <p>Enter your Mastercard credentials</p>
            <input type="text" id="mastercard-username" placeholder="Username" required>
            <input type="password" id="mastercard-password" placeholder="Password" required>
            <button onclick="validateAndLogin('mastercard-username', 'mastercard-password', 'mastercard-popup')">Log In</button>
        </div>
    </div>
</div>


<script src="./js/confirm_booking.js"></script>

<script>
    // Event listener for confirming the booking
    document.getElementById("confirmBooking").addEventListener("click", function() {
        var selectedPayment = document.querySelector('input[name="payment-method"]:checked');
        if (selectedPayment) {
            // Redirecting to pay_success.php
            window.location.href = "pay_success.php";
        } else {
            alert("Please select a payment method.");
        }
    });
</script>


</main>
</body>
</html>
