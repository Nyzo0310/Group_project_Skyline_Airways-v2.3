<?php   
session_start(); // Start the session

include './config/database.php';

$email = ""; // Initialize the $email variable

if(isset($_SESSION['username'])) {
    // Retrieve email of logged-in user from session
    $email = $_SESSION['username'];

    $sql = "SELECT * FROM `logindata` WHERE reg_email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // Output data of each row
      $row = $result->fetch_assoc();

      // Retrieve the image data (longblob) from the row
      $image_blob = $row['reg_idUpload'];
    }
} else {
    // Redirect to the login page if user is not logged in
    header("Location: login.php");
    exit(); // Ensure that script execution stops after redirection
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
$regionCode = $row["reg_region"];
$regionDesc = getRegionDesc($regionCode);
$provinceCode = $row["reg_province"];
$provinceDesc = getProvinceDesc($provinceCode);
$citymunCode = $row["reg_city"];
$citymunDesc = getCitymunDesc($citymunCode);
$brgyCode = $row["reg_barangay"];
$brgyDesc = getBrgyDesc($brgyCode);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="icon" href="./assets/images/favicon.jpg">
    <link rel="stylesheet" href="./css/profile.css">
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
        <h2>Profile Information</h2>
        <form>
            <div class="grid">
            <label for="idimg">ID Picture</label>
                <div class="ID">
                <input type="image" name="idimg" id="idimg" src="data:image/jpeg;base64,<?php echo base64_encode($image_blob); ?>" alt="ID Picture"><br>
            </div>
      <div>
        <label for="Firstname">Name:</label>
        <input type="text" name="Firstname" id="Firstname" value="<?php echo $row['reg_firstname']; echo' ';  echo $row['reg_lastname'];?>" readonly>
        <label for="BDate">Birth Date</label>
        <input type="date" name="BDate" id="BDate" value="<?php echo $row['dob']; ?>" readonly>
        <label for="Age">Age: <b id="ageAsterisk" style="display: none;" class="required">*</b></label>
            <input type="text" name="Age" id="Age" value="<?php echo $row['age']; ?>" readonly>
            <b id="ageAsterisk" style="display: none;" class="required">*</b>
        <label for="Gender">Gender: <b id="genderAsterisk" style="display: none;" class="required">*</b></label>
            <input type="text" name="Gender" id="Gender" value="<?php echo $row['gender']; ?>" readonly>
            <b id="genderAsterisk" style="display: none;" class="required">*</b>
        <label for="Status">Status: <b id="statusAsterisk" style="display: none;" class="required">*</b></label>
            <input type="text" name="Status" id="Status" value="<?php echo $row['status']; ?>" readonly>
            <b id="statusAsterisk" style="display: none;" class="required">*</b>
        <label for="Phonenumber">Phone Number: <b id="phoneAsterisk" style="display: none;" class="required">*</b></label>
            <input type="text" name="Phonenumber" id="Phonenumber" value="<?php echo $row['phone']; ?>" readonly>
            <b id="phoneAsterisk" style="display: none;" class="required">*</b>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo $row['reg_email']; ?>" readonly>
      </div>
      <div class="secondcolumn">
      <label for="Nationality">Nationality: <b id="nationalityAsterisk" style="display: none;" class="required">*</b></label>
            <input type="text" name="Nationality" id="Nationality" value="<?php echo $row['nationality']; ?>" readonly>
            <b id="nationalityAsterisk" style="display: none;" class="required">*</b>
        <label for="Region">Region</label>
        <input type="text" name="Region" id="Region" value="<?php echo $regionDesc ?>" readonly><br>
        <label for="Province">Province</label>
        <input type="text" name="Province" id="Province" value="<?php echo $provinceDesc ?>" readonly><br>
        <label for="Citymun">City/Municipality</label>
        <input type="text" name="Citymun" id="Citymun" value="<?php echo $citymunDesc ?>" readonly><br>
        <label for="Brgy">Barangay</label>
        <input type="text" name="Brgy" id="Brgy" value="<?php echo $brgyDesc ?>" readonly>
        <button type="button" id="editProfileBtn">Edit Profile</button>
      </div>
    </div>
  </form>
</div>
  <!-- Container for edit form -->
  <div class="edit-container" style="display: none;">
        <h2>Edit Profile</h2>
        <form id="editForm" action="update.php" method="POST">
            <!-- Editable inputs for profile information -->
            <label for="EditFirstname">First Name:</label>
            <input type="text" name="EditFirstname" id="EditFirstname"><br>
            <label for="EditLastname">Last Name:</label>
            <input type="text" name="EditLastname" id="EditLastname"><br>
            <label for="EditBDate">Birth Date</label>
            <input type="date" name="EditBDate" id="EditBDate"><br>
            <label for="EditAge">Age:</label>
            <input type="text" name="EditAge" id="EditAge"><br>
            <label for="EditGender">Gender:</label>
            <select name="EditGender" id="EditGender" class="line-input" required>
            <option value="">Select Gender</option>
            <option value="Male" <?php if (isset($savedFormData['gender']) && $savedFormData['gender'] === 'male') echo 'selected'; ?>>Male</option>
            <option value="Female" <?php if (isset($savedFormData['gender']) && $savedFormData['gender'] === 'female') echo 'selected'; ?>>Female</option>
            </select><br>
            <label for="EditStatus">Status:</label>
            <select name="EditStatus" id="EditStatus" class="line-input" required>
            <option value="">Select Status</option>
            <?php
            $statuses = array("Married", "Single", "Divorced", "Widowed", "Separated", "In a relationship", "It's Complicated");
            foreach ($statuses as $option) {
            echo '<option value="' . $option . '"';
            if (isset($savedFormData['status']) && $savedFormData['status'] === $option) echo ' selected';
            echo '>' . $option . '</option>';
            }
            ?>
            </select><br>
            <label for="EditPhonenumber">Phone Number:</label>
            <input type="text" name="EditPhonenumber" id="EditPhonenumber"><br>
            <label for="EditNationality">Nationality</label>
            <select name="EditNationality" id="EditNationality">
                <option value="">Select Nationality</option>
                <?php
                $nationalities = array("Filipino", "Filipino-American", "Filipino-British", "Filipino-Canadian", "Dual Citizen (Filipino and another nationality)", "Other");
                foreach ($nationalities as $option) {
                    echo '<option value="' . $option . '"';
                    if ($row['nationality'] === $option) echo ' selected';
                    echo '>' . $option . '</option>';
                }
                ?>
            </select><br>
            <div class="col-md-12">
            <label for="EditRegion">Region : <s class="text-danger"></s></label>
                <select name="EditRegion" id="EditRegion" onchange="display_province(this.value)" required class="form-control mt-2">
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
                    ?>
                </select>
            </div>
            <div class="col-md-12">
                <label for="EditProvince">Province : <b class="text-danger"></b></label>
                <select name="EditProvince" id="EditProvince" onchange="display_citymun(this.value)" required class="form-control mt-2">
                    <option value="" disabled selected>-- SELECT PROVINCE --</option>
                </select>
            </div>
            <div class="col-md-12">
                <label for="EditCitymun">City / Municipality : <b class="text-danger"></b></label>
                <select name="EditCitymun" id="EditCitymun" onchange="display_brgy(this.value)" required class="form-control mt-2">
                    <option value="" disabled selected>-- SELECT CITY / MUNICIPALITY --</option>
                </select>
            </div>
            <div class="col-md-12">
                <label for="EditBrgy">Barangay : <b class="text-danger"></b></label>
                <select name="EditBrgy" id="EditBrgy" required class="form-control mt-2">
                    <option value="" disabled selected>-- SELECT BARANGAY --</option>
                </select>
            </div>
        </form>
        <button type="submit" form="editForm">Save</button>
    </div>
    
    <script>
        
        document.getElementById('editProfileBtn').addEventListener('click', function() {
            // Toggle visibility of the edit container
            var editContainer = document.querySelector('.edit-container');
            editContainer.style.display = editContainer.style.display === 'none' ? 'block' : 'none';

        });

        function display_province(regCode) {
            $.ajax({
                url: './model/ph_address.php',
                type: 'POST',
                data: {
                    'type': 'region',
                    'post_code': regCode
                },
                success: function (response) {
                    $('#EditProvince').html(response);
                }
            });
        }

        function display_citymun(provCode) {
            $.ajax({
                url: './model/ph_address.php',
                type: 'POST',
                data: {
                    'type': 'province',
                    'post_code': provCode
                },
                success: function (response) {
                    $('#EditCitymun').html(response);
                }
            });
        }

        function display_brgy(citymunCode) {
            $.ajax({
                url: './model/ph_address.php',
                type: 'POST',
                data: {
                    'type': 'citymun',
                    'post_code': citymunCode
                },
                success: function (response) {
                    $('#EditBrgy').html(response);
                }
            });
        }
        
    </script>
    <script src="./js/profile.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
</main>
</body>
</html>