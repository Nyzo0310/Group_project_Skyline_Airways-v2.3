<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <title>Skyline - Admin Dashboard</title>
    <link rel="icon" href="./assets/images/favicon.jpg">
    <link rel="stylesheet" href="./css/admin_dasboard.css">
    <link href="./assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body style="background-color: #b9b4b4;">
<header class="header1">
    <div class="logo">
        <img src="./assets/images/logo.jpg" alt="Airline Logo">
        <div class="title">
            <h1>Skyline Admin Page</h1>
        </div>
    </div>
    <nav>
        <ul>
            <li><a href="./admin_ui/admin_flights.php">Flights</a></li>
            <li><a href="./admin_ui/admin_contact.php">Contact</a></li>
            <li><a href="./admin_ui/admin_user.php">User</a></li>
            <?php
            session_start(); // Start the session
            if(isset($_SESSION['username'])) {
                // If the user is logged in, display a welcome message which will serve as the dropdown button
                echo '<div class="dropdown">';
                echo '<button class="dropbtn">Hello, ' . $_SESSION['username'] . '</button>';
                echo '<div class="dropdown-content">';
                echo '<a href="logout.php" class="logout">Logout</a>';
                echo '</div>';
                echo '</div>';
            } else {
                // If the user is not logged in, display a login link
                echo '<li><a href="login.php">Login</a></li>';
            }
            function checkLoggedIn() {
                if (!isset($_SESSION['username'])) {
                    header("Location: login.php"); // Redirect to the login page
                    exit(); // Stop script execution
                }
            }
            
            // Call this function at the beginning of any page where you want to restrict access
            checkLoggedIn();
            ?>
            ?> 
        </ul>  
    </nav>
</header> 

<main>

<div class="analytics">
    <img class="anal-logo" src="/assets/images/data-analytics.png" alt="">
    <h1 class="h1-anal">ANALYTICS</h1>
</div>
<div>
    <?php
    // Include the database configuration file
    include './config/database.php';

    // Query to calculate the total booking amount
    $query = "SELECT SUM(total_price) AS total_amount FROM main_passengers";
    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if the query executed successfully
    if ($result) {
        // Fetch the result as an associative array
        $row = mysqli_fetch_assoc($result);
        // Get the total booking amount from the result
        $total_amount = $row['total_amount'];
    } else {
        // Handle the case where the query fails by setting total amount to 0
        $total_amount = 0;
    }

    // Query to count the total number of users
    $query = "SELECT COUNT(reg_id) AS total_users FROM logindata";
    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if the query executed successfully
    if ($result) {
        // Fetch the result as an associative array
        $row = mysqli_fetch_assoc($result);
        // Get the total number of users from the result
        $total_users = $row['total_users'];
    } else {
        // Handle the case where the query fails by setting total users to 0
        $total_users = 0;
    }

    $query = "SELECT COUNT(contact_id) AS total_comments FROM contact_information";

        // Execute the query
        $result = mysqli_query($conn, $query);

        // Check if the query executed successfully
        if ($result) {
            // Fetch the result as an associative array
            $row = mysqli_fetch_assoc($result);
            // Get the total number of comments from the result
            $total_comments = $row['total_comments'];
        } else {
            // Handle the case where the query fails by setting total comments to 0
            $total_comments = 0;
                }

    
?>

    <div class="flex-analy">
        <div class="analy1">
            <div class="in1">
                <img style="width: 100px; height: 100px;" src="/assets/images/profit.png" alt="">
            </div>
            <div class="amount">
                <p>TOTAL SALES</p>
                <h1><?php echo '₱' . number_format($total_amount, 0, '.', ','); ?></h1>
            </div>
        </div>
        <div class="analy2">
            <div class="in2">
                <img style="width: 100px; height: 100px;" src="/assets/images/multiple-users-silhouette.png" alt="">
            </div>
            <div class="total">
                <p>TOTAL USERS</p>
                <h1><?php echo number_format($total_users, 0, '.', ','); ?></h1>
            </div>
        </div>
        <div class="analy3">
            <div class="in3">
                <img style="width: 100px; height: 100px;" src="/assets/images/chat.png" alt="">
            </div>
            <div class="comments">
                <p>TOTAL MESSAGES</p>
                <h1><?php echo number_format( $total_comments, 0, '.', ',');?></h1>
            </div>
        </div>
    </div>
