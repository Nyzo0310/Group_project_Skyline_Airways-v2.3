<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <title>Skyline - Contact</title>
    <link rel="icon" href="./assets/images/favicon.jpg">
    <link rel="stylesheet" href="./css/contact.css">
</head>
<body>
<header>
    <div class="logo">
        <img src="./assets/images/logo.jpg" alt="Airline Logo">
        <div class="title">
            <h1>Skyline Contact</h1>
        </div>
    </div>
    <nav>
        <ul>
            <li><a href="flights.php">Flights</a></li>
            <li><a href="#">Analytics</a></li>
        </ul>
    </nav>
</header>

<div class="container">
    <h1>Contact Us</h1>
    <form action="#" method="post" id="contactForm">
        <label for="name">Your Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Your Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="6" required></textarea>

        <input type="submit" value="Submit">
    </form>

    <!-- Notification -->
    <div class="notification" id="notification"></div>

    <div class="back-button">
        <a href="index.php">Back to dashboard</a>
    </div>
</div>
<footer>
    <p>&copy; 2024 Skyline Airways PH. All rights reserved.</p>
</footer>

<script src="./js/contact.js"></script>

</body>
</html>
