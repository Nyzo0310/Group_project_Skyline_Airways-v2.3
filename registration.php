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
            <label>First Name</label>
            <input type="text" name="first_name" placeholder="First Name" required><br>
            
            <label>Last Name</label>
            <input type="text" name="last_name" placeholder="Last Name" required><br>
            
            <label>Email</label>
            <input type="email" name="email" placeholder="Email Address" required><br>
            
            <label>Password</label>
            <input type="password" name="password" id="password" placeholder="Password" required><br>
            
            <label>Confirm Password</label>
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
                            <label>Region : <b class="text-danger">*</b></label>
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

            <label1>Province : <b class="text-danger">*</b></label1>
            <select name="inp_province" id="inp_province" onchange="display_citymun(this.value)" required class="form-control mt-2">
                <option value="" disabled selected>-- SELECT PROVINCE --</option>
                <!-- PHP code for provinces -->
            </select>

            <label1>City / Municipality : <b class="text-danger">*</b></label1>
            <select name="inp_citymun" id="inp_citymun" onchange="display_brgy(this.value)" required class="form-control mt-2">
                <option value="" disabled selected>-- SELECT CITY / MUNICIPALITY --</option>
                <!-- PHP code for cities/municipalities -->
            </select>
            <label1>Barangay : <b class="text-danger">*</b></label1>
            <select name="inp_brgy" id="inp_brgy" required class="form-control mt-2">
                <option value="" disabled selected>-- SELECT BARANGAY --</option>
                <!-- PHP code for barangays -->
            </select>
            
        </div><hr>
        <!-- Third column -->
        <div class="form-column">
            
            <label>Input ID</label>
            <input type="file" name="id_upload" id="fileInput" accept="image/*" required onchange="previewImage(event)"><br>
            <img id="imagePreview" src="#" alt="Image Preview" style="width: 290px; height: 290px; display: none;"><br>
        </div>
    </div><hr>

    <input type="submit" value="Register" onclick="return validatePassword()"><br> 

    <!-- Error message -->
    <?php if(isset($errorMessage)): ?>
        <p style="color: red;"><?php echo $errorMessage; ?></p>
    <?php endif; ?>
            
    <!-- Success notification -->
    <?php if(!empty($successMessage)): ?>
        <div id="notification" style="display: block;">
            <p style="color: green;"><?php echo $successMessage; ?></p>
        </div>
    <?php endif; ?>
</form>
</div>
<script>
function display_province(regCode) {
    $.ajax({
        url: './Models/ph_address.php',
        type: 'POST',
        data: {
            'type': 'region',
            'post_code': regCode
        },
        success: function (response) {
            $('#inp_province').html(response);
        }
    });

}

function display_citymun(provCode) {
    $.ajax({
        url: './Models/ph_address.php',
        type: 'POST',
        data: {
            'type': 'province',
            'post_code': provCode
        },
        success: function (response) {
            $('#inp_citymun').html(response);
        }
    });

}

function display_brgy(citymunCode) {
    $.ajax({
        url: './Models/ph_address.php',
        type: 'POST',
        data: {
            'type': 'citymun',
            'post_code': citymunCode
        },
        success: function (response) {
            $('#inp_brgy').html(response);
        }
    });

}
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="./js/registration.js"></script>
</main>

<footer>
    <p>&copy; 2024 Skyline Airways PH. All rights reserved.</p>
</footer>
</body>
</html>
