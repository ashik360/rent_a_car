<?php
require 'connection.php';
?>
<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "rent_car");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM car_list";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Rent your favourite car</title>

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml" />

  <!-- 
    - custom css link
  -->

  <!-- 
    - Bootstrap link
  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

  <link rel="stylesheet" href="./assets/css/style.css" />

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&family=Open+Sans&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
    integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    .featured-car-card {
      width: 300px;
      /* Set a fixed width for the card */
      /*height: 450px; Set a fixed height for the card */
      background-color: #fff;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      display: flex;
      flex-direction: column;
      overflow: hidden;
      padding: 10px;
    }

    /* Image container */
    .card-banner {
      width: 100%;
      height: 200px;
      /* Fixed height for the image */
      overflow: hidden;
    }

    .card-banner img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      /* Ensure the image covers the entire space */
    }

    .card-content {
      flex-grow: 1;
      padding-top: 10px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }


    /* Ensure buttons appear in the same row */
    .btn+.btn {
      margin-left: 10px;
    }


    /* Responsive Design */
    @media (max-width: 768px) {
      .featured-car-card {
        width: 100%;
        /* Full width on smaller screens */
        height: auto;
      }

      .card-banner {
        height: 150px;
        /* Adjust image height for small screens */
      }

      .card-price-wrapper {
        text-align: left;
      }
    }
  </style>
</head>

