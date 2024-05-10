<?php
$destination = isset($_GET['destination']) ? htmlspecialchars($_GET['destination']) : '';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/dashboard.css" />
    <link rel="icon" href="./assets/images/favicon.jpg">
    <title>Skyline - Dashboard</title>
  </head>
  <body>

  <header>
      <div class="logo">
          <img src="./assets/images/logo.jpg" alt="Airline Logo">
          <div class="title">
              <h1>Skyline Dashboard</h1>
          </div>
      </div>
      <nav>
          <ul>
              <li><a href="flights.php">Flights</a></li>
              <li><a href="offers.php">Offers</a></li>
              <li><a href="analytics.php">Analytics</a></li>
              <li><a href="contact.php">Contact</a></li> 
              <?php
              session_start(); // Start the session
              if(isset($_SESSION['username'])) {
                  // If the user is logged in, display a welcome message which will serve as the dropdown button
                  echo '<div class="dropdown">';
                  echo '<button class="dropbtn">Hello, ' . $_SESSION['username'] . '</button>';
                  echo '<div class="dropdown-content">';
                  echo '<a href="profile.php">Profile</a>';
                  echo '<a href="inbox.php">Inbox</a>';
                  echo '<a href="logout.php" class="logout">Logout</a>';
                  echo '</div>';
                  echo '</div>';
              } else {
                  // If the user is not logged in, display a login link
                  echo '<li><a href="login.php">Login</a></li>';
              }
              ?>
          </ul>  
      </nav>
  </header> 

  <main>
    <section class="section__container header__container">
        <h1 class="section__header">Skyline Airways<br />Your Trusted Travel Companion</h1>
        <img id="searchFlight1" src="./assets/images/header.jpg" alt="header" />
    </section>

    <section class="section__container booking__container">
    <h2 class="section__header">Search Flight</h2> 

      <div class="booking__nav"></div>
      <form>
          <div class="form__group">
            <span><i class="fas fa-plane-departure"></i></span>
            <div class="input__content">
              <div class="input__group">
                <input type="text" list="locations" id="locationInput" />
                <label>Departure</label>
              </div>
              <p>Select a location</p>
            </div>
            <datalist id="locations">
            <option value="Manila">
            <option value="Cebu">
            <option value="Boracay">
            <option value="Davao">
            <option value="Tacloban">
            <option value="Iloilo">
            <option value="Angeles">
            <option value="Bacolod">
            <option value="Cagayan de oro">
            <option value="Tagbilaran">
            <option value="Puerto Princesa City">
            <option value="Kalibo">
            <!-- Dari pag add pang ilisi lang ang lugar sa taas -->
        </datalist>
    </div>

    <div class="form__group">
        <span><i class="fas fa-plane-arrival"></i></span>
        <div class="input__content">
          <div class="input__group">
          <input type="text" list="destinations" id="destinationInput" value="<?php echo isset($_GET['destination']) ? htmlspecialchars($_GET['destination']) : ''; ?>">

            <label>Destination</label>
          </div>
          <p>Select a destination</p>
        </div>
        <datalist id="destinations">
            <option value="Manila">
            <option value="Cebu">
            <option value="Boracay">
            <option value="Davao">
            <option value="Tacloban">
            <option value="Iloilo">
            <option value="Angeles">
            <option value="Bacolod">
            <option value="Cagayan de oro">
            <option value="Tagbilaran">
            <option value="Puerto Princesa City">
            <option value="Kalibo">
            <!-- Dari pag add pang ilisi lang ang lugar sa taas -->
        </datalist>
    </div>

      <div class="form__group">
          <span><i class="far fa-calendar-alt"></i></span>
          <div class="input__content">
            <div class="input__group">
            <input type="text" min="<?= date('Y-m-d') ?>" id="departureInput" onclick="openDatePicker()" />
              <label>Departure Date</label>
            </div>
            <p>Select Date</p>
          </div>
        </div>

        <div class="form__group btn__group">
          <button class="btn"><i class="fas fa-search"></i></button>
        </div>
      </form>
    </section>

    <section class="section__container plan__container">
      <p class="subheader">TRAVEL SUPPORT</p>
      <h2 class="section__header">Plan your travel with confidence</h2>
      <p class="description">
        Find help with your bookings and travel plans, and seee what to expect
        along your journey.
      </p>
      <div class="plan__grid">
        <div class="plan__content">
          <span class="number">01</span>
          <h4>Travel Requirements for Philippines</h4>
          <p>
            Stay informed and prepared for your trip to Philippines with essential
            travel requirements, ensuring a smooth and hassle-free experience in
            this vibrant and captivating city.
          </p>
          <span class="number">02</span>
          <h4>Multi-risk travel insurance</h4>
          <p>
            Comprehensive protection for your peace of mind, covering a range of
            potential travel risks and unexpected situations.
          </p>
          <span class="number">03</span>
          <h4>Travel Requirements by destinations</h4>
          <p>
            Stay informed and plan your trip with ease, as we provide up-to-date
            information on travel requirements specific to your desired
            destinations.
          </p>
        </div>
        <div class="plan__image">
          <img src="./assets/images/PLAN 2.jpg" alt="plan" />
          <img src="./assets/images/PLAN 1.jpg" alt="plan" />
          <img src="./assets/images/PLAN 3.jpg" alt="plan" />
        </div>
      </div>
      </section>

    <section class="section__container lounge__container">
      <div class="lounge__image">
        <img src="./assets/images/lounge-2.jpg" alt="lounge" />
        <img src="./assets/images/lounge-1.jpg" alt="lounge" />
      </div>
      <div class="lounge__content">
        <h2 class="section__header">Unaccompanied Minor Lounge</h2>
        <div class="lounge__grid">
          <div class="lounge__details">
            <h4>Experience Tranquility</h4>
            <p>
              Serenity Haven offers a tranquil escape, featuring comfortable
              seating, calming ambiance, and attentive service.
            </p>
          </div>
          <div class="lounge__details">
            <h4>Elevate Your Experience</h4>
            <p>
              Designed for discerning travelers, this exclusive lounge offers
              premium amenities, assistance, and private workspaces.
            </p>
          </div>
          <div class="lounge__details">
            <h4>A Welcoming Space</h4>
            <p>
              Creating a family-friendly atmosphere, The Family Zone is the
              perfect haven for parents and children.
            </p>
          </div>
          <div class="lounge__details">
            <h4>A Culinary Delight</h4>
            <p>
              Immerse yourself in a world of flavors, offering international
              cuisines, gourmet dishes, and carefully curated beverages.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="subscribe">
      <div class="section__container subscribe__container">
        <h2 class="section__header">Subscribe newsletter & get latest news</h2>
        <form class="subscribe__form">
          <input type="text" placeholder="Enter your email here" />
          <button class="btn">Subscribe</button>
        </form>
      </div>
    </section>
    </main>

    <footer class="footer">
      <div class="section__container footer__container">
        <div class="footer__col">
          <h3>Skyline Airways</h3>
          <p>
            Where Excellence Takes Flight. With a strong commitment to customer
            satisfaction and a passion for air travel, Skyline Air offers
            exceptional service and seamless journeys.
          </p>
          <p>
            From friendly smiles to state-of-the-art aircraft, we connect the
            world, ensuring safe, comfortable, and unforgettable experiences.
          </p>
        </div>
        <div class="footer__col">
          <h4>INFORMATION</h4>
          <p>Destination</p>
          <p><a href="offers.php"></a> Offers</p>
          <p><a href="login.php">Login</a></p>
        </div>
        <div class="footer__col">
          <h4>CONTACT</h4>
          <p><a href="Airline_Ticket_Reservation_System/pages/pages/contact.html">Support</a></p>
          <p>Media</p>
          <p>Socials</p>
        </div>
      </div>
      <div class="section__container footer__bar">
        <p>Skyline Airways PH © 2024 Your Trusted Travel Companion. All rights reserved.</p>
        <div class="socials">
          <span><i class="ri-facebook-fill"></i></span>
          <span><i class="ri-twitter-fill"></i></span>
          <span><i class="ri-instagram-line"></i></span>
          <span><i class="ri-youtube-fill"></i></span>
        </div>
      </div>
    </footer>
    <script src="./js/dashboard.js"></script>
  </body>
</html>