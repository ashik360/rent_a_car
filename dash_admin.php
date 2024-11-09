<?php
session_start();
?>
<?php 
// Check if the user is not authenticated and redirect to the login page
if (!isset($_SESSION['username'])) {
  header('location:login1.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=.5" />
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
  </head>

  <body class="zoom-fix">
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
              <a href="explore.php" class="navbar-link" data-nav-link
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

          <a href="explore.php" class="btn" aria-labelledby="aria-label-txt">
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
        <!-- 
        - #Admin HERO
      -->
        <section class="admin pt-5 mt-5">
          <div class="container-fluid text-center">
            <div class="row">
              <div class="col-md-2 admin-menus  position-fixed sticky-top mt-9"style="height: 100vh; overflow-y: auto;">
                <h2 class="my-3" style="color: var(--white);">Menu</h2>
                <a href="#">
                  <div class="card mb-3 mt-2 c-hover bg-active  bg-gradient" style="--bs-bg-opacity: .5;max-width: 540px; padding: .8rem 0;">
                    <div class="row g-0">
                      <div class="col-md-2"></div>
                      <div class="col-md-8 d-flex justify-content-start align-items-center">
                        <span><i class="nav-icon fas fa-tachometer-alt mx-2"></i></span>
                        <span class="admin-list">Dashboard
                          </span>
                      </div>
                      <div class="col-md-2"></div>
                    </div>
                  </div>
                </a>
                <a class="" href="cars_admin.php">
                  <div class="card mb-3 mt-2 c-hover" style="max-width: 540px; padding: .8rem 0;">
                    <div class="row g-0">
                      <div class="col-md-2"></div>
                      <div class="col-md-8 d-flex justify-content-start  align-items-center">
                        <span><i class="nav-icon fas fa-tachometer-alt mx-2"></i></span>
                        <span class="admin-list">Car Management
                          </span>
                      </div>
                      <div class="col-md-2"></div>
                    </div>
                  </div>
                </a>
                <a class="" href="categ_admin.php">
                  <div class="card mb-3 mt-2 c-hover" style="max-width: 540px; padding: .8rem 0;">
                    <div class="row g-0">
                      <div class="col-md-2"></div>
                      <div class="col-md-8 d-flex justify-content-start  align-items-center">
                        <span><i class="nav-icon fas fa-tachometer-alt mx-2"></i></span>
                        <span class="admin-list">Manage Categories
                          </span>
                      </div>
                      <div class="col-md-2"></div>
                    </div>
                  </div>
                </a>
                <a class="" href="book_admin.php">
                  <div class="card mb-3 mt-2 c-hover" style="max-width: 540px; padding: .8rem 0;">
                    <div class="row g-0">
                      <div class="col-md-2"></div>
                      <div class="col-md-8 d-flex justify-content-start  align-items-center">
                        <span><i class="nav-icon fas fa-tachometer-alt mx-2"></i></span>
                        <span class="admin-list">View Bookings
                          </span>
                      </div>
                      <div class="col-md-2"></div>
                    </div>
                  </div>
                </a>
                <a class="" href="reg_users.php">
                  <div class="card mb-3 mt-2 c-hover" style="max-width: 540px; padding: .8rem 0;">
                    <div class="row g-0">
                      <div class="col-md-2"></div>
                      <div class="col-md-8 d-flex justify-content-start  align-items-center">
                        <span><i class="nav-icon fas fa-tachometer-alt mx-2"></i></span>
                        <span class="admin-list">Registered Users
                          </span>
                      </div>
                      <div class="col-md-2"></div>
                    </div>
                  </div>
                </a>
                <a class="" href="drivers_admin.php">
                  <div class="card mb-3 mt-2 c-hover" style="max-width: 540px; padding: .8rem 0;">
                    <div class="row g-0">
                      <div class="col-md-2"></div>
                      <div class="col-md-8 d-flex justify-content-start  align-items-center">
                        <span><i class="nav-icon fas fa-tachometer-alt mx-2"></i></span>
                        <span class="admin-list">Drivers
                          </span>
                      </div>
                      <div class="col-md-2"></div>
                    </div>
                  </div>
                </a>
                <a class="" href="#">
                  <div class="card mb-3 mt-2 c-hover" style="max-width: 540px; padding: .8rem 0;">
                    <div class="row g-0">
                      <div class="col-md-2"></div>
                      <div class="col-md-8 d-flex justify-content-start  align-items-center">
                        <span><i class="nav-icon fas fa-tachometer-alt mx-2"></i></span>
                        <span class="admin-list">Settings
                          </span>
                      </div>
                      <div class="col-md-2"></div>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-md-10 offset-md-2">
                <div class="card">
                  <div class="card-header">
                    <div class="row">
                      <div class="col-md-3 fs-3 d-flex flex-start">
                        <?php echo "Welcome " . $_SESSION['username'];?><?php echo "!"?>
                      </div>
                      <div class="col-md-6"></div>
                      <div class="col-md-3 d-flex justify-content-end">
                        <div class="dropdown">
                          <button class="btn btn-secondary dropdown-toggle rounded d-inline-flex profile-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="col-md-3 rounded-2">
                              <ion-icon name="person-outline" role="img" class="md hydrated" aria-label="person outline"></ion-icon>
                          </div>
                            Administrator
                          </button>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="cards d-inline-flex flex-wrap">
                    <div class="col-md-4">
                      <div class="card-body d-flex justify-content-center align-items-center flex-row">
                        <div class="col-md-3 card-icon rounded-2">
                          <i class="fas fa-copyright"></i>
                        </div>
                        <div class="col-md-9 card-title my-0">
                          <span class="fs-5">Available Cars</span>
                          <h2>8</h2>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card-body d-flex justify-content-center align-items-center flex-row">
                        <div class="col-md-3 card-icon rounded-2">
                          <i class="fas fa-copyright"></i>
                        </div>
                        <div class="col-md-9 card-title my-0">
                          <span class="fs-5">Available Cars</span>
                          <h2>8</h2>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card-body d-flex justify-content-center align-items-center flex-row">
                        <div class="col-md-3 card-icon rounded-2">
                          <i class="fas fa-copyright"></i>
                        </div>
                        <div class="col-md-9 card-title my-0">
                          <span class="fs-5">Available Cars</span>
                          <h2>8</h2>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card-body d-flex justify-content-center align-items-center flex-row">
                        <div class="col-md-3 card-icon rounded-2">
                          <i class="fas fa-copyright"></i>
                        </div>
                        <div class="col-md-9 card-title my-0">
                          <span class="fs-5">Available Cars</span>
                          <h2>8</h2>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card-body d-flex justify-content-center align-items-center flex-row">
                        <div class="col-md-3 card-icon rounded-2">
                          <i class="fas fa-copyright"></i>
                        </div>
                        <div class="col-md-9 card-title my-0">
                          <span class="fs-5">Available Cars</span>
                          <h2>8</h2>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card-body d-flex justify-content-center align-items-center flex-row">
                        <div class="col-md-3 card-icon rounded-2">
                          <i class="fas fa-copyright"></i>
                        </div>
                        <div class="col-md-9 card-title my-0">
                          <span class="fs-5">Available Cars</span>
                          <h2>8</h2>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card-body d-flex justify-content-center align-items-center flex-row">
                        <div class="col-md-3 card-icon rounded-2">
                          <i class="fas fa-copyright"></i>
                        </div>
                        <div class="col-md-9 card-title my-0">
                          <span class="fs-5">Available Cars</span>
                          <h2>8</h2>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card-body d-flex justify-content-center align-items-center flex-row">
                        <div class="col-md-3 card-icon rounded-2">
                          <i class="fas fa-copyright"></i>
                        </div>
                        <div class="col-md-9 card-title my-0">
                          <span class="fs-5">Available Cars</span>
                          <h2>8</h2>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card-body d-flex justify-content-center align-items-center flex-row">
                        <div class="col-md-3 card-icon rounded-2">
                          <i class="fas fa-copyright"></i>
                        </div>
                        <div class="col-md-9 card-title my-0">
                          <span class="fs-5">Available Cars</span>
                          <h2>8</h2>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </article>
    </main>

    <!-- 
    - #FOOTER
  -->

    <!-- <footer class="footer">
      <div class="container">
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
    </footer> -->

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