</div>


<div class="main-container">
    
    <?php
    include './config/database.php';

    // Retrieve main passenger data
    $stmt_get_main_passenger = $conn->prepare("SELECT * FROM main_passengers");
    $stmt_get_main_passenger->execute();
    $result_main_passenger = $stmt_get_main_passenger->get_result();

    ?>
    
    <?php
    // Check if there are no main passengers
    if ($result_main_passenger->num_rows === 0) {
    ?>
        <p>No booked Customer</p>
    <?php
    } else {
    ?>
    <div class="card-header mt-4"><h2 class="mainpass">Main Passenger Data</h2></div>
    <div class="card-body">
        <table class="table table-bordered table-hover custom-table">
            <tr>
                <th>Main Passenger ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Seat</th>
                <th>Accommodation</th>
                <th>Total Price</th>
                <th>Action</th>
            </tr>
            <?php
            while ($main_passenger_data = $result_main_passenger->fetch_assoc()) {
            ?>
                <tr>
                    <td><?= $main_passenger_data['MainPassenger'] ?></td>
                    <td><?= $main_passenger_data['first_name'] ?></td>
                    <td><?= $main_passenger_data['last_name'] ?></td>
                    <td><?= $main_passenger_data['email'] ?></td>
                    <td><?= $main_passenger_data['contact_number'] ?></td>
                    <td><?= $main_passenger_data['seat'] ?></td>
                    <td><?= $main_passenger_data['accommodation'] ?></td>
                    <td>₱ <?= $main_passenger_data['total_price'] ?></td>
                    <td class="btn-td">
                    <form method="post" action="./model/con_book.php">
                        <!-- Hidden input field to pass the ID -->
                        <input type="hidden" name="passenger_id" value="<?= $main_passenger_data['MainPassenger'] ?>">
                        <button type="submit" class="btn btn-outline-success" name="update-btn">Confirm</button>
                    </form>

                        <button class="btn btn-outline-primary view-btn" data-main-passenger="<?= htmlspecialchars(json_encode($main_passenger_data), ENT_QUOTES, 'UTF-8') ?>">View</button>
                        <button class="btn btn-outline-danger delete-btn">Decline</button>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
    <?php
    }

    // Retrieve and display other passengers' data
    $stmt_get_other_passengers = $conn->prepare("SELECT * FROM other_passengers");
    $stmt_get_other_passengers->execute();
    $result_other_passengers = $stmt_get_other_passengers->get_result();

    ?>
    <?php
    // Check if there are no other passengers
    if ($result_other_passengers->num_rows === 0) {
    ?>
        <p>No booked Customer</p>
    <?php
    } else {
    ?>
    <div class="card-header"><h2 class="otherpass">Other Passenger Data</h2></div>
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <tr>
                <th>Other Passenger ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Seat</th>
                <th>Accommodation</th>
                <th>Action</th>
            </tr>
            <?php
            while ($row = $result_other_passengers->fetch_assoc()) {
            ?>
                <tr>
                    <td><?= $row['MainPassenger'] ?></td>
                    <td><?= $row['first_name'] ?></td>
                    <td><?= $row['last_name'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['contact_number'] ?></td>
                    <td><?= $row['seat'] ?></td>
                    <td><?= $row['accommodation'] ?></td>
                    <td class="btn-td">
                        <button class="btn btn-outline-success update-btn">Confirm</button>
                        <button class="btn btn-outline-primary view-btn">View</button>
                        <button class="btn btn-outline-danger delete-btn">Decline</button>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
        <div class="card-footer">
            <p >
                <center style="font-size: 20px; font-weight:bold; ">Skyline Airways &reg;</center>
            </p>
        </div>
    <?php
    }
    ?>
    <tbody id="result">

    </tbody>

    <!-- Modal Structure -->
    <div class="modal fade" id="view-details">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Booking Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body" id="modal-body"></div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>


</main>
    <script 
        src="./js/adminfunct.js">
    </script>
    <script src="./assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
</body>
</html>
