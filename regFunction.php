<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle file upload
    $file_temp = $_FILES['id_upload']['tmp_name'];

    // Check if file is uploaded successfully
    if (is_uploaded_file($file_temp)) {
        // Read file content
        $file_content = file_get_contents($file_temp);

        // Include your database connection file
        include './config/database.php';

        // Retrieve other form data
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $email = $_POST["email"];
        $password = $_POST["password"]; // Remember to hash the password
        $confirm_password = $_POST["confirm_password"];
        $region = $_POST["inp_region"];
        $province = $_POST["inp_province"];
        $citymun = $_POST["inp_citymun"];
        $barangay = $_POST["inp_brgy"];

        // Initialize response array
        $response = array();

        // Check if password and confirm password match
        if ($password !== $confirm_password) {
            $response['success'] = false;
            $response['message'] = "Passwords do not match.";
            echo json_encode($response);
            exit();
        }

        // Check if email already exists
        $check_email_sql = "SELECT reg_email FROM logindata WHERE reg_email = ?";
        $stmt_check_email = $conn->prepare($check_email_sql);
        $stmt_check_email->bind_param("s", $email);
        $stmt_check_email->execute();
        $stmt_check_email->store_result();
        if ($stmt_check_email->num_rows > 0) {
            $response['success'] = false;
            $response['message'] = "Email already exists.";
            echo json_encode($response);
            exit();
        }

        // Escape special characters to prevent SQL injection
        $escaped_first_name = mysqli_real_escape_string($conn, $first_name);
        $escaped_last_name = mysqli_real_escape_string($conn, $last_name);
        $escaped_email = mysqli_real_escape_string($conn, $email);
        $escaped_region = mysqli_real_escape_string($conn, $region);
        $escaped_province = mysqli_real_escape_string($conn, $province);
        $escaped_citymun = mysqli_real_escape_string($conn, $citymun);
        $escaped_barangay = mysqli_real_escape_string($conn, $barangay);

        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert data into database
        $sql = "INSERT INTO logindata (reg_firstname, reg_lastname, reg_email, reg_pass, reg_region, reg_province, reg_city, reg_barangay, reg_idUpload)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Prepare statement
        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bind_param("sssssssss", $escaped_first_name, $escaped_last_name, $escaped_email, $hashed_password, $escaped_region, $escaped_province, $escaped_citymun, $escaped_barangay, $file_content);

        // Execute statement
        if ($stmt->execute()) {
            // Insert successful
            $response['success'] = true;
            $response['message'] = "Registration successful!";
            echo json_encode($response);
            exit();
        } else {
            // Insert failed
            $response['success'] = false;
            $response['message'] = "Error occurred while registering. Please try again later.";
            echo json_encode($response);
            exit();
        }

        // Close statement
        $stmt->close();
    } else {
        // File upload failed
        $response['success'] = false;
        $response['message'] = "Error uploading file";
        echo json_encode($response);
        exit();
    }

    // Close database connection
    $conn->close();
}
?>