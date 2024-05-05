<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/offers.css" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
  <link rel="icon" href="./assets/images/favicon.jpg">
  <title>Skyline - Travel offers</title>
</head>
<body>
  <header>
    <div class="logo">
      <img src="./assets/images/logo.jpg" alt="Airline Logo">
      <div class="title">
        <h1>Skyline Current Offers</h1>
      </div>
    </div>
    <nav>
      <ul>
        <li><a href="index.php">Dashboard</a></li>
        <li><a href="flights.php">Analytics</a></li>
        <li><a href="contact.php">Contact</a></li> 
      </ul>  
    </nav>
  </header> 
  <main>
    <div class="container">
      <h1 class="header">Travel Offers</h1>
      <div class="offers-container">

      <div class="manila offer">
          <h2>Manila</h2>
          <img src="./assets/images/manila.jpg" alt="Manila Bay or Baywalk">
          <p>Explore the vibrant city of Manila, where modern skyscrapers blend with colonial architecture, and glimpse into the city's rich cultural heritage.</p>
          <button class="book-now" onclick="redirectToIndex('Manila')" data-destination="Manila">Book Now</button>
        </div>

        <div class="boracay offer">
          <h2>Boracay</h2>
          <img src="./assets/images/boracay.jpg" alt="Boracay">
          <p>Discover the stunning beaches and crystal-clear waters of Boracay, a tropical paradise known for its powdery white sands.</p>
          <button class="book-now"  onclick="redirectToIndex('Boracay')" data-destination="Boracay">Book Now</button>
        </div>

        <div class="Cebu offer">
          <h2>Cebu</h2>
          <img src="./assets/images/cebu.jpg" alt="Cebu">
          <p>Embark on an unforgettable adventure in Cebu, where you can dive into turquoise waters teeming with marine life.</p>
          <button class="book-now"  onclick="redirectToIndex('Cebu')" data-destination="Cebu">Book Now</button>
        </div>

        <div class="Davao offer">
          <h2>Davao: Mount Apo Adventure</h2>
          <img src="./assets/images/davao.jpg" alt="Davao">
          <p>Embark on an epic journey to Mount Apo, the highest peak in the Philippines, and exhilarating adventures as you conquer this majestic mountain.</p>
          <button class="book-now"  onclick="redirectToIndex('Davao')" data-destination="Davao">Book Now</button>
        </div>

        <div class="Tacloban offer">
          <h2>Tacloban: Leyte Landing Memorial</h2>
          <img src="./assets/images/tacloban.jpg" alt="Tacloban">
          <p>Explore the historical significance of Tacloban, commemorating General Douglas MacArthur's return to the Philippines during World War II.</p>
          <button class="book-now"  onclick="redirectToIndex('Tacloban')" data-destination="Tacloban">Book Now</button>
        </div>

        <div class="Iloilo offer">
          <h2>Iloilo: Molo Church</h2>
          <img src="./assets/images/iloilo.jpg" alt="Iloilo">
          <p>Discover the stunning architecture and rich history of Molo Church in Iloilo City. Immerse yourself in the intricate details of this Gothic-inspired church.</p>
          <button class="book-now"  onclick="redirectToIndex('Ilo-ilo')" data-destination="Iloilo">Book Now</button>
        </div>

        <div class="Angeles offer">
          <h2>Angeles: Hidden Valley Springs</h2>
          <img src="./assets/images/angeles.jpg" alt="Angeles">
          <p>Escape to the serene paradise of Hidden Valley Springs in Angeles, nestled amidst lush greenery and natural beauty. </p>
          <button class="book-now"  onclick="redirectToIndex('Angeles')" data-destination="Angeles">Book Now</button>
        </div>

        <div class="Bacolod offer">
          <h2>Bacolod: The Ruins</h2>
          <img src="./assets/images/bacolod.jpg" alt="Bacolod">
          <p>Step back in time and marvel at the romantic allure of The Ruins in Bacolod. Explore the remnants of a grand mansion.</p>
          <button class="book-now"  onclick="redirectToIndex('Bacolod')" data-destination="Bacolod">Book Now</button>
        </div>

        <div class="Cagayan de oro offer">
          <h2>Cagayan de Oro: Adrenaline-pumping adventure</h2>
          <img src="./assets/images/cdo.jpg" alt="Cagayan de Oro">
          <p>Embark on an adrenaline-pumping adventure in Cagayan de Oro, where excitement awaits at every turn. From thrilling whitewater rafting along the Cagayan River.</p>
          <button class="book-now"  onclick="redirectToIndex('Cagayan De Oro')" data-destination="Cagayan de oro">Book Now</button>
        </div>

        <div class="Tagbilaran offer">
          <h2>Tagbilaran: Bohol Island Paradise</h2>
          <img src="./assets/images/tagbilaran.jpg" alt="Tagbilaran">
          <p>Indulge in the tropical splendor of Tagbilaran, located on the captivating Bohol Island. Dive into the crystal-clear waters and discover a paradise like no other.</p>
          <button class="book-now"  onclick="redirectToIndex('Tagbilaran')" data-destination="Tagbilaran">Book Now</button>
        </div>

        <div class="Kalibo offer">
          <h2>Kalibo: Bakhawan Eco Park</h2>
          <img src="./assets/images/bakhawan.JPG" alt="Kalibo">
          <p>Experience the wonders of nature at Bakhawan Eco Park in Kalibo, a sprawling mangrove forest sanctuary teeming with biodiversity. immerse yourself in the tranquil beauty of this ecological gem.</p>
          <button class="book-now"  onclick="redirectToIndex('Kalibo')" data-destination="Kalibo">Book Now</button>
        </div>
      </div>
    </div>
  </main>

  <footer>
    <p>&copy; <?php echo date("Y"); ?> Skyline Airways PH</p>
  </footer>

  <script src="./js/offers.js"></script>
</body>
</html>
