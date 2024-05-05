<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <title>Skyline - Admin Dashboard</title>
    <link rel="icon" href="./assets/images/favicon.jpg">
    <link rel="stylesheet" href="./css/admin_dasboard.css">
</head>
<body>
<header class="header1">
    <div class="logo">
        <img src="./assets/images/logo.jpg" alt="Airline Logo">
        <div class="title">
            <h1>Skyline Admin Page</h1>
        </div>
    </div>
    <nav>
        <ul>
            <li><a href="#">Ongoing Flights</a></li>
            <li><a href="#">Feedback</a></li>
            <li><a href="#">User</a></li>
            <?php
            session_start(); // Start the session
            if(isset($_SESSION['username'])) {
                // If the user is logged in, display a welcome message which will serve as the dropdown button
                echo '<div class="dropdown">';
                echo '<button class="dropbtn">Hello, ' . $_SESSION['username'] . '</button>';
                echo '<div class="dropdown-content">';
                echo '<a href="logout.php" class="logout">Logout</a>';
                echo '</div>';
                echo '</div>';
            } else {
                // If the user is not logged in, display a login link
                echo '<li><a href="login.php">Login</a></li>';
            }
            ?> 
        </ul>  
    </nav>
</header> 

<main>

<div class="analytics">
<h1 class="h1-anal">ANALYTICS</h1>
</div>
<div class="main-container">
    
    <?php
    include './config/database.php';

    // Retrieve main passenger data
    $stmt_get_main_passenger = $conn->prepare("SELECT * FROM main_passengers");
    $stmt_get_main_passenger->execute();
    $result_main_passenger = $stmt_get_main_passenger->get_result();

    echo "<h2>Main Passenger Data</h2>"; // Title for main passenger data
    
    // Check if there are no main passengers
    if ($result_main_passenger->num_rows === 0) {
        echo "<p>No booked Customer</p>";
    } else {
        echo "<table>";
        echo "<tr><th>Main Passenger ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Contact Number</th><th>Seat</th><th>Accommodation</th><th>Total Price</th><th>Action</th></tr>";
        while ($main_passenger_data = $result_main_passenger->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $main_passenger_data['MainPassenger'] . "</td>";
            echo "<td>" . $main_passenger_data['first_name'] . "</td>";
            echo "<td>" . $main_passenger_data['last_name'] . "</td>";
            echo "<td>" . $main_passenger_data['email'] . "</td>";
            echo "<td>" . $main_passenger_data['contact_number'] . "</td>";
            echo "<td>" . $main_passenger_data['seat'] . "</td>";
            echo "<td>" . $main_passenger_data['accommodation'] . "</td>";
            echo "<td>₱ " . $main_passenger_data['total_price'] . "</td>";
            echo "<td class='btn-td'><button class='btn update-btn'>Update</button> <button class='btn view-btn'>View</button>";
            echo "<button class='btn delete-btn'>Delete</button></td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    // Retrieve and display other passengers' data
    $stmt_get_other_passengers = $conn->prepare("SELECT * FROM other_passengers");
    $stmt_get_other_passengers->execute();
    $result_other_passengers = $stmt_get_other_passengers->get_result();

    echo "<h2>Other Passengers Data</h2>"; // Title for other passengers data
    
    // Check if there are no other passengers
    if ($result_other_passengers->num_rows === 0) {
        echo "<p>No booked Customer</p>";
    } else {
        echo "<table>";
        echo "<tr><th>Main Passenger ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Contact Number</th><th>Seat</th><th>Accommodation</th><th>Action</th></tr>";
        while ($row = $result_other_passengers->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['MainPassenger'] . "</td>";
            echo "<td>" . $row['first_name'] . "</td>";
            echo "<td>" . $row['last_name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['contact_number'] . "</td>";
            echo "<td>" . $row['seat'] . "</td>";
            echo "<td>" . $row['accommodation'] . "</td>";
            
            echo "<td><button class='btn update-btn'>Update</button> <button class='btn view-btn'>View</button>";
            echo "<button class='btn delete-btn'>Delete</button></td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>
</div>

</main>
<script src="./js/adminfunct.js"></script>
</body>
</html>
