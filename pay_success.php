<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="icon" href="./assets/images/favicon.jpg">
    <title>Skyline - Payment Success</title>
    <style>
        /* Header Styles */
header {
    position: fixed;
    font-style: normal;
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: rgba(0, 0, 0, 0.7);
    width: 100%;
    box-sizing: border-box;
    margin: 0;
    position: absolute;
    top: 0;
    left: 0;
    z-index: 2;
}

.logo {
    display: flex;
    align-items: center;
    padding-left: 10px;
}

.logo img {
    height: 50px;
    margin-right: 15px;
}

.title h1 {
    font-size: 26px;
    margin: 0;
    color: #fff;
    font-size: 20px;
    /* justify-content: left; Remove justify-content */
    /* width: 300px; Remove fixed width */
    font-family: 'Montserrat', sans-serif; /* Use the Montserrat font */
    font-weight: 500; /* Adjust font weight as needed */
    margin-right: 20px; /* Add margin to create space between logo and title */
}
  
nav {
    max-width: 1400px; /* Adjust the max-width value as needed */
    width: 100%;
    padding: 2rem 1.5rem; /* Increase the padding to add more space */
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-family: 'Montserrat', sans-serif; /* Use the Montserrat font */
    font-weight: 500; /* Adjust font weight as needed */
}

nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    font-size: 16px; /* Adjust the font size as needed */
    display: flex;
    margin-left: auto; /* Align the nav ul content to the right */
}

nav ul li:not(:last-child) {
    margin-right: 5px; /* Add margin between list items */
}

nav ul li a {
    font-size: 20px;
    color: white;
    text-decoration: none;
    font-weight: 500;
    padding: 10px 20px;
    border-radius: 5px;
    transition: background-color 0.3s;
}

nav ul li a:hover {
    background-color: rgba(255, 255, 255, 0.1);
    cursor: pointer;
}

/* Add this to style the dropdown button */
nav .dropdown .dropbtn {
    color: #fff;
    text-decoration: none;
    font-weight: bold;
    padding: 10px 20px;
    border-radius: 5px;
    transition: background-color 0.3s;
    cursor: pointer; /* Change cursor to pointer */
}

nav .dropdown .dropbtn:hover {
    background-color: rgba(255, 255, 255, 0.1);
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropbtn {
    background-color: transparent;
    color: white;
    padding: 10px 20px;
    font-size: 16px;
    border: none;
    cursor: pointer;
    font-family: Arial, sans-serif;
    transition: background-color 0.3s;
}

.dropbtn:hover {
    background-color: rgba(255, 255, 255, 0.1);
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #333; /* Background color of the dropdown */
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    border-radius: 5px;
    padding: 10px;
}

.dropdown-content a {
    color: white;
    padding: 10px 0;
    text-decoration: none;
    display: block;
    transition: color 0.3s;
}

.dropdown-content a:hover {
    background-color: rgba(255, 255, 255, 0.1);
}

.dropdown.active .dropdown-content {
    display: block;
}

.dropdown-content a.logout {
    color: red; /* Color for logout link */
}
/* End of Header Styles */
        * {
            margin: 0;
            padding: 0;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }
        body {
            background: #bdc3c7;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #2c3e50, #bdc3c7);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #2c3e50, #bdc3c7); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            font-family: "Poppins", sans-serif;
            font-weight: 300;
            font-size: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        h3 {
            font-size: 4rem;
            font-weight: 600;
            text-align: center;
        }
        .container {
            width: 800px;
            background: white;
            padding: 5rem 7rem;
            border-radius: 1.25rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-evenly;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.25);
        }
        .container-heading {
            margin-bottom: 20px;
        }
        .container-image {
            width: 100px;
            margin-bottom: 20px;
        }
        .container-welcome {
            font-size: 3rem;
            margin-bottom: 10px;
        }
        .container-text {
            text-align: center;
            font-size: 1.6rem;
            font-weight: 400;
            margin-bottom: 20px;
        }
        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            color: #fff;
            padding: 27px; /* Increase the padding */
            text-align: center;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 2;
            font-size: 1.1rem; /* Increase the font size */
        }
    </style>
</head>
<body>
<header>
    <div class="logo">
        <img src="./assets/images/logo.jpg" alt="Airline Logo">
        <div class="title">
            <h1>Skyline Payment</h1>
        </div>
    </div>
    <nav>
        <ul>
            <li><a href="./index.php">Dashboard</a></li>
            <li><a href="./flights.php">Flight</a></li>
            <li><a href="./contact.php">Contact</a></li>
        </ul>
    </nav>
</header>


    <main>
        <div class="container">
            <h3 class="container-heading">Payment Successful!</h3>
            <img class="container-image" src="https://res.cloudinary.com/dmnazxdav/image/upload/v1599736321/tick_hhudfj.svg" alt="Payment Successful">
            <h3 class="container-welcome">Thank you for choosing us</h3>
            <p class="container-text">An automated payment receipt will be sent to your registered email.</p>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Skyline Airways PH. All rights reserved.</p>
    </footer>
</body>
</html>
