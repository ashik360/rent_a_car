<?php
session_start();

// Retrieve user information from session
$userEmail = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : 'Email not available';
$userPhone = isset($_SESSION['user_phone']) ? $_SESSION['user_phone'] : 'No phone number available';

// Check if the email is valid (email is required for access)
if ($userEmail == 'Email not available') {
    die("Access denied. Please verify your email.");
}

// Fetch the user's phone number from the database
include 'connection.php';
$stmt = $conn->prepare("SELECT phone FROM verified_user WHERE email = ?");
$stmt->bind_param("s", $userEmail);
$stmt->execute();
$stmt->bind_result($userPhone);
$stmt->fetch();
$stmt->close();

// If no phone is found in the database, set a default message
if (empty($userPhone)) {
    $userPhone = 'N/A';
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

        .card img {
            display: block;
            margin: 0 auto;
            border-radius: 50%;
        }

        .fonts {
            font-size: 11px;
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
                        <h3 class="mt-2 mb-0"><strong>Email:</strong> <span id="user-email"><?php echo $userEmail; ?></span></h3>
                        
                        <!-- Display phone number or N/A if unavailable -->
                        <h3 class="mt-2 mb-0"><strong>Phone:</strong> <span id="user-phone"><?php echo $userPhone; ?></span>
                        <?php if($userPhone == 'N/A'): ?>
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#phoneModal"><i class="fa fa-pencil"></i></button>
                        <?php endif; ?>
                        </h3>

                        <!-- Modal for phone number update -->
                        <div class="modal fade" id="phoneModal" tabindex="-1" aria-labelledby="phoneModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="phoneModalLabel">Assign Phone Number</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="phone-form">
                                            <div class="mb-3">
                                                <label for="phone" class="form-label">Phone Number</label>
                                                <input type="text" class="form-control" id="phone" name="phone" required>
                                            </div>
                                            <input type="hidden" id="email" name="email" value="<?php echo $userEmail; ?>">
                                            <button type="submit" class="btn btn-primary">Save Phone Number</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

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
                                            $statusClass = ($row['status'] == 'Pending') ? 'btn-outline-secondary' : 'btn-outline-success';

                                            echo "<tr>";
                                            echo "<td>" . $counter . "</td>";
                                            echo "<td>" . '2024' . $row['car_id'] . "</td>";
                                            echo "<td>{$row['pickup_date']}</td>";
                                            echo "<td>{$row['return_date']}</td>";
                                            echo "<td><button type='button' class='btn {$statusClass}' disabled>{$row['status']}</button></td>";

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
                        <div class="d-flex justify-content-center">
                            <a href="index.php" class="mx-2">
                                <button type="button" class="btn btn-secondary">Back</button>
                            </a>
                            <a href="logout2.php" class="mx-2">
                                <button type="button" class="btn btn-danger">Log Out</button>
                            </a>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
    $("#phone-form").on("submit", function(e) {
        e.preventDefault();

        var phone = $("#phone").val();
        var email = $("#email").val();

        $.ajax({
            url: 'update_phone.php',
            method: 'POST',
            data: { email: email, phone: phone },
            success: function(response) {
                console.log(response); // Log the response from the server to the console for debugging
                if (response === 'success') {
                    alert("Phone number updated successfully!");
                    location.reload(); // Reload to reflect the new phone number
                } else {
                    alert("Failed to update phone number: " + response); // Show the error message
                }
            },
            error: function(xhr, status, error) {
                alert("AJAX error: " + error); // Alert in case of AJAX error
            }
        });
    });
});

    </script>
</body>

</html>
