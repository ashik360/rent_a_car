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
        <!-- 
        - #HERO
      -->



       <!-- 
        - #FEATURED CAR
      -->

      <section style="margin-top: 6vh;" class="section new-arrival featured-car" id="featured-car">
        <div class="container">
          <div class="title-wrapper">
            <h2 class="h2 section-title">New Arrival !!</h2>

            <a style="display: flex; justify-content: center; align-items: center;" href="#" class="btn user-btn" aria-label="Profile">
              <h4 style="margin-bottom: -4px;">6</h4>
            </a>
          </div>

          <div class="cards">
            <div class="cards-slide">
                <ul class="featured-car-list d-flex">
                    <li>
                        <div class="featured-car-card">
                            <figure class="card-banner my-0">
                                <div class="card-wrapper">
                                    <div class="card-content">
                                        <h2 class="card-title">Toyota RAV4 2021</h2>
                                        <p class="card-seats">Seats: 5</p>
                                        <div class="card-buttons">
                                            <button class="btn book-now">Book Now</button>
                                            <button class="btn fav-btn">
                                                <ion-icon name="heart-outline"></ion-icon>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <img
                                    src="./assets/images/car-1.jpg"
                                    alt="Toyota RAV4 2021"
                                    loading="lazy"
                                    width="440"
                                    height="300"
                                    class="w-100"
                                />
                            </figure>
                        </div>
                    </li>
                    <!-- Repeating other cards similarly -->
                    <li>
                        <div class="featured-car-card">
                            <figure class="card-banner my-0">
                                <div class="card-wrapper">
                                    <div class="card-content">
                                        <h2 class="card-title">Toyota RAV4 2021</h2>
                                        <p class="card-seats">Seats: 5</p>
                                        <div class="card-buttons">
                                            <button class="btn book-now">Book Now</button>
                                            <button class="btn fav-btn">
                                                <ion-icon name="heart-outline"></ion-icon>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <img
                                    src="./assets/images/car-1.jpg"
                                    alt="Toyota RAV4 2021"
                                    loading="lazy"
                                    width="440"
                                    height="300"
                                    class="w-100"
                                />
                            </figure>
                        </div>
                    </li>
                    <li>
                        <div class="featured-car-card">
                            <figure class="card-banner my-0">
                                <div class="card-wrapper">
                                    <div class="card-content">
                                        <h2 class="card-title">Toyota RAV4 2021</h2>
                                        <p class="card-seats">Seats: 5</p>
                                        <div class="card-buttons">
                                            <button class="btn book-now">Book Now</button>
                                            <button class="btn fav-btn">
                                                <ion-icon name="heart-outline"></ion-icon>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <img
                                    src="./assets/images/car-1.jpg"
                                    alt="Toyota RAV4 2021"
                                    loading="lazy"
                                    width="440"
                                    height="300"
                                    class="w-100"
                                />
                            </figure>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- Repeat -->
            <div class="cards-slide">
                <ul class="featured-car-list d-flex">
                    <li>
                        <div class="featured-car-card">
                            <figure class="card-banner my-0">
                                <div class="card-wrapper">
                                    <div class="card-content">
                                        <h2 class="card-title">Toyota RAV4 2021</h2>
                                        <p class="card-seats">Seats: 5</p>
                                        <div class="card-buttons">
                                            <button class="btn book-now">Book Now</button>
                                            <button class="btn fav-btn">
                                                <ion-icon name="heart-outline"></ion-icon>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <img
                                    src="./assets/images/car-1.jpg"
                                    alt="Toyota RAV4 2021"
                                    loading="lazy"
                                    width="440"
                                    height="300"
                                    class="w-100"
                                />
                            </figure>
                        </div>
                    </li>
                    <!-- Repeating other cards similarly -->
                    <li>
                        <div class="featured-car-card">
                            <figure class="card-banner my-0">
                                <div class="card-wrapper">
                                    <div class="card-content">
                                        <h2 class="card-title">Toyota RAV4 2021</h2>
                                        <p class="card-seats">Seats: 5</p>
                                        <div class="card-buttons">
                                            <button class="btn book-now">Book Now</button>
                                            <button class="btn fav-btn">
                                                <ion-icon name="heart-outline"></ion-icon>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <img
                                    src="./assets/images/car-1.jpg"
                                    alt="Toyota RAV4 2021"
                                    loading="lazy"
                                    width="440"
                                    height="300"
                                    class="w-100"
                                />
                            </figure>
                        </div>
                    </li>
                    <li>
                        <div class="featured-car-card">
                            <figure class="card-banner my-0">
                                <div class="card-wrapper">
                                    <div class="card-content">
                                        <h2 class="card-title">Toyota RAV4 2021</h2>
                                        <p class="card-seats">Seats: 5</p>
                                        <div class="card-buttons">
                                            <button class="btn book-now">Book Now</button>
                                            <button class="btn fav-btn">
                                                <ion-icon name="heart-outline"></ion-icon>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <img
                                    src="./assets/images/car-1.jpg"
                                    alt="Toyota RAV4 2021"
                                    loading="lazy"
                                    width="440"
                                    height="300"
                                    class="w-100"
                                />
                            </figure>
                        </div>
                    </li>
                </ul>
            </div>
          </div>
        </div>
      </section>

      </article>
    </main>

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
