<?php
session_start();
include 'connection.php';

// Check if the user is logged in and if the ID is in the session
if (!isset($_SESSION['id'])) {
    header('Location: driver_login.php');
    exit();
}

// Get the driver ID from the session
$id = $_SESSION['id'];

// Fetch driver details based on the ID
$query = "SELECT * FROM drivers WHERE id = ?";
$stmt = mysqli_prepare($conn, $query);
if ($stmt === false) {
    die("Error preparing statement: " . mysqli_error($conn));
}
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$driver = mysqli_fetch_assoc($result);

// Update booking status if a status update is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_status'], $_POST['booking_id'])) {
    $new_status = $_POST['update_status'];
    $booking_id = $_POST['booking_id'];

    $update_query = "UPDATE bookings SET status = ? WHERE id = ? AND assigned_driver = ?";
    $update_stmt = mysqli_prepare($conn, $update_query);
    if ($update_stmt === false) {
        die("Error preparing update statement: " . mysqli_error($conn));
    }
    mysqli_stmt_bind_param($update_stmt, 'sii', $new_status, $booking_id, $id);
    mysqli_stmt_execute($update_stmt);
}

// Fetch the bookings assigned to this driver
$query_bookings = "SELECT * FROM bookings WHERE assigned_driver = ?";
$stmt_bookings = mysqli_prepare($conn, $query_bookings);
if ($stmt_bookings === false) {
    die("Error preparing bookings statement: " . mysqli_error($conn));
}
mysqli_stmt_bind_param($stmt_bookings, 'i', $id);
mysqli_stmt_execute($stmt_bookings);
$result_bookings = mysqli_stmt_get_result($stmt_bookings);

$bookings = [];
while ($booking = mysqli_fetch_assoc($result_bookings)) {
    $bookings[] = $booking;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Area</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <style>
        body { background: #eee; }
        .card { border-radius: 8px; }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-12">
            <div class="card text-center p-3 py-4">
                <img src="assets/images/user-icon.png" width="100" class="rounded-circle" />
                <h3><?php echo htmlspecialchars($driver['name']); ?></h3>
                <span><?php echo htmlspecialchars($driver['username']); ?></span>
                <hr>
                <h4>Your Bookings</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Car ID</th>
                            <th>Customer Name</th>
                            <th>Contact</th>
                            <th>Pickup Location</th>
                            <th>Dropoff Location</th>
                            <th>Pickup Date</th>
                            <th>Return Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($bookings) > 0): ?>
                            <?php foreach ($bookings as $index => $row): ?>
                                <tr>
                                    <td><?php echo $index + 1; ?></td>
                                    <td><?php echo htmlspecialchars('2024' . $row['car_id']); ?></td>
                                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                                    <td><?php echo htmlspecialchars($row['phone']); ?></td>
                                    <td><?php echo htmlspecialchars($row['pickup_location']); ?></td>
                                    <td><?php echo htmlspecialchars($row['dropoff_location']); ?></td>
                                    <td><?php echo htmlspecialchars($row['pickup_date']); ?></td>
                                    <td><?php echo htmlspecialchars($row['return_date']); ?></td>
                                    <td><?php echo htmlspecialchars($row['status']); ?></td>
                                    <td>
                                        <form method="POST">
                                            <input type="hidden" name="booking_id" value="<?php echo $row['id']; ?>">
                                            <select name="update_status" class="form-select">
                                                <option value="Pending" <?php if ($row['status'] === 'Pending') echo 'selected'; ?>>Pending</option>
                                                <option value="Accepted" <?php if ($row['status'] === 'Accepted') echo 'selected'; ?>>Accepted</option>
                                                <option value="In Progress" <?php if ($row['status'] === 'In Progress') echo 'selected'; ?>>In Progress</option>
                                                <option value="Completed" <?php if ($row['status'] === 'Completed') echo 'selected'; ?>>Completed</option>
                                            </select>
                                            <button type="submit" class="btn btn-primary mt-2">Update</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="10">No bookings assigned to you.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
