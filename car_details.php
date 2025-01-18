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
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>

    <link rel="stylesheet" href="./assets/css/style.css" />

    <!-- 
    - google font link
  -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&family=Open+Sans&display=swap"
      rel="stylesheet"
    />
    <style>
        .container {
            margin-top: 20px;
        }

        .card {
            margin-bottom: 20px;
        }

        .car-images img {
            max-width: 250px;
            margin-right: 10px;
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
              <a href="#featured-car" class="navbar-link" data-nav-link
                >Explore cars</a
              >
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

          <button
            class="nav-toggle-btn"
            data-nav-toggle-btn
            aria-label="Toggle Menu"
          >
            <span class="one"></span>
            <span class="two"></span>
            <span class="three"></span>
          </button>
        </div>
      </div>
    </header>

    <main>
      <article>
        <!-- Details -->
      <section class="car-detail mt-9">
      <div class="container">
        <h1 class="text-center">Car Details</h1>
        <form method="GET" action="">
            <div class="mb-3">
                <label for="car_model" class="form-label">Select Car Model</label>
                <select class="form-select" id="car_model" name="car_model" required>
                    <option value="" disabled selected>Select Model</option>
                    <!-- Add options dynamically from the database -->
                    <?php
                    // Database connection settings
                    require 'connection.php';

                    // Fetch car models
                    $sql = "SELECT DISTINCT car_model FROM car_list";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row['car_model'] . '">' . $row['car_model'] . '</option>';
                        }
                    }

                    $conn->close();
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Show Details</button>
        </form>

        <?php
        if (isset($_GET['car_model'])) {
            // Database connection settings
            require 'connection.php';

            $car_model = $_GET['car_model'];

            // Fetch car details
            $sql = "SELECT * FROM car_list WHERE car_model = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $car_model);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="card">';
                    echo '<div class="card-header">' . $row['car_model'] . '</div>';
                    echo '<div class="card-body">';
                    echo '<p><strong>Registration Code:</strong> ' . $row['reg_code'] . '</p>';
                    echo '<p><strong>Car Category:</strong> ' . $row['car_cat_id'] . '</p>';
                    echo '<p><strong>Car Model:</strong> ' . $row['car_model'] . '</p>';
                    echo '<p><strong>Released Year:</strong> ' . $row['car_year'] . '</p>';
                    echo '<p><strong>Max People:</strong> ' . $row['max_people'] . '</p>';
                    echo '<p><strong>KM Per Litre:</strong> ' . $row['car_kmpl'] . '</p>';
                    echo '<p><strong>Car Type:</strong> ' . $row['car_type'] . '</p>';
                    echo '<p><strong>Costs Per Hour (Taka):</strong> ' . $row['costs'] . '</p>';
                    echo '<div class="car-images d-flex"><strong>Images:</strong><br>';
                    $images = explode(',', $row['image_path']);
                    foreach ($images as $image) {
                        echo '<img src="' . $image . '" alt="Car Image">';
                    }
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>No car details found for the selected model.</p>';
            }

            $stmt->close();
            $conn->close();
        }
        ?>
    </div>
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
    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>
  </body>
</html>
