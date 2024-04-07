<?php
include_once 'config/database.php';

$errorMessage = ''; // Initialize error message variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if password and confirm password match
    if ($password !== $confirm_password) {
        $errorMessage = "Passwords do not match.";
    } else {
        // Check if email is already taken
        $stmt = $conn->prepare("SELECT * FROM logindata WHERE Email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $errorMessage = "Email already exists.";
        } else {
            // Hash the password before storing it
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Prepare and bind the SQL statement
            $stmt = $conn->prepare("INSERT INTO logindata (firstname, lastname, Email, password) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $first_name, $last_name, $email, $hashed_password);

            // Execute the statement
            if ($stmt->execute()) {
                // Registration successful, redirect to login page
                header("Location: login.php");
                exit();
            } else {
                // Registration failed
                $errorMessage = "Error: " . $stmt->error;
            }

            // Close statement
            $stmt->close();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skyline - Registration</title>
    <link rel="icon" href="./assets/images/favicon.jpg">
    <link rel="stylesheet" href="./css/registration.css">
</head>
<body>
    <div class="registration-container">
        <h2 style="text-align: left;">Registration</h2>
        <form id="registrationForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="text" name="first_name" placeholder="First Name" required><br>
            <input type="text" name="last_name" placeholder="Last Name" required><br>
            <input type="email" name="email" placeholder="Email Address" required><br>
            <input type="password" name="password" id="password" placeholder="Password" required><br>
            <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required><br>
            <input type="submit" value="Register" onclick="return validatePassword()"><br> 
            <?php if(isset($errorMessage)): ?>
                <p style="color: red;"><?php echo $errorMessage; ?></p>
            <?php endif; ?>
            <p style="margin-top: 10px;"><a href="/login.php">Back to login</a>.</p>
        </form>
    </div>
    <script src="./js/registration.js"></script>
     <footer>
        <p>&copy; 2024 Skyline Airways PH. All rights reserved.</p>
    </footer>
</body>
</html>

