<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rent Your Favourite Car</title>

    <?php include "dependency/dependency_top.php" ?>
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
                        <a href="#home" class="navbar-link" data-nav-link>Home</a>
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

                <a href="otp_form.php" class="btn user-btn" aria-label="Profile">
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

            <section class="section hero" id="home">
                <div class="container">
                    <div class="hero-content">
                        <h2 class="h1 hero-title">The easy way to take-a Car rental</h2>

                        <p class="hero-text">
                            Drive Your Dreams with Our Reliable Rentals
                        </p>
                    </div>

                    <div class="hero-banner">
                        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel"
                            data-bs-interval="2000">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="bannerImg-fix" src="assets/images/hero-banner.jpg" class="d-block w-100"
                                        alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img class="bannerImg-fix" src="assets/images/car-2.jpg" class="d-block w-100"
                                        alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img class="bannerImg-fix" src="assets/images/car-5.jpg" class="d-block w-100"
                                        alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img class="bannerImg-fix" src="assets/images/car-6.jpg" class="d-block w-100"
                                        alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>


                    <form action="" class="hero-form">
                        <div class="input-wrapper">
                            <label for="input-1" class="input-label">From</label>

                            <input type="text" name="from" class="form-control" id="inputFromCity" list="cities"
                                placeholder="Dhaka" required>
                            <datalist id="cities">
                                <option value="Dhaka">
                                <option value="Chattogram">
                                <option value="Sylhet">
                                <option value="Khulna">
                                <option value="Rajshahi">
                                <option value="Dinajpur">
                                <option value="Mirzapur">
                                <option value="Mymensingh">
                                <option value="Narayanganj">
                                <option value="Gazipur">
                                <option value="Gopalganj">
                                <option value="Tangail">
                                <option value="Bhairab Bazar">
                                <option value="Faridpur">
                                <option value="Chittagong">
                                <option value="Cumilla">
                                <option value="Brahmanbaria">
                                <option value="Feni">
                                <option value="Chandpur">
                                <option value="Laksam">
                                <option value="Akhaura">
                                <option value="Nabinagar">
                            </datalist>
                        </div>

                        <div class="input-wrapper">
                            <label for="input-2" class="input-label">To</label>

                            <input type="text" name="from" class="form-control" id="inputFromCity" list="cities"
                                placeholder="Gazipur" required>
                            <datalist id="cities">
                                <option value="Dhaka">
                                <option value="Chattogram">
                                <option value="Sylhet">
                                <option value="Khulna">
                                <option value="Rajshahi">
                                <option value="Dinajpur">
                                <option value="Mirzapur">
                                <option value="Mymensingh">
                                <option value="Narayanganj">
                                <option value="Gazipur">
                                <option value="Gopalganj">
                                <option value="Tangail">
                                <option value="Bhairab Bazar">
                                <option value="Faridpur">
                                <option value="Chittagong">
                                <option value="Cumilla">
                                <option value="Brahmanbaria">
                                <option value="Feni">
                                <option value="Chandpur">
                                <option value="Laksam">
                                <option value="Akhaura">
                                <option value="Nabinagar">
                            </datalist>
                        </div>

                        <div class="input-wrapper">
                            <label for="input-3" class="input-label">Time/Hours</label>

                            <input type="text" name="from" class="form-control" id="inputFromCity" list="time-days"
                                placeholder="10" required>
                            <datalist id="time-days">
                                <option value="1">
                                <option value="2">
                                <option value="3">
                                <option value="4">
                                <option value="5">
                                <option value="6">
                                <option value="7">
                            </datalist>
                        </div>
                        <div class="input-wrapper">
                            <label for="input-1" class="input-label">From</label>

                            <input type="text" name="from" class="form-control" id="inputFromCity" list="cities"
                                placeholder="Dhaka" required>
                            <datalist id="cities">
                                <option value="Dhaka">
                                <option value="Chattogram">
                                <option value="Sylhet">
                                <option value="Khulna">
                                <option value="Rajshahi">
                                <option value="Dinajpur">
                                <option value="Mirzapur">
                                <option value="Mymensingh">
                                <option value="Narayanganj">
                                <option value="Gazipur">
                                <option value="Gopalganj">
                                <option value="Tangail">
                                <option value="Bhairab Bazar">
                                <option value="Faridpur">
                                <option value="Chittagong">
                                <option value="Cumilla">
                                <option value="Brahmanbaria">
                                <option value="Feni">
                                <option value="Chandpur">
                                <option value="Laksam">
                                <option value="Akhaura">
                                <option value="Nabinagar">
                            </datalist>
                        </div>

                        <div class="input-wrapper">
                            <label for="input-2" class="input-label">To</label>

                            <input type="text" name="from" class="form-control" id="inputFromCity" list="cities"
                                placeholder="Gazipur" required>
                            <datalist id="cities">
                                <option value="Dhaka">
                                <option value="Chattogram">
                                <option value="Sylhet">
                                <option value="Khulna">
                                <option value="Rajshahi">
                                <option value="Dinajpur">
                                <option value="Mirzapur">
                                <option value="Mymensingh">
                                <option value="Narayanganj">
                                <option value="Gazipur">
                                <option value="Gopalganj">
                                <option value="Tangail">
                                <option value="Bhairab Bazar">
                                <option value="Faridpur">
                                <option value="Chittagong">
                                <option value="Cumilla">
                                <option value="Brahmanbaria">
                                <option value="Feni">
                                <option value="Chandpur">
                                <option value="Laksam">
                                <option value="Akhaura">
                                <option value="Nabinagar">
                            </datalist>
                        </div>

                        <div class="input-wrapper">
                            <label for="input-3" class="input-label">Time/Days</label>

                            <input type="text" name="from" class="form-control" id="inputFromCity" list="time-days"
                                placeholder="10" required>
                            <datalist id="time-days">
                                <option value="1">
                                <option value="2">
                                <option value="3">
                                <option value="4">
                                <option value="5">
                                <option value="6">
                                <option value="7">
                            </datalist>
                        </div>

                        <button type="submit" class="btn">Search</button>
                    </form>
                </div>
            </section>

            <!-- 
        - #FEATURED CAR
      -->
            <?php
            // Database connection
            $conn = new mysqli("localhost", "root", "", "rent_car");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM car_list";
            $result = $conn->query($sql);
            ?>

            <section class="section featured-car" id="featured-car">
                <div class="container">
                    <div class="title-wrapper">
                        <h2 class="h2 section-title">Featured cars</h2>

                        <a href="explore.php" class="featured-car-link">
                            <span>View more</span>
                            <ion-icon name="arrow-forward-outline"></ion-icon>
                        </a>
                    </div>

                    <ul class="featured-car-list">
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <li>
                                    <div class="featured-car-card">
                                        <figure class="card-banner">
                                            <!-- Replace with dynamic image source -->
                                            <img src="<?php echo $row['image_path']; ?>" alt="<?php echo $row['car_model']; ?>"
                                                loading="lazy" width="440" height="300" class="w-100" />
                                        </figure>

                                        <div style="align-items: normal" class="card-content">
                                            <div class="card-title-wrapper">
                                                <h3 class="h3 card-title">
                                                    <a href="#"><?php echo $row['car_model']; ?></a>
                                                </h3>
                                                <data class="year"
                                                    value="<?php echo $row['car_year']; ?>"><?php echo $row['car_year']; ?></data>
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
                                                    <span class="card-item-text"><?php echo $row['car_kmpl']; ?> km /
                                                        1-litre</span>
                                                </li>

                                                <li class="card-list-item">
                                                    <ion-icon name="hardware-chip-outline"></ion-icon>

                                                    <span class="card-item-text">Automatic</span>
                                                </li>
                                            </ul>

                                            <div class="card-price-wrapper">
                                                <p class="card-price"><strong>9000 <i
                                                            class="fa-solid fa-bangladeshi-taka-sign"></i></strong>/ Hour
                                                </p>

                                                <button class="btn fav-btn" aria-label="Add to favourite list">
                                                    <ion-icon name="heart-outline"></ion-icon>
                                                </button>

                                                <button class="btn">
                                                    <a href="entryform.php?car_id=<?php echo $row['id']; ?>"
                                                        style="text-decoration:none; color:white;">Rent now</a>
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
            <!-- 
        - #GET START
      -->

            <section class="section get-start">
                <div class="container">
                    <h2 class="h2 section-title">Get started with 4 simple steps</h2>

                    <ul class="get-start-list">
                        <li>
                            <div class="get-start-card">
                                <div class="card-icon icon-1">
                                    <ion-icon name="person-add-outline"></ion-icon>
                                </div>

                                <h3 class="card-title">Create a profile</h3>

                                <p class="card-text">
                                    If you are going to use a passage of Lorem Ipsum, you need
                                    to be sure.
                                </p>

                                <a href="#" class="card-link">Get started</a>
                            </div>
                        </li>

                        <li>
                            <div class="get-start-card">
                                <div class="card-icon icon-2">
                                    <ion-icon name="car-outline"></ion-icon>
                                </div>

                                <h3 class="card-title">Tell us what car you want</h3>

                                <p class="card-text">
                                    Various versions have evolved over the years, sometimes by
                                    accident, sometimes on purpose
                                </p>
                            </div>
                        </li>

                        <li>
                            <div class="get-start-card">
                                <div class="card-icon icon-3">
                                    <ion-icon name="person-outline"></ion-icon>
                                </div>

                                <h3 class="card-title">Match with seller</h3>

                                <p class="card-text">
                                    It to make a type specimen book. It has survived not only
                                    five centuries, but also the leap into electronic
                                </p>
                            </div>
                        </li>

                        <li>
                            <div class="get-start-card">
                                <div class="card-icon icon-4">
                                    <ion-icon name="card-outline"></ion-icon>
                                </div>

                                <h3 class="card-title">Make a deal</h3>

                                <p class="card-text">
                                    There are many variations of passages of Lorem available,
                                    but the majority have suffered alteration
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </section>

            <!-- 
        - #BLOG
      -->

            <section class="section blog" id="blog">
                <div class="container">
                    <h2 class="h2 section-title">Our Blog</h2>

                    <ul class="blog-list has-scrollbar">
                        <li>
                            <div class="blog-card">
                                <figure class="card-banner">
                                    <a href="#">
                                        <img src="./assets/images/blog-1.jpg"
                                            alt="Opening of new offices of the company" loading="lazy" class="w-100" />
                                    </a>

                                    <a href="#" class="btn card-badge">Company</a>
                                </figure>

                                <div class="card-content">
                                    <h3 class="h3 card-title">
                                        <a href="#">Opening of new offices of the company</a>
                                    </h3>

                                    <div class="card-meta">
                                        <div class="publish-date">
                                            <ion-icon name="time-outline"></ion-icon>

                                            <time datetime="2022-01-14">January 14, 2022</time>
                                        </div>

                                        <div class="comments">
                                            <ion-icon name="chatbubble-ellipses-outline"></ion-icon>

                                            <data value="114">114</data>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="blog-card">
                                <figure class="card-banner">
                                    <a href="#">
                                        <img src="./assets/images/blog-2.jpg" alt="What cars are most vulnerable"
                                            loading="lazy" class="w-100" />
                                    </a>

                                    <a href="#" class="btn card-badge">Repair</a>
                                </figure>

                                <div class="card-content">
                                    <h3 class="h3 card-title">
                                        <a href="#">What cars are most vulnerable</a>
                                    </h3>

                                    <div class="card-meta">
                                        <div class="publish-date">
                                            <ion-icon name="time-outline"></ion-icon>

                                            <time datetime="2022-01-14">January 14, 2022</time>
                                        </div>

                                        <div class="comments">
                                            <ion-icon name="chatbubble-ellipses-outline"></ion-icon>

                                            <data value="114">114</data>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="blog-card">
                                <figure class="card-banner">
                                    <a href="#">
                                        <img src="./assets/images/blog-3.jpg" alt="Statistics showed which average age"
                                            loading="lazy" class="w-100" />
                                    </a>

                                    <a href="#" class="btn card-badge">Cars</a>
                                </figure>

                                <div class="card-content">
                                    <h3 class="h3 card-title">
                                        <a href="#">Statistics showed which average age</a>
                                    </h3>

                                    <div class="card-meta">
                                        <div class="publish-date">
                                            <ion-icon name="time-outline"></ion-icon>

                                            <time datetime="2022-01-14">January 14, 2022</time>
                                        </div>

                                        <div class="comments">
                                            <ion-icon name="chatbubble-ellipses-outline"></ion-icon>

                                            <data value="114">114</data>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="blog-card">
                                <figure class="card-banner">
                                    <a href="#">
                                        <img src="./assets/images/blog-4.jpg" alt="What´s required when renting a car?"
                                            loading="lazy" class="w-100" />
                                    </a>

                                    <a href="#" class="btn card-badge">Cars</a>
                                </figure>

                                <div class="card-content">
                                    <h3 class="h3 card-title">
                                        <a href="#">What´s required when renting a car?</a>
                                    </h3>

                                    <div class="card-meta">
                                        <div class="publish-date">
                                            <ion-icon name="time-outline"></ion-icon>

                                            <time datetime="2022-01-14">January 14, 2022</time>
                                        </div>

                                        <div class="comments">
                                            <ion-icon name="chatbubble-ellipses-outline"></ion-icon>

                                            <data value="114">114</data>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="blog-card">
                                <figure class="card-banner">
                                    <a href="#">
                                        <img src="./assets/images/blog-5.jpg" alt="New rules for handling our cars"
                                            loading="lazy" class="w-100" />
                                    </a>

                                    <a href="#" class="btn card-badge">Company</a>
                                </figure>

                                <div class="card-content">
                                    <h3 class="h3 card-title">
                                        <a href="#">New rules for handling our cars</a>
                                    </h3>

                                    <div class="card-meta">
                                        <div class="publish-date">
                                            <ion-icon name="time-outline"></ion-icon>

                                            <time datetime="2022-01-14">January 14, 2022</time>
                                        </div>

                                        <div class="comments">
                                            <ion-icon name="chatbubble-ellipses-outline"></ion-icon>

                                            <data value="114">114</data>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
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
                        <a href="#" class="footer-link">Our blog</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">Contacts</a>
                    </li>

                    <li>
                        <a href="login1.php" class="footer-link">Login</a>
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

    <?php include 'dependency/dependency_bottom.php' ?>
</body>

</html>