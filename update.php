<?php
session_start(); // Start the session

include './config/database.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $editFirstname = $_POST['EditFirstname'];
    $editLastname = $_POST['EditLastname'];
    $editBDate = $_POST['EditBDate'];
    $editAge = $_POST['EditAge'];
    $editGender = $_POST['EditGender'];
    $editStatus = $_POST['EditStatus'];
    $editPhonenumber = $_POST['EditPhonenumber'];
    $editNationality = $_POST['EditNationality'];
    $editRegion = $_POST['EditRegion'];
    $editProvince = $_POST['EditProvince'];
    $editCitymun = $_POST['EditCitymun'];
    $editBrgy = $_POST['EditBrgy'];

    // Update query
    $sql = "UPDATE `logindata` SET 
            `reg_firstname`='$editFirstname',
            `reg_lastname`='$editLastname',
            `dob`='$editBDate',
            `age`='$editAge',
            `gender`='$editGender',
            `status`='$editStatus',
            `phone`='$editPhonenumber',
            `nationality`='$editNationality',
            `reg_region`='$editRegion',
            `reg_province`='$editProvince',
            `reg_city`='$editCitymun',
            `reg_barangay`='$editBrgy'
            WHERE reg_email = '".$_SESSION['username']."'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("Location: profile.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    // Redirect to the login page if form is not submitted
    header("Location: login.php");
    exit(); // Ensure that script execution stops after redirection
}
?>
