<?php
session_start();

// Check if 'date_from' and 'date_to' are set before using them
if (isset($_POST['date_from'])) {
    $_SESSION['date_from'] = date("Y-m-d\TH:i", strtotime($_POST['date_from']));
}

if (isset($_POST['date_to'])) {
    $_SESSION['date_to'] = date("Y-m-d\TH:i", strtotime($_POST['date_to']));
}

// Get values from GET or POST
$pickup_date = isset($_GET['date_from']) ? $_GET['date_from'] : (isset($_POST['date_from']) ? $_POST['date_from'] : '');
$return_date = isset($_GET['date_to']) ? $_GET['date_to'] : (isset($_POST['date_to']) ? $_POST['date_to'] : '');
$pickup_location = isset($_GET['from_city']) ? $_GET['from_city'] : (isset($_POST['from_city']) ? $_POST['from_city'] : '');
$dropoff_location = isset($_GET['to_city']) ? $_GET['to_city'] : (isset($_POST['to_city']) ? $_POST['to_city'] : '');


// Database connection
$conn = new mysqli("localhost", "root", "", "rent_car");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch car details based on car_id
if (isset($_GET['car_id'])) {
    $car_id = $_GET['car_id'];
    $sql = "SELECT * FROM car_list WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $car_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $car = $result->fetch_assoc();
} else {
    echo "Car ID is missing.";
    exit;
}

// Process booking form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    //$email = $_POST['email'];
    $phone = $_POST['phone'];
    $pickup_date = $_POST['pickup_date'];
    $return_date = $_POST['return_date'];
    $pickup_location = $_POST['pickup_location'];
    $dropoff_location = $_POST['dropoff_location'];

    // Store phone number in session
    $_SESSION['user_phone'] = $phone;

    // Check car availability for the given dates
    // Check car availability for the given dates and fetch conflicting bookings
    $availability_check_sql = "
    SELECT pickup_date, return_date
    FROM bookings
    WHERE car_id = ? 
    AND (
        (pickup_date <= ? AND return_date >= ?) OR
        (pickup_date <= ? AND return_date >= ?)
    )
    ";

    $availability_stmt = $conn->prepare($availability_check_sql);
    $availability_stmt->bind_param("issss", $car_id, $return_date, $pickup_date, $pickup_date, $return_date);
    $availability_stmt->execute();
    $availability_result = $availability_stmt->get_result();

    if ($availability_result->num_rows > 0) {
        // Car is not available, fetch conflicting booking dates
        $conflicting_dates = [];
        while ($row = $availability_result->fetch_assoc()) {
            $conflicting_dates[] = $row;
        }

        // Create the table rows dynamically
        $table_rows = '';
        foreach ($conflicting_dates as $index => $dates) {
            $table_rows .= '
    <tr>
        <th scope="row">' . ($index + 1) . '</th>
        <td>' . htmlspecialchars($dates['pickup_date']) . '</td>
        <td>' . htmlspecialchars($dates['return_date']) . '</td>
    </tr>';
        }

        echo '
<!-- Bootstrap Modal -->
<div class="modal fade" id="availabilityModal" tabindex="-1" aria-labelledby="availabilityModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-center">
                <h5 class="modal-title" id="availabilityModalLabel">Car Unavailable</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                This car was already booked by someone on the selected dates. Please choose different dates or another car.
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Date From</th>
                            <th scope="col">Date To</th>
                        </tr>
                    </thead>
                    <tbody>
                        ' . $table_rows . '
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Trigger the Modal -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var modal = new bootstrap.Modal(document.getElementById("availabilityModal"));
        modal.show();
    });
