<?php
// Start session
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $dob = isset($_POST['dob']) ? $_POST['dob'] : '';
    $age = isset($_POST['age']) ? $_POST['age'] : '';
    $status = isset($_POST['status']) ? $_POST['status'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $nationality = isset($_POST['nationality']) ? $_POST['nationality'] : '';

    // Store values in session variables
    $_SESSION['form_data'] = [
        'gender' => $gender,
        'dob' => $dob,
        'age' => $age,
        'status' => $status,
        'phone' => $phone,
        'nationality' => $nationality
    ];

    // Redirect to prevent form resubmission
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}

// Check if user is logged in
if (isset($_SESSION['username'])) {
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

    // Retrieve saved form data from the database, if available
    $sql = "SELECT gender, dob, age, status, phone, nationality FROM logindata WHERE reg_email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Store retrieved data in session variables
        $_SESSION['form_data'] = [
            'gender' => $row['gender'],
            'dob' => $row['dob'],
            'age' => $row['age'],
            'status' => $row['status'],
            'phone' => $row['phone'],
            'nationality' => $row['nationality']
        ];
    }

    $stmt->close();
    $conn->close();
} else {
    // Redirect if user is not logged in
    header("Location: login.php");
    exit();
}
?>



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
    <div class="profile-info-left">
        <?php
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
                    echo '<p><strong class="strong_font">Name :</strong> <input type="text" value="' . $row["reg_firstname"] . ' ' . $row["reg_lastname"] . '" class="line-input" readonly></p>';
                    echo '<p><strong class="strong_font">Email :</strong> <input type="text" value="' . $row["reg_email"] . '" class="line-input" readonly></p>';
                    // Retrieve and display region description
                    $regionCode = $row["reg_region"];
                    $regionDesc = getRegionDesc($regionCode);
                    echo '<p><strong class="strong_font">Region :</strong> <input type="text" value="' . $regionDesc . '" class="line-input" readonly></p>';
                    // Retrieve and display province description
                    $provinceCode = $row["reg_province"];
                    $provinceDesc = getProvinceDesc($provinceCode);
                    echo '<p><strong class="strong_font">Province :</strong> <input type="text" value="' . $provinceDesc . '" class="line-input" readonly></p>';
                    // Retrieve and display city/municipality description
                    $citymunCode = $row["reg_city"];
                    $citymunDesc = getCitymunDesc($citymunCode);
                    echo '<p><strong class="strong_font">Municipality:</strong> <input type="text" value="' . $citymunDesc . '" class="line-input" readonly></p>';
                    // Retrieve and display barangay description
                    $brgyCode = $row["reg_barangay"];
                    $brgyDesc = getBrgyDesc($brgyCode);
                    echo '<p><strong class="strong_font">Barangay :</strong> <input type="text" value="' . $brgyDesc . '" class="line-input" readonly></p>';
                    echo '<label class="profile-picture-label">ID Picture :</label>';
                    echo '</div>';

                    // Display profile picture container
                    echo '<div id="profile-picture-container" class="profile-picture-container">';
                    echo '<img src="data:image/jpeg;base64,'.base64_encode($row['reg_idUpload']).'" alt="Profile Picture" id="profile-picture" class="profile-picture">';
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
    </div>

    <div class="profile-info-right">
        <!-- Profile update form -->
        <form id="profile-update-form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div>
                <!-- Input fields for gender, date of birth, age, status, phone, and nationality -->
                <!-- PHP echo used for value attributes to retain previously entered values -->
                <!-- Add your PHP code here for retrieving previously entered values, if available -->
                <?php
                // Retrieve saved form data from session, if available
                $savedFormData = isset($_SESSION['form_data']) ? $_SESSION['form_data'] : [];

                // Display profile info (Gender, Date of Birth, Age, Status, Phone Number, and Nationality)
                echo '<div class="profile-info">';
                echo '<p><strong class="strong_font">Gender :';
                echo (!isset($savedFormData['gender']) || empty($savedFormData['gender'])) ? ' <b style="color: red">*</b>' : ''; 
                echo '</strong> 
                <select name="gender" class="line-input" required>';
                echo '<option value="">Select Gender</option>';
                echo '<option value="male"'; 
                if (isset($savedFormData['gender']) && $savedFormData['gender'] === 'male') echo ' selected';
                echo '>Male</option>';
                echo '<option value="female"';
                if (isset($savedFormData['gender']) && $savedFormData['gender'] === 'female') echo ' selected';
                echo '>Female</option>';
                echo '</select>
                </p>';

                echo '<p><strong class="strong_font">Date of Birth :';
                echo (!isset($savedFormData['dob']) || empty($savedFormData['dob'])) ? ' <b style="color: red">*</b>' : ''; 
                echo '</strong> 
                <input type="date" name="dob" class="line-input" value="' . htmlspecialchars($savedFormData['dob'] ?? '') . '" required>
                </p>';

                echo '<p><strong class="strong_font">Age :';
                echo (!isset($savedFormData['age']) || empty($savedFormData['age'])) ? ' <b style="color: red">*</b>' : ''; 
                echo '</strong> <input type="text" name="age" class="line-input" placeholder="Please enter your age" value="' . htmlspecialchars($savedFormData['age'] ?? '') . '"></p>';
                echo '<p><strong class="strong_font">Status :';
                echo (!isset($savedFormData['status']) || empty($savedFormData['status'])) ? ' <b style="color: red">*</b>' : ''; 
                echo '</strong> 
                <select name="status" class="line-input" required>';
                echo '<option value="">Select Status</option>';
                $statuses = array("Married", "Single", "Divorced", "Widowed", "Separated", "In a relationship", "It\'s Complicated");
                foreach ($statuses as $option) {
                    echo '<option value="' . $option . '"';
                    if (isset($savedFormData['status']) && $savedFormData['status'] === $option) echo ' selected';
                    echo '>' . $option . '</option>';
                }
                echo '</select>
                </p>';

                echo '<p><strong class="strong_font">Phone Number :';
                echo (!isset($savedFormData['phone']) || empty($savedFormData['phone'])) ? ' <b style="color: red">*</b>' : ''; 
                echo '</strong> <input type="text" name="phone" class="line-input" placeholder="Please enter your phone number" value="' . htmlspecialchars($savedFormData['phone'] ?? '') . '"></p>';
                echo '<p><strong class="strong_font">Nationality:';
                echo (!isset($savedFormData['nationality']) || empty($savedFormData['nationality'])) ? ' <b style="color: red">*</b>' : ''; 
                echo '</strong> 
                <select name="nationality" class="line-input" required>';
                echo '<option value="">Select Nationality</option>';
                $nationalities = array("Filipino", "Filipino-American", "Filipino-British", "Filipino-Canadian", "Dual Citizen (Filipino and another nationality)", "Other");
                foreach ($nationalities as $option) {
                    echo '<option value="' . $option . '"';
                    if (isset($savedFormData['nationality']) && $savedFormData['nationality'] === $option) echo ' selected';
                    echo '>' . $option . '</option>';
                }
                echo '</select>
                </p>';

                echo '</div>';
                ?>


            </div>

            <!-- Add edit profile button here -->
            <div class="button-container">
                <button type="button" class="edit-profile-button">Edit Profile</button>
                <button type="submit" class="save-profile-button">Save Profile</button>
            </div>

            <!-- Display success message if it's not empty -->
            <?php if (!empty($successMessage)) : ?>
                <div id="success-notification" class="success-message"><?php echo $successMessage; ?></div>
            <?php endif; ?>

            <script>
                // Function to show success notification and hide it after 3 seconds
                function showSuccessNotification() {
                    var successNotification = document.getElementById('success-notification');
                    successNotification.classList.remove('hidden');
                    setTimeout(function() {
                        successNotification.classList.add('hidden');
                    }, 3000); // 3000 milliseconds = 3 seconds
                }

                // After form submission, show success notification
                document.getElementById('profile-update-form').addEventListener('submit', function() {
                    showSuccessNotification();
                });
            </script>

        </form>
    </div>
</div>
</main>

<!-- Modal -->
<div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Edit Profile</h2>
        <!-- Add form fields for editing profile information -->
        <form id="edit-profile-form">
            <!-- Add your form fields here -->
            <input type="text" placeholder="First Name" name="firstname">
            <input type="text" placeholder="Last Name" name="lastname">
            <!-- Add more fields as needed -->
            <button type="submit">Save Changes</button>
        </form>
    </div>
</div>

<!-- Notification -->
<?php
if(isset($_SESSION['success_message'])) {
    echo '<div class="success-message">' . $_SESSION['success_message'] . '</div>';
    unset($_SESSION['success_message']);
}
?>

<script src="./js/profile.js"></script>
<script>
    document.addEventListener('click', function() {
        // Add a CSS class to the elements you want to animate
        document.querySelector('.container').classList.add('animate');
    });
</script>
</body>
</html>