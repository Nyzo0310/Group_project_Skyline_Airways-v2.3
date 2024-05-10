<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skyline - Registration</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="icon" href="./assets/images/favicon.jpg">
    <link rel="stylesheet" href="./css/registration.css">
</head>

<header>
    <div class="logo">
        <img src="./assets/images/logo.jpg" alt="Airline Logo">
        <div class="title">
            <h1>Skyline Registration</h1>
        </div>
    </div>
    <nav>
        <ul>
            <li><a href="./index.php">Dashboard</a></li>
            <li><a href="./contact.php">Contact</a></li>
            <li><a href="./login.php">Login</a></li>
        </ul>
    </nav>
</header>

<body>

<main>
<div class="registration-container">
    <h2 style="text-align: left;">Registration</h2>
    <form id="registrationForm" method="post" action="regFunction.php" enctype="multipart/form-data" onsubmit="return submitForm()">
    <div class="form-row">
        <!-- First column -->
        <div class="form-column">
            <label>First Name:<b style="color: red">*</b></label>
            <input type="text" name="first_name" placeholder="First Name" required><br>
            
            <label>Last Name: <b style="color: red">*</b></label>
            <input type="text" name="last_name" placeholder="Last Name" required><br>
            
            <label>Email: <b style="color: red">*</b></label>
            <input type="email" name="email" placeholder="Email Address" required><br>
            
            <label>Password: <b style="color: red">*</b></label>
            <input type="password" name="password" id="password" placeholder="Password" required><br>
            
            <label>Confirm Password: <b style="color: red">*</b></label>
            <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required><br>
        </div><hr>

        <!-- Second column -->
        <div class="form-column">
        <?php
                        include './config/database.php';
                        ?>
                        <div class="col-md-12">
                        
                        </div>
                        <div class="col-md-12">
                            <label>Region : <b style="color: red">*</b></label>
                            <select name="inp_region" id="inp_region" onchange="display_province(this.value)" required
                                class="form-control mt-2">
                                <option value="" disabled selected>-- SELECT REGION --</option>

                                <?php
                                $sql = "SELECT * FROM ph_region";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        ?>
                                        <option value="<?= $row['regCode'] ?>"><?= $row['regDesc'] ?></option>
                                        <?php
                                    }
                                } else {
                                    echo "0 results";
                                }

                                $conn->close();
                                ?>
                            </select>
                        </div>

            <label1>Province : <b style="color: red">*</b></label1>
            <select name="inp_province" id="inp_province" onchange="display_citymun(this.value)" required class="form-control mt-2">
                <option value="" disabled selected>-- SELECT PROVINCE --</option>
                <!-- PHP code for provinces -->
            </select>

            <label1>City / Municipality : <b style="color: red">*</b></label1>
            <select name="inp_citymun" id="inp_citymun" onchange="display_brgy(this.value)" required class="form-control mt-2">
                <option value="" disabled selected>-- SELECT CITY / MUNICIPALITY --</option>
                <!-- PHP code for cities/municipalities -->
            </select>
            <label1>Barangay : <b style="color: red">*</b> </b></label1>
            <select name="inp_brgy" id="inp_brgy" required class="form-control mt-2">
                <option value="" disabled selected>-- SELECT BARANGAY --</option>
                <!-- PHP code for barangays -->
            </select>
            
        </div><hr>
        <!-- Third column -->
        <div class="form-column">
            
            <label>Input ID: <b style="color: red">*</b></label>
            <input type="file" name="id_upload" id="fileInput" accept="image/*" required onchange="previewImage(event)"><br>
            <img id="imagePreview" src="#" alt="Image Preview" style="width: 290px; height: 290px; display: none;"><br>
        </div>
    </div><hr>

    <input type="submit" value="Register" onclick="return validatePassword()"><br> 

    <!-- Error message -->
    <?php if(isset($_GET['error'])): ?>
        <div id="notification" style="display: block; background-color: #ff6666; color: white; padding: 10px;">
            <?php
            $errorMessage = "";
            switch ($_GET['error']) {
                case 'password_mismatch':
                    $errorMessage = "Passwords do not match.";
                    break;
                case 'email_exists':
                    $errorMessage = "Email already exists.";
                    break;
                case 'insert_failed':
                    $errorMessage = "Error occurred while registering. Please try again later.";
                    break;
                // Add more cases if needed
                default:
                    $errorMessage = "Unknown error occurred.";
            }
            ?>
            <p><?php echo $errorMessage; ?></p>
        </div>
    <?php endif; ?>

    <?php
    // Check for success parameter
    if (isset($_GET['success']) && $_GET['success'] == 1) {
        $successMessage = "Registration successful!";
    }
    ?>
       
    <!-- Success notification -->
    <?php if(isset($_GET['success']) && $_GET['success'] == 1): ?>
        <div id="notification" class="success" style="display: block;">
            <p>Registration successful!</p>
        </div>
        <script>
            // Redirect to registration page without any error parameter
            window.location.href = 'registration.php';
        </script>
    <?php endif; ?>

</form>
</div>
</main>

<footer>
    <p>&copy; 2024 Skyline Airways PH. All rights reserved.</p>
</footer>>

<!-- Notification div -->
<div id="notification" style="display: none; background-color: #ff6666; color: white; padding: 10px;"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="./js/registration.js"></script>
</body>
</html>