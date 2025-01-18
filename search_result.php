<?php
session_start();
require 'connection.php';

// Retrieve search parameters from the form submission
$from_city = $_GET['from_city'];
$to_city = $_GET['to_city'];
$date_from = $_GET['date_from'];
$date_to = $_GET['date_to'];

// Store search parameters in session to retain data for entryform.php
$_SESSION['search_data'] = [
    'from_city' => $from_city,
    'to_city' => $to_city,
    'date_from' => $date_from,
    'date_to' => $date_to
];

// Format the date inputs for SQL
$date_from = date('Y-m-d H:i:s', strtotime($date_from));
$date_to = date('Y-m-d H:i:s', strtotime($date_to));

// Initialize filter variables
$max_people = isset($_GET['max_people']) ? (int)$_GET['max_people'] : null;
$status = isset($_GET['status']) ? $_GET['status'] : null;
$car_type = isset($_GET['car_type']) ? $_GET['car_type'] : null;
$car_year = isset($_GET['car_year']) ? (int)$_GET['car_year'] : null;

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

// Apply additional filters
if (!is_null($status) && $status === 'available') {
    $sql .= " AND c.status = 'available'";
}
if (!is_null($max_people)) {
    $sql .= " AND c.max_people >= $max_people";
}
if (!is_null($car_type)) {
    $sql .= " AND c.car_type = '$car_type'";
}
if (!is_null($car_year)) {
    $sql .= " AND c.car_year = $car_year";
}

$result = $conn->query($sql);

// Query for the suggested section
$suggested_sql = "SELECT * FROM car_list WHERE status = 'available'";
$suggested_result = $conn->query($suggested_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Cars</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
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

    <!-- Filter Section -->
    <div class="container mt-6">
        <form method="GET" action="search_result.php" class="row g-3">
            <input type="hidden" name="from_city" value="<?php echo htmlspecialchars($from_city); ?>">
            <input type="hidden" name="to_city" value="<?php echo htmlspecialchars($to_city); ?>">
            <input type="hidden" name="date_from" value="<?php echo htmlspecialchars($date_from); ?>">
            <input type="hidden" name="date_to" value="<?php echo htmlspecialchars($date_to); ?>">

            <div class="col-md-3">
                <label for="max_people" class="form-label">Max People</label>
                <input type="number" name="max_people" id="max_people" class="form-control" placeholder="Enter max people" value="<?php echo htmlspecialchars($max_people); ?>">
            </div>

            <div class="col-md-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-select">
                    <option value="">All</option>
                    <option value="available" <?php echo $status === 'available' ? 'selected' : ''; ?>>Available</option>
                </select>
            </div>

            <div class="col-md-3">
                <label for="car_type" class="form-label">Car Type</label>
                <select name="car_type" id="car_type" class="form-select">
                    <option value="">All</option>
                    <option value="1" <?php echo $car_type === '1' ? 'selected' : ''; ?>>Category 1</option>
                    <option value="2" <?php echo $car_type === '2' ? 'selected' : ''; ?>>Category 2</option>
                </select>
            </div>

            <div class="col-md-3">
                <label for="car_year" class="form-label">Car Year</label>
                <select name="car_year" id="car_year" class="form-select">
                    <option value="">All</option>
                    <?php for ($year = 2020; $year <= 2024; $year++): ?>
                        <option value="<?php echo $year; ?>" <?php echo $car_year == $year ? 'selected' : ''; ?>><?php echo $year; ?></option>
                    <?php endfor; ?>
                </select>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary w-100">Apply Filters</button>
            </div>
        </form>
    </div>

    <!-- Main Content -->
    <main>
        <article>
            <section class="section featured-car">
                <div class="container">
                    <h2 class="section-title">Available Cars</h2>
                    <ul class="featured-car-list">
                        <?php if ($result->num_rows > 0): ?>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <li>
                                    <div class="featured-car-card">
                                        <figure class="card-banner">
                                            <img src="<?php echo $row['image_path']; ?>" alt="<?php echo $row['car_model']; ?>" class="w-100">
                                        </figure>
                                        <div class="card-content">
                                            <h3 class="card-title"><?php echo $row['car_model']; ?></h3>
                                            <ul class="card-list">
                                                <li><?php echo $row['max_people']; ?> People</li>
                                                <li><?php echo $row['car_type']; ?></li>
                                                <li><?php echo $row['car_kmpl']; ?> km / litre</li>
                                            </ul>
                                            <p class="card-price"><strong><?php echo $row['costs']; ?> / Hour</strong></p>
                                            <a href="entryform.php?car_id=<?php echo $row['id']; ?>" class="btn">Rent now</a>
                                        </div>
                                    </div>
                                </li>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <p>No cars available for the selected filters.</p>
                        <?php endif; ?>
                    </ul>
                </div>
            </section>

            <!-- Suggested Section -->
            <section class="section suggested-car">
                <div class="container">
                    <h2 class="section-title">Suggested Cars</h2>
                    <ul class="featured-car-list">
                        <?php if ($suggested_result->num_rows > 0): ?>
                            <?php while ($row = $suggested_result->fetch_assoc()): ?>
                                <li>
                                    <div class="featured-car-card">
                                        <figure class="card-banner">
                                            <img src="<?php echo $row['image_path']; ?>" alt="<?php echo $row['car_model']; ?>" class="w-100">
                                        </figure>
                                        <div class="card-content">
                                            <h3 class="card-title"><?php echo $row['car_model']; ?></h3>
                                            <ul class="card-list">
                                                <li><?php echo $row['max_people']; ?> People</li>
                                                <li><?php echo $row['car_type']; ?></li>
                                                <li><?php echo $row['car_kmpl']; ?> km / litre</li>
                                            </ul>
                                            <p class="card-price"><strong><?php echo $row['costs']; ?> / Hour</strong></p>
                                            <a href="entryform.php?car_id=<?php echo $row['id']; ?>" class="btn">Rent now</a>
                                        </div>
                                    </div>
                                </li>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <p>No suggested cars available.</p>
                        <?php endif; ?>
                    </ul>
                </div>
            </section>
        </article>
    </main>
</body>
</html>

<?php $conn->close(); ?>
