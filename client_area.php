<?php
// index.php
session_start();

// Retrieve phone number from session
$userPhone = isset($_SESSION['user_phone']) ? $_SESSION['user_phone'] : 'No phone number available';

// Check if the phone number is valid
if ($userPhone == 'No phone number available') {
    die("Phone number is missing. Please log in again.");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Area</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body {
            background: #eee;
        }

        .card {
            border: none;

            position: relative;
            overflow: hidden;
            border-radius: 8px;
            cursor: pointer;
        }

        /* For centering the profile image */
        .card img {
            display: block;
            margin: 0 auto;
            border-radius: 50%;
        }


        .card:before {

            content: "";
            position: absolute;
            left: 0;
            top: 0;
            width: 4px;
            height: 100%;
            background-color: #E1BEE7;
            transform: scaleY(1);
            transition: all 0.5s;
            transform-origin: bottom
        }

        .card:after {

            content: "";
            position: absolute;
            left: 0;
            top: 0;
            width: 4px;
            height: 100%;
            background-color: #8E24AA;
            transform: scaleY(0);
            transition: all 0.5s;
            transform-origin: bottom
        }

        .card:hover::after {
            transform: scaleY(1);
        }


        .fonts {
            font-size: 11px;
        }

        .social-list {
            display: flex;
            list-style: none;
            justify-content: center;
            padding: 0;
        }

        .social-list li {
            padding: 10px;
            color: #8E24AA;
            font-size: 19px;
        }


        .buttons button:nth-child(1) {
            border: 1px solid #8E24AA !important;
            color: #8E24AA;
            height: 40px;
        }

        .buttons button:nth-child(1):hover {
            border: 1px solid #8E24AA !important;
            color: #fff;
            height: 40px;
            background-color: #8E24AA;
        }

        .buttons button:nth-child(2) {
            border: 1px solid #8E24AA !important;
            background-color: #8E24AA;
            color: #fff;
            height: 40px;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <div class="card text-center p-3 py-4">
                    <div>
                        <!-- Profile image centered -->
                        <img src="assets/images/user-icon.png" width="100" class="rounded-circle" />
                    </div>

                    <div class="text-center mt-3">
                        <span class="bg-secondary p-1 px-4 rounded text-white">User Profile</span>
                        <h3 class="mt-2 mb-0"><strong>User:</strong> <span
                                id="user-phone"><?php echo $userPhone; ?></span></h3>
                        <span>Client</span>

                        <!-- Booking Table -->
                        <div class="bookings mt-4">
                            <h4 class="bg-secondary p-1 px-4 rounded text-white">Your Bookings</h4>
                            <table id="booking-table">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Car ID</th>
                                        <th>Pickup Date</th>
                                        <th>Return Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Fetch the user's bookings from the database
                                    include 'connection.php';

                                    // Prepare the query
                                    $stmt = $conn->prepare("SELECT * FROM bookings WHERE phone = ?");
                                    if (!$stmt) {
                                        die("Query preparation failed: " . $conn->error); // Detailed error
                                    }

                                    // Bind the phone number and execute the query
                                    $stmt->bind_param("s", $userPhone);
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    $total_rows = $result->num_rows;

                                    if ($result->num_rows > 0) {
                                        // Counter for row number
                                        $counter = 1;

                                        // Display the bookings
                                        while ($row = $result->fetch_assoc()) {
                                            // Determine the button class based on the status
                                            $statusClass = ($row['status'] == 'Pending') ? 'btn-outline-secondary' : 'btn-outline-success';

                                            echo "<tr>";
                                            echo "<td>" . $counter . "</td>";  // Display the row number
                                            echo "<td>" . '2024' . $row['car_id'] . "</td>";
                                            echo "<td>{$row['pickup_date']}</td>";
                                            echo "<td>{$row['return_date']}</td>";

                                            // Echo the status with dynamic class
                                            echo "<td><button type='button' class='btn {$statusClass}' disabled>{$row['status']}</button></td>";

                                            // Check if the status is Pending
                                            if ($row['status'] == "Pending") {
                                                echo '<td class="d-flex justify-content-evenly">
                    <button type="button" class="btn btn-primary">Pay Now</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                  </td>';
                                            } else {
                                                echo '<td class="d-flex justify-content-center">
                    <button type="button" class="btn btn-danger">Delete</button>
                  </td>';
                                            }

                                            echo "</tr>";

                                            // Increment the counter after each iteration
                                            $counter++;
                                        }
                                    } else {
                                        echo "<tr><td colspan='6'>No bookings found for this phone number.</td></tr>";
                                    }

                                    $stmt->close();
                                    ?>

                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <a href="logout2.php">
                            <button type="button" class="btn btn-danger">Log Out</button>
                        </a>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>