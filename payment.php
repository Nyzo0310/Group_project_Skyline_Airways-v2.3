<?php
session_start();
include_once './config/database.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_POST['payment_method'])) {
    header("Location: confirm_booking.php");
    exit();
}


$payment_method = $_POST['payment_method'];

// Process payment based on the selected method
if ($payment_method === 'gcash') {
} elseif ($payment_method === 'paypal') {
} elseif ($payment_method === 'credit_card') {
} else {
    header("Location: confirm_booking.php");
    exit();
}
?>
