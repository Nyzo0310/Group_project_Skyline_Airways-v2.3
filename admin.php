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
<header>
    <div class="logo">
        <img src="./assets/images/logo.jpg" alt="Airline Logo">
        <div class="title">
            <h1>Skyline Admin Page</h1>
        </div>
    </div>
    <nav>
        <ul>
            <li><a href="#">Ongoing Flights</a></li>
            <li><a href="#">Analytics</a></li>
            <?php
            session_start(); // Start the session
            if(isset($_SESSION['username'])) {
                // If the user is logged in, display a welcome message which will serve as the dropdown button
                echo '<div class="dropdown">';
                echo '<button class="dropbtn">Hello, ' . $_SESSION['username'] . '</button>';
                echo '<div class="dropdown-content">';
                echo '<a href="#">Profile</a>';
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
    <?php
    include './config/database.php';

    // Define your SQL query
    $sql = "SELECT * FROM logindata"; // Change 'your_table' to your actual table name

    // Execute the query
    $result = $conn->query($sql);

    // Check if there are rows returned
    if ($result->num_rows > 0) {
        // Output table header
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th></tr>"; // Corrected column names

        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["reg_id"] . "</td>"; // Replace 'id' with your actual column names
            echo "<td>" . $row["reg_firstname"] . "</td>"; // Replace 'name' with your actual column names
            echo "<td>" . $row["reg_lastname"] . "</td>"; // Replace 'email' with your actual column names
            echo "</tr>";
        }

        // Close table
        echo "</table>";
    } else {
        // No records found
        echo "0 results";
    }
    ?>
   
</main>      
<script src="./js/adminfunct.js"></script>
</body>
</html>
