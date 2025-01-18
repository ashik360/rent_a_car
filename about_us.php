<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - CarDeal</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your custom styles if needed -->
    <style>
        .container {
            display: flex;
            /* Apply flexbox layout */
            justify-content: space-between;
            /* Distribute space between elements */
            align-items: center;
            /* Vertically align items */
            padding: 20px;
            /* Adjust padding as needed */
        }

        .navbar {
            flex-grow: 1;
            /* Make the navbar take up available space */
            display: flex;
            justify-content: center;
            /* Center the navbar items */
        }

        .navbar-list {
            display: flex;
            /* Make the navbar items horizontal */
            gap: 20px;
            /* Space between the menu items */
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .header-actions {
            display: flex;
            /* Align buttons and contact info in a row */
            align-items: center;
            /* Vertically align items */
            gap: 20px;
            /* Space between buttons */
        }

        .logo img {
            max-width: 150px;
            /* Adjust the size of the logo */
        }

        .header-contact {
            display: flex;
            flex-direction: column;
            /* Stack contact info vertically */
            align-items: flex-start;
            /* Align items to the left */
        }

        .header-contact .contact-link {
            font-size: 16px;
            font-weight: bold;
        }

        .header-contact .contact-time {
            font-size: 12px;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #e55039;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        header h1 {
            font-size: 36px;
        }

        .container {
            padding: 40px;
            text-align: center;
        }

        .section {
            margin: 40px 0;
        }

        .section h2 {
            font-size: 28px;
            color: #333;
        }

        .section p {
            font-size: 18px;
            color: #555;
            line-height: 1.6;
            max-width: 800px;
            margin: 0 auto;
        }

        .team {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 40px;
        }

        .team-member {
            width: 200px;
            text-align: center;
        }

        .team-member img {
            width: 100%;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        footer {
            background-color: #333;
            color: white;
            padding: 10px 0;
            text-align: center;
        }

        a {
            color: #e55039;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <section class="head">
        <div class="container d-flex">
            <div class="overlay" data-overlay></div>

            <div>
                <a href="#" class="logo">
                    <img src="./assets/images/logo.png" alt="logo" />
                </a>
            </div>

            <div>
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
            </div>

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
    </section>
    <!-- Header Section -->
    <header>
        <h1>About CarDeal</h1>
    </header>

    <!-- Main Content Section -->
    <div class="container">
        <section class="section">
            <h2>Who We Are</h2>
            <p>CarDeal is a leading online platform for buying and selling cars. Our goal is to make car shopping easy,
                transparent, and hassle-free for everyone. Whether you're looking for a brand-new car or a pre-owned
                vehicle, we have a wide selection to choose from, along with detailed information to help you make an
                informed decision.</p>
        </section>

        <section class="section">
            <h2>Our Mission</h2>
            <p>Our mission is to revolutionize the car buying experience by offering a streamlined process that connects
                buyers with the right car at the right price. We aim to provide high-quality customer service, reliable
                vehicles, and a user-friendly website to make the car buying process as smooth as possible.</p>
        </section>

        <section class="section">
            <h2>Meet The Team</h2>
            <div class="team">
                <div class="team-member">
                    <img src="assets/images/user-icon.png" alt="shuvo">
                    <h3>Md. Asik Ahmed Shuvo</h3>
                    <p>CEO & Founder</p>
                </div>
            </div>
        </section>
    </div>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2024 CarDeal @ashik360 | All rights reserved.</p>
        <p>Visit our <a href="contact.php">Contact Us</a> page for more information.</p>
    </footer>

</body>

</html>