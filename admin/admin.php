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
    <div class="content">
        <!-- Your admin dashboard content goes here -->
    </div>
</main>      
<script>
// JavaScript for dropdown functionality
document.addEventListener("DOMContentLoaded", function() {
    var dropdowns = document.getElementsByClassName("dropdown");
    for (var i = 0; i < dropdowns.length; i++) {
        dropdowns[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.getElementsByClassName("dropdown-content")[0];
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }
});
document.addEventListener("DOMContentLoaded", function() {
    // Add click event listener to the logout link
    document.querySelector('a.logout').addEventListener('click', function(event) {
        // Prevent default link behavior
        event.preventDefault(); 
        
        // Display notification
        alert("You have been logged out successfully!");
        
        // Redirect to logout.php after the alert is shown
        window.location.href = "logout.php";
    });
});
</script>
</body>
</html>