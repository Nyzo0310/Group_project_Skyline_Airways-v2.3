<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="icon" href="./assets/images/favicon.jpg">
    <link rel="stylesheet" href="/css/profile.css">
    <title>Skyline - Profile</title>
</head>
<body>

<header>
    <div class="logo">
        <img src="./assets/images/logo.jpg" alt="Airline Logo">
        <div class="title">
            <h1>Skyline Profile</h1>
        </div>
    </div>
    <nav>
        <ul>
            <li><a href="./index.php">Dashboard</a></li>
            <li><a href="./flights.php">Flights</a></li>
            <li><a href="./contact.php">Contact</a></li>
        </ul>
    </nav>
</header>

<main>
<div class="container">

    <?php
    // Start session
    session_start();

    // Check if user is logged in
    if(isset($_SESSION['username'])) {
        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database_name = "flightbooking";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $database_name);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve email of logged-in user from session
        $email = $_SESSION['username'];

        // Query to retrieve user information based on email
        $sql = "SELECT reg_firstname, reg_lastname, reg_email, reg_region, reg_province, reg_city, reg_barangay, reg_idUpload FROM logindata WHERE reg_email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                // Display profile header
                echo '<h1>';
                echo '<img src="./assets/images/user.png" alt="Flaticon Icon" class="flaticon-icon">';
                echo 'My Profile';
                echo '</h1>';
                // Display profile info
                echo '<div class="profile-info">';
                echo '<p><strong class=strong_font>Name :</strong> ' . $row["reg_firstname"] . ' ' . $row["reg_lastname"] . '</p>';
                echo '<p><strong class=strong_font>Email :</strong> ' . $row["reg_email"] . '</p>';
                // Retrieve and display region description
                $regionCode = $row["reg_region"];
                $regionDesc = getRegionDesc($regionCode);
                echo '<p><strong class=strong_font>Region :</strong> ' . $regionDesc . '</p>';
                // Retrieve and display province description
                $provinceCode = $row["reg_province"];
                $provinceDesc = getProvinceDesc($provinceCode);
                echo '<p><strong class=strong_font>Province :</strong> ' . $provinceDesc . '</p>';
                // Retrieve and display city/municipality description
                $citymunCode = $row["reg_city"];
                $citymunDesc = getCitymunDesc($citymunCode);
                echo '<p><strong class=strong_font>Municipality:</strong> ' . $citymunDesc . '</p>';
                // Retrieve and display barangay description
                $brgyCode = $row["reg_barangay"];
                $brgyDesc = getBrgyDesc($brgyCode);
                echo '<p><strong class=strong_font>Barangay :</strong> ' . $brgyDesc . '</p>';
                echo '</div>';

                // Display profile picture label
                echo '<p class="profile-picture-label">Profile Picture :</p>';

                // Display profile picture container
                echo '<div class="profile-picture-container">';
                echo '<img src="data:image/jpeg;base64,'.base64_encode($row['reg_idUpload']).'" alt="Profile Picture" class="profile-picture">';
                echo '</div>';

            }
        } else {
            echo "0 results";
        }

        $stmt->close();
        $conn->close();
    } else {
        // Redirect if user is not logged in
        header("Location: login.php");
        exit();
    }

    // Function to retrieve region description
    function getRegionDesc($regionCode) {
        global $conn;
        $sql = "SELECT regDesc FROM ph_region WHERE regCode = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $regionCode);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row["regDesc"];
    }

    // Function to retrieve province description
    function getProvinceDesc($provinceCode) {
        global $conn;
        $sql = "SELECT provDesc FROM ph_province WHERE provCode = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $provinceCode);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row["provDesc"];
    }

    // Function to retrieve city/municipality description
    function getCitymunDesc($citymunCode) {
        global $conn;
        $sql = "SELECT citymunDesc FROM ph_citymun WHERE citymunCode = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $citymunCode);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row["citymunDesc"];
    }

    // Function to retrieve barangay description
    function getBrgyDesc($brgyCode) {
        global $conn;
        $sql = "SELECT brgyDesc FROM ph_brgy WHERE brgyCode = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $brgyCode);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row["brgyDesc"];
    }
    ?>
    
    <!-- Add more profile-info divs with PHP code to retrieve other user information -->
    <div class="button-container">
        <button class="edit-profile-button">Edit Profile</button>
    </div>
</div>
</main>
<script>
    document.addEventListener('click', function() {
    // Add a CSS class to the elements you want to animate
    document.querySelector('.container').classList.add('animate');
 });
</script>
</body>
</html>
