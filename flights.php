<?php
session_start(); // Start the session

include_once './config/database.php';

// Check if the form is submitted and store the search parameters in session variables
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if(isset($_GET['locationInput']) && isset($_GET['destinationInput']) && isset($_GET['departureInput'])) {
        $_SESSION['search_location'] = $_GET['locationInput'];
        $_SESSION['search_destination'] = $_GET['destinationInput'];
        $_SESSION['search_departure'] = $_GET['departureInput'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/flights.css">
    <link rel="icon" href="./assets/images/favicon.jpg">
    <title>Skyline - Flight Search Results</title>
</head>
<body>

<header>
    <div class="logo">
        <img src="./assets/images/logo.jpg" alt="Airline Logo">
        <div class="title">
            <h1>Search Flight Results</h1>
        </div>
    </div>
    <nav>
    <ul>
        <li><a href="index.php">Dashboard</a></li>
        <li><a href="offers.php">Offers</a></li>
        <?php
        if(isset($_SESSION['username'])) {
            // If the user is logged in, display a welcome message which will serve as the dropdown button
            echo '<li class="dropdown">'; // Add the "dropdown" class to the list item
            echo '<a class="dropbtn">Hello, ' . $_SESSION['username'] . '</a>'; // Change button to anchor tag
            echo '<div class="dropdown-content">';
            echo '<a href="#">Profile</a>';
            echo '<a href="logout.php" class="logout">Logout</a>';
            echo '</div>';
            echo '</li>';
        } else {
            // If the user is not logged in, display a login link
            echo '<li><a href="login.php">Login</a></li>';
        }
        ?>
    </ul>  
</nav>

</header> 

<main>
    <!-- Display search results -->
    <?php
    if ($conn) {
        // Retrieve user input from the form
        if(isset($_SESSION['search_location']) && isset($_SESSION['search_destination']) && isset($_SESSION['search_departure'])) {
            $location = $_SESSION['search_location'];
            $destination = $_SESSION['search_destination'];
            $departureDate = $_SESSION['search_departure'];

            // Perform a database query to search for flights based on user input
            $sql = "SELECT * FROM flights WHERE departure_location LIKE '%$location%' AND arrival_location LIKE '%$destination%'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output table header
                echo "<table>";
                echo "<tr><th>Flight Number</th><th>Departure</th><th>Departure Date</th><th>Departure-Time</th><th>Arrival</th><th>Arrival Date</th><th>Arrival-Time</th><th>Price</th><th>Book</th></tr>";

            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td class='flight-number'>" . $row["flight_number"] . "</td>"; // Add class to this td element
                echo "<td>" . $row["departure_location"] . "</td>";
                echo "<td>" . $departureDate . "</td>"; 
                echo "<td class='flight-number'>" . $row["Departure-Time"] . "</td>";
                echo "<td>" . $row["arrival_location"] . "</td>";
                echo "<td>" . $departureDate . "</td>"; 
                echo "<td class='flight-number'>" . $row["Arrival-Time"] . "</td>"; 
                echo "<td>₱" . $row["price"] . "</td>";
                // Check if user is logged in
                if(isset($_SESSION['username'])) {
                    // Redirect user to booking.php with flight_id and dates as parameters
                    echo "<td><a href='booking.php?flight_id=" . $row["flight_number"] . "&departure_date=" . $departureDate . "&arrival_date=" . $departureDate . "' class='book-now-button'>Book Now</a></td>";
                } else {
                    echo "<td><button disabled>Log in to Book</button></td>";
                }
                echo "</tr>";
            }

                echo "</table>";
            } else {
                echo "<p>No flights found.</p>";
            }
        } else {
            echo "<p>No search performed yet.</p>";
        }
    } else {
        echo "Connection failed: " . $conn->connect_error;
    }
    ?>
<div class="change-flight-button">
    <a href="index.php" class="change-flight-link">Change Flight</a>
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

<script>
// Define bookNowButtons and select buttons with class 'book-now-button'
const bookNowButtons = document.querySelectorAll('.book-now-button');

// Add event listeners to each button
bookNowButtons.forEach(button => {
    button.addEventListener('click', function() {
        // Your event listener logic goes here
    });
});


  </script>

</body>
</html>