<body>
  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>
    <div class="container">
      <div class="overlay" data-overlay></div>

      <a href="#" class="logo">
        <img src="./assets/images/logo.png" alt="logo" />
      </a>

      <nav class="navbar" data-navbar>
        <ul class="navbar-list">
          <li>
            <a href="index.php" class="navbar-link" data-nav-link>Home</a>
          </li>

          <li>
            <a href="#featured-car" class="navbar-link" data-nav-link>Explore cars</a>
          </li>

          <li>
            <a href="#" class="navbar-link" data-nav-link>About us</a>
          </li>

          <li>
            <a href="#blog" class="navbar-link" data-nav-link>Blog</a>
          </li>
        </ul>
      </nav>

      <div class="header-actions">
        <div class="header-contact">
          <a href="tel:88002345678" class="contact-link">8 800 234 56 78</a>

          <span class="contact-time">Mon - Sat: 9:00 am - 6:00 pm</span>
        </div>

        <a href="#featured-car" class="btn" aria-labelledby="aria-label-txt">
          <ion-icon name="car-outline"></ion-icon>

          <span id="aria-label-txt">Explore cars</span>
        </a>

        <a href="#" class="btn user-btn" aria-label="Profile">
          <ion-icon name="person-outline"></ion-icon>
        </a>

        <button class="nav-toggle-btn" data-nav-toggle-btn aria-label="Toggle Menu">
          <span class="one"></span>
          <span class="two"></span>
          <span class="three"></span>
        </button>
      </div>
    </div>
  </header>

  <main>
    <article>
      <!-- 
        - #HERO
      -->



      <!-- 
        - #FEATURED CAR
      -->
      <!-- Slider -->
      <section style="margin-top: 6vh;" class="section new-arrival featured-car" id="featured-car">
        <div class="container">
          <div class="title-wrapper">
            <h2 class="h2 section-title">New Arrival !!</h2>


          </div>

          <div class="cards sl-cards">
            <div class="cards-slide">
              <ul class="featured-car-list d-flex">
                <?php
                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    ?>
                    <li>
                      <div class="featured-car-card">
                        <figure class="card-banner my-0">
                          <div class="card-wrapper">
                            <div class="card-content">
                              <h2 class="card-title"><?php echo $row['car_model']; ?></h2>
                              <p class="card-seats">Seats: <?php echo $row['max_people']; ?></p>
                              <div class="card-buttons">
                                <button class="btn book-now">Book Now</button>
                                <button class="btn fav-btn">
                                  <ion-icon name="heart-outline"></ion-icon>
                                </button>
                              </div>
                            </div>
                          </div>
                          <img src="<?php echo $row['image_path']; ?>" alt="<?php echo $row['car_model']; ?>" loading="lazy"
                            width="440" height="300" class="w-100" />
                        </figure>
                      </div>
                    </li>

                    <?php
                  }
                } else {
                  echo "<p>No cars available.</p>";
                }
                ?>
              </ul>
            </div>
          </div>
        </div>

        <!-- ==========================Featured======================== -->
        <!-- 
        - #FEATURED CAR
      -->


        <section class="section featured-car" id="featured-car">
          <div class="container">
            <div class="title-wrapper">
              <h2 class="h2 section-title">Featured cars</h2>
              <a href="#" class="btn user-btn" aria-label="Profile">
                <h4 style="margin-bottom: -4px;"><?php echo $result->num_rows; ?></h4>
              </a>
            </div>
            <?php
            require 'connection.php';

            // Database connection
            $conn = new mysqli("localhost", "root", "", "rent_car");

            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM car_list";
            $result = $conn->query($sql);

            // Fetch all results into an array
            $cars = $result->fetch_all(MYSQLI_ASSOC);
            ?>
            <ul class="featured-car-list">
              <?php
              if (count($cars) > 0) {
                foreach ($cars as $row) {
                  ?>
                  <li>
                    <div class="featured-car-card">
                      <figure class="card-banner">
                        <img src="<?php echo $row['image_path']; ?>" alt="<?php echo $row['car_model']; ?>" loading="lazy"
                          width="440" height="300" class="w-100" />
                      </figure>

                      <div class="card-content">
                        <div class="card-title-wrapper d-flex justify-content-between">
                          <h3 class="h3 card-title">
                            <a href="#"><?php echo $row['car_model']; ?></a>
                          </h3>
                          <data class="year" value="<?php echo $row['car_year']; ?>"><?php echo $row['car_year']; ?></data>
                        </div>

                        <ul class="card-list">
                          <li class="card-list-item">
                            <ion-icon name="people-outline"></ion-icon>
                            <span class="card-item-text"><?php echo $row['max_people']; ?> People</span>
                          </li>
                          <li class="card-list-item">
                            <ion-icon name="flash-outline"></ion-icon>
                            <span class="card-item-text"><?php echo $row['car_type']; ?></span>
                          </li>
                          <li class="card-list-item">
                            <ion-icon name="speedometer-outline"></ion-icon>
                            <span class="card-item-text"><?php echo $row['car_kmpl']; ?> km / 1-litre</span>
                          </li>
                          <li class="card-list-item">
                            <ion-icon name="hardware-chip-outline"></ion-icon>
                            <span class="card-item-text">Automatic</span>
                          </li>
                        </ul>

                        <div class="card-price-wrapper">
                          <p class="card-price"><strong><?php echo $row['costs']; ?> <i
                                class="fa-solid fa-bangladeshi-taka-sign"></i></strong>/ Hour</p>
                          <button class="btn fav-btn" aria-label="Add to favourite list">
                            <ion-icon name="heart-outline"></ion-icon>
                          </button>
                          <button class="btn">
                            <a href="entryform.php?car_id=<?php echo $row['id']; ?>"
                              style="text-decoration:none; color:white;">
                              Rent now</a>
                          </button>
                        </div>
                      </div>
                    </div>
                  </li>
                  <?php
                }
              } else {
                echo "<p>No cars available.</p>";
              }
              ?>
            </ul>
          </div>
        </section>


        <?php
        $conn->close();
        ?>
      </section>

    </article>
  </main>

  <!-- 
    - #FOOTER
  -->

  <footer class="footer">
    <div class="container">
      <div class="footer-top">
        <div class="footer-brand">
          <a href="#" class="logo">
            <img src="./assets/images/logo.png" alt="logo" />
          </a>

          <p class="footer-text">
            Search for cheap rental cars in Dhaka. With a diverse fleet of
            19,000 vehicles, Waydex offers its consumers an attractive and fun
            selection.
          </p>
        </div>

        <ul class="footer-list">
          <li>
            <p class="footer-list-title">Company</p>
          </li>

          <li>
            <a href="#" class="footer-link">About us</a>
          </li>

          <li>
            <a href="#" class="footer-link">Pricing plans</a>
          </li>

          <li>
            <a href="#" class="footer-link">Our blog</a>
          </li>

          <li>
            <a href="#" class="footer-link">Contacts</a>
          </li>
        </ul>

        <ul class="footer-list">
          <li>
            <p class="footer-list-title">Support</p>
          </li>

          <li>
            <a href="#" class="footer-link">Help center</a>
          </li>

          <li>
            <a href="#" class="footer-link">Ask a question</a>
          </li>

          <li>
            <a href="#" class="footer-link">Privacy policy</a>
          </li>

          <li>
            <a href="#" class="footer-link">Terms & conditions</a>
          </li>
        </ul>

        <ul class="footer-list">
          <li>
            <p class="footer-list-title">Neighborhoods in Dhaka</p>
          </li>

          <li>
            <a href="#" class="footer-link">Tongi</a>
          </li>

          <li>
            <a href="#" class="footer-link">Central Dhaka City</a>
          </li>

          <li>
            <a href="#" class="footer-link">Upper East Side</a>
          </li>

          <li>
            <a href="#" class="footer-link">Uttora</a>
          </li>

          <li>
            <a href="#" class="footer-link">Savar</a>
          </li>

          <li>
            <a href="#" class="footer-link">Gazipur</a>
          </li>

          <li>
            <a href="#" class="footer-link">Narayangonj</a>
          </li>

          <li>
            <a href="#" class="footer-link">Tangail</a>
          </li>
        </ul>
      </div>

      <div class="footer-bottom">
        <ul class="social-list">
          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-linkedin"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-skype"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="mail-outline"></ion-icon>
            </a>
          </li>
        </ul>

        <p class="copyright">
          &copy; 2024 <a href="https://ashik360.github.io/">ashik360</a>. All Rights Reserved
        </p>
      </div>
    </div>
  </footer>

  <!-- 
    - custom js link
  -->
  <script src="https://code.jquery.com/jquery-migrate-3.4.0.min.js"></script>
  <!-- 
    - custom js link
  -->
  <script src="./assets/js/script.js"></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>