<?php
session_start();
require 'connection.php';  // Include the database connection

// Check if the user is authenticated as an admin
if (!isset($_SESSION['username'])) {
    header('Location: login1.php');
    exit();
}

// Get the form data (booking ID and selected driver ID)
if (isset($_POST['driver']) && isset($_POST['booking_id'])) {
    $driver_id = $_POST['driver'];
    $booking_id = $_POST['booking_id'];

    // Update the booking with the assigned driver
    $sql = "UPDATE bookings SET assigned_driver = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind the parameters and execute the query
    $stmt->bind_param('ii', $driver_id, $booking_id);
    $stmt->execute();

    // Check if the update was successful
    if ($stmt->affected_rows > 0) {
        // Redirect back to the booking management page
        header('Location: book_admin.php');
    } else {
        echo "Error updating booking.";
    }

    $stmt->close();
}

$conn->close();
?>
