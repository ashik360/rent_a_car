<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rent Your Favourite Car</title>

    <?php include "dependency/dependency_top.php" ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <style>
        .demo {
            background: #f8f8f8;
        }

        .testimonial {
            margin: 0 20px 40px;
        }

        .testimonial .testimonial-content {
            padding: 35px 25px 35px 50px;
            margin-bottom: 35px;
            background: #fff;
            border: 1px solid #f0f0f0;
            position: relative;
        }

        .testimonial .testimonial-content:after {
            content: "";
            display: inline-block;
            width: 20px;
            height: 20px;
            background: #fff;
            position: absolute;
            bottom: -10px;
            left: 22px;
            transform: rotate(45deg);
        }

        .testimonial-content .testimonial-icon {
            width: 50px;
            height: 45px;
            background: hsl(204, 91%, 53%);
            text-align: center;
            font-size: 22px;
            color: #fff;
            line-height: 42px;
            position: absolute;
            top: 37px;
            left: -19px;
        }

        .testimonial-content .testimonial-icon:before {
            content: "";
            border-bottom: 16px solid hsl(204, 91%, 53%);
            ;
            border-left: 18px solid transparent;
            position: absolute;
            top: -16px;
            left: 1px;
        }

        .testimonial .description {
            font-size: 15px;
            font-style: italic;
            color: #8a8a8a;
            line-height: 23px;
            margin: 0;
        }

        .testimonial .title {
            display: block;
            font-size: 18px;
            font-weight: 700;
            color: #525252;
            text-transform: capitalize;
            letter-spacing: 1px;
            margin: 0 0 5px 0;
        }

        .testimonial .post {
            display: block;
            font-size: 14px;
            color: hsl(204, 91%, 53%);
        }

        .owl-theme .owl-controls {
            margin-top: 20px;
        }

        .owl-theme .owl-controls .owl-page span {
            background: #ccc;
            opacity: 1;
            transition: all 0.4s ease 0s;
        }

        .owl-theme .owl-controls .owl-page.active span,
        .owl-theme .owl-controls.clickable .owl-page:hover span {
            background: #ff4242;
        }

        .profile-pic {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .testimonial-profile {
            display: flex;
            align-items: center;
            margin-top: 15px;
        }

        .testimonial .title,
        .testimonial .post {
            margin-left: 10px;
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
                        <a href="#home" class="navbar-link" data-nav-link>Home</a>
                    </li>

                    <li>
                        <a href="#featured-car" class="navbar-link" data-nav-link>Explore cars</a>
                    </li>

                    <li>
                        <a href="about_us.php" class="navbar-link" data-nav-link>About us</a>
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
  

            <!-- 
        - #Testimonial
      -->

            <!-- 
        - #BLOG
      -->

            <section class="section blog mt" id="blog">
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
                                        <img src="./assets/images/blog-4.jpg" alt="What�s required when renting a car?"
                                            loading="lazy" class="w-100" />
                                    </a>

                                    <a href="#" class="btn card-badge">Cars</a>
                                </figure>

                                <div class="card-content">
                                    <h3 class="h3 card-title">
                                        <a href="#">What�s required when renting a car?</a>
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
                    <li>
                        <a href="driver_login.php" class="footer-link">Driver Login</a>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#testimonial-slider").owlCarousel({
                loop: true,
                margin: 10,
                nav: false,  // Navigation arrows are hidden based on your configuration
                pagination: true,  // Show pagination dots
                slideSpeed: 1000,  // Slide transition speed
                autoplay: true,  // Enable autoplay
                autoplayTimeout: 5000,  // Autoplay interval (in milliseconds)
                autoplayHoverPause: true,  // Pause autoplay on hover
                responsive: {
                    0: {
                        items: 1
                    },
                    650: {
                        items: 1  // Custom for mobile
                    },
                    768: {
                        items: 2  // Custom for tablet
                    },
                    980: {
                        items: 2  // Custom for small desktop
                    },
                    1000: {
                        items: 3  // Custom for large desktop
                    }
                }
            });
        });


    </script>


    <?php include 'dependency/dependency_bottom.php' ?>
</body>

</html>