</script>
';
    } else {
        // Proceed with booking insertion
        $sql = "INSERT INTO bookings (car_id, name, email, phone, pickup_date, return_date, pickup_location, dropoff_location) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isssssss", $car_id, $name, $email, $phone, $pickup_date, $return_date, $pickup_location, $dropoff_location);

        if ($stmt->execute()) {
            // Redirect to the congratulation page
            echo '<form id="clientArea" action="congratulation.php" method="POST">';
            echo '<input type="hidden" name="car_id" value="' . $car_id . '">';
            echo '<input type="hidden" name="pickup_date" value="' . $pickup_date . '">';
            echo '<input type="hidden" name="return_date" value="' . $return_date . '">';
            echo '</form>';
            echo '<script>document.getElementById("clientArea").submit();</script>';
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    $availability_stmt->close();

}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #d1cfcf;
            ;
        }

        .nav-tabs .nav-link {
            color: black;
            /* Default color for unselected tabs */
        }

        .nav-tabs .nav-link.active {
            color: blue;
            /* Color for the active tab */
            background-color: transparent;
            /* Ensure the background stays transparent */
            border-color: transparent;
            /* Remove border for active tab */
        }

        .nav-tabs .nav-link:hover {
            color: #0056b3;
            /* Optional: Change color on hover for inactive tabs */
        }
    </style>

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!--=================================== Entry Form Starts =====================================-->

    <div class="container py-5">
        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="bg-white rounded-lg rounded-4 shadow-sm p-5">
                    <!-- Credit card form tabs -->
                    <ul class="nav nav-pills rounded-pill nav-fill mb-3">
                        <li class="nav-item">
                            <a data-bs-toggle="pill" href="#nav-tab-card" class="nav-link active rounded-pill">
                                <i class="fa fa-credit-card"></i> Submit
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a data-bs-toggle="pill" href="#nav-tab-paypal" class="nav-link rounded-pill">
                                <i class="fa-solid fa-table"></i> Pay
                            </a>
                        </li> -->
                    </ul>
                    <!-- End -->


                    <!-- Credit card form content -->
                    <div class="tab-content">

                        <!-- credit card info-->
                        <div id="nav-tab-card" class="tab-pane fade show active">
                            <!-- <p class="alert alert-success">Some text success or error</p> -->
                            <!-- Table Starts -->
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td class="text-center" colspan="5">
                                            <button type="button" class="btn btn-primary w-100" disabled>Book
                                                <?php echo $car['car_model']; ?></button>
                                        </td>
                                    </tr>
                                    <tr style="height: 120px;" class="text-center align-middle">
                                        <th scope="col" colspan="5" style="vertical-align: middle;">
                                            <div id="carouselExampleAutoplaying" class="carousel slide"
                                                data-bs-ride="carousel" data-bs-interval="3500">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img title="<?php echo $car['car_model']; ?>"
                                                            src="<?php echo $car['image_path']; ?>"
                                                            alt="<?php echo $car['car_model']; ?>"
                                                            class="img-fluid mb-3">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="bannerImg-fix" src="assets/images/car-5.jpg"
                                                            class="d-block w-100" alt="...">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="bannerImg-fix" src="assets/images/car-6.jpg"
                                                            class="d-block w-100" alt="...">
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
                                        </th>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr>
                                        <td class="px-0 py-0" colspan="5">
                                            <!-- Navigation Tabs -->
                                            <nav>
                                                <div class="nav nav-pills justify-content-center mt-2 mb-2" id="nav-tab"
                                                    role="tablist">
                                                    <button class="nav-link active" id="nav-home-tab"
                                                        data-bs-toggle="tab" data-bs-target="#nav-home" type="button"
                                                        role="tab" aria-controls="nav-home"
                                                        aria-selected="true">Details</button>
                                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                                        data-bs-target="#nav-profile" type="button" role="tab"
                                                        aria-controls="nav-profile"
                                                        aria-selected="false">Features</button>
                                                </div>
                                            </nav>

                                            <!-- Tab Content -->
                                            <div class="tab-content" id="nav-tabContent">
                                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                                    aria-labelledby="nav-home-tab" tabindex="0">
                                                    <table class="table table-bordered my-0 py-0">
                                                        <tbody>
                                                            <tr>
                                                                <th scope="col">Model</th>
                                                                <td scope="col"><?php echo $car['car_model']; ?></td>
                                                                <th scope="col">Year</th>
                                                                <td scope="col"><?php echo $car['car_year']; ?></td>
                                                            </tr>
                                                        </tbody>
                                                        <tbody>
                                                            <tr>
                                                                <th>Type</th>
                                                                <td><?php echo $car['car_type']; ?></td>
                                                                <th>Max People</th>
                                                                <td><?php echo $car['max_people']; ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                                    aria-labelledby="nav-profile-tab" tabindex="0">
                                                    <table class="table table-bordered my-0 py-0">
                                                        <tbody>
                                                            <tr>
                                                                <th scope="col">Feature 1</th>
                                                                <td scope="col"><i class="fa fa-check"></i> Yes</td>
                                                                <th scope="col">Feature 2</th>
                                                                <td scope="col"><i class="fa fa-check"></i> Yes</td>
                                                            </tr>
                                                        </tbody>
                                                        <tbody>
                                                            <tr>
                                                                <th scope="col">Feature 3</th>
                                                                <td scope="col"><i class="fa fa-check"></i> Yes</td>
                                                                <th scope="col">Feature 4</th>
                                                                <td scope="col"><i class="fa fa-check"></i> Yes</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </thead>
                            </table>
                            <!-- Form Starts -->
                            <div class="container mt-5">
                            <form action="" method="POST">
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="col-md-6">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="pickup_date" class="form-label">Pick-up Date</label>
            <input type="datetime-local" class="form-control" id="pickup_date" name="pickup_date" value="<?php echo $pickup_date; ?>" required>
        </div>
        <div class="col-md-6">
            <label for="return_date" class="form-label">Return Date</label>
            <input type="datetime-local" class="form-control" id="return_date" name="return_date" value="<?php echo $return_date; ?>" required>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="pickup_location" class="form-label">Pick-up Location</label>
            <input type="text" class="form-control" id="pickup_location" name="pickup_location" value="<?php echo $pickup_location; ?>" required list="pickup_cities">
            <datalist id="pickup_cities">
                <?php
                include "connection.php";
                $sql = "SELECT name FROM cities ORDER BY name ASC";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . htmlspecialchars($row['name']) . "'>";
                    }
                }
                $conn->close();
                ?>
            </datalist>
        </div>
        <div class="col-md-6">
            <label for="dropoff_location" class="form-label">Drop-off Location</label>
            <input type="text" class="form-control" id="dropoff_location" name="dropoff_location" value="<?php echo $dropoff_location; ?>" required list="dropoff_cities">
            <datalist id="dropoff_cities">
                <?php
                include "connection.php";
                $sql = "SELECT name FROM cities ORDER BY name ASC";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . htmlspecialchars($row['name']) . "'>";
                    }
                }
                $conn->close();
                ?>
            </datalist>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>


                            </div>

                        </div>
                        <!-- End -->

                        <!-- Paypal info -->
                        <!-- <div id="nav-tab-paypal" class="tab-pane fade text-center">
                            <img style="width: 15vw" src="https://pngimg.com/d/under_construction_PNG46.png" alt=""
                                srcset="">
                            <h2>Coming Soon!!</h2>
                        </div> -->
                        <!-- End -->
                    </div>
                    <!-- End -->

                </div>
            </div>
        </div>
    </div>

    <!-- <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script> -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/ecf8211025.js" crossorigin="anonymous"></script>
    <script>
        document.querySelectorAll('input[list="cities"]').forEach(input => {
            input.addEventListener('input', function () {
                const query = this.value;
                if (query.length > 1) { // Fetch suggestions after 2 characters
                    fetch(`fetch_cities.php?query=${encodeURIComponent(query)}`)
                        .then(response => response.json())
                        .then(data => {
                            const dataList = this.list;
                            dataList.innerHTML = ''; // Clear previous options
                            data.forEach(city => {
                                const option = document.createElement('option');
                                option.value = city;
                                dataList.appendChild(option);
                            });
                        });
                }
            });
        });

    </script>
</body>

</html>