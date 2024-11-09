<?php
require 'connection.php';

// Retrieve search parameters from the form submission
$from_city = $_GET['from_city'];
$to_city = $_GET['to_city'];
$date_from = $_GET['date_from'];
$date_to = $_GET['date_to'];

// Format the date inputs for SQL
$date_from = date('Y-m-d H:i:s', strtotime($date_from));
$date_to = date('Y-m-d H:i:s', strtotime($date_to));

// SQL query to select cars not already booked for the specified dates
$sql = "
    SELECT * 
    FROM car_list c
    WHERE NOT EXISTS (
        SELECT 1 
        FROM bookings b
        WHERE b.car_id = c.id 
        AND (
            (b.pickup_date <= '$date_to' AND b.return_date >= '$date_from')
        )
    )
";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Available Cars</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml" />

    <!-- Bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="./assets/css/style.css" />

    <!-- Google Font link -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&family=Open+Sans&display=swap"
        rel="stylesheet" />
</head>

<body>

    <!-- Header Section -->
    <header class="header" data-header>
        <div class="container">
            <div class="overlay" data-overlay></div>

            <a href="#" class="logo">
                <img src="./assets/images/logo.png" alt="logo" />
            </a>

            <nav class="navbar" data-navbar>
                <ul class="navbar-list">
                    <li><a href="index.php" class="navbar-link" data-nav-link>Home</a></li>
                    <li><a href="#featured-car" class="navbar-link" data-nav-link>Explore cars</a></li>
                    <li><a href="#" class="navbar-link" data-nav-link>About us</a></li>
                    <li><a href="#blog" class="navbar-link" data-nav-link>Blog</a></li>
                </ul>
            </nav>

            <div class="header-actions">
                <a href="#featured-car" class="btn" aria-labelledby="aria-label-txt">
                    <ion-icon name="car-outline"></ion-icon>
                    <span id="aria-label-txt">Explore cars</span>
                </a>
                <a href="#" class="btn user-btn" aria-label="Profile">
                    <ion-icon name="person-outline"></ion-icon>
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <article>
            <!-- Featured Car Section -->
            <section class="section new-arrival featured-car" id="featured-car">
                <div class="container">
                    <div class="title-wrapper">
                        <h2 class="h2 section-title">Available Cars</h2>
                    </div>

                    <ul class="featured-car-list">
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <li>
                                    <div class="featured-car-card">
                                        <figure class="card-banner">
                                            <!-- Display car image dynamically -->
                                            <img src="<?php echo $row['image_path']; ?>" alt="<?php echo $row['car_model']; ?>"
                                                loading="lazy" width="440" height="300" class="w-100" />
                                        </figure>

                                        <div class="card-content">
                                            <div class="card-title-wrapper">
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
                                                <p class="card-price"><strong><?php echo $row['costs']; ?> <i class="fa-solid fa-bangladeshi-taka-sign"></i></strong>/Hour
                                                </p>

                                                <button class="btn fav-btn" aria-label="Add to favourite list">
                                                    <ion-icon name="heart-outline"></ion-icon>
                                                </button>

                                                <button class="btn">Rent now</button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php
                            }
                        } else {
                            echo "<p>No cars available for the selected dates.</p>";
                        }
                        ?>
                    </ul>
                </div>
            </section>
        </article>
    </main>

    <!-- Footer Section -->
    <footer class="footer">
        <div class="container">
            <div class="footer-top">
                <div class="footer-brand">
                    <a href="#" class="logo">
                        <img src="./assets/images/logo.png" alt="logo" />
                    </a>
                    <p class="footer-text">
                        Search for cheap rental cars in Dhaka. With a diverse fleet of 19,000 vehicles, Waydex offers its consumers an attractive and fun selection.
                    </p>
                </div>

                <ul class="footer-list">
                    <li><p class="footer-list-title">Company</p></li>
                    <li><a href="#" class="footer-link">About us</a></li>
                    <li><a href="#" class="footer-link">Pricing plans</a></li>
                    <li><a href="#" class="footer-link">Our blog</a></li>
                    <li><a href="#" class="footer-link">Contacts</a></li>
                </ul>

                <ul class="footer-list">
                    <li><p class="footer-list-title">Support</p></li>
                    <li><a href="#" class="footer-link">Help center</a></li>
                    <li><a href="#" class="footer-link">Ask a question</a></li>
                </ul>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/ionicons@6.0.0/dist/ionicons/ionicons.esm.js" type="module"></script>
    <script src="https://cdn.jsdelivr.net/npm/ionicons@6.0.0/dist/ionicons/ionicons.js"></script>

</body>

</html>

<?php
$conn->close();
?>
