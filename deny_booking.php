<?php
session_start();
require 'connection.php';

// Check if the user is logged in (optional, depending on your logic)
if (!isset($_SESSION['username'])) {
  header('location:login1.php');
  exit();
}

// Check if a booking ID is provided
if (isset($_POST['deny_booking_id'])) {
    $booking_id = $_POST['deny_booking_id'];
    
    // SQL query to update the booking status to "Denied"
    $sql = "UPDATE bookings SET status = 'Denied' WHERE id = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $booking_id); // Bind the booking ID to the query
        $stmt->execute();
        
        // Redirect back to the bookings page
        header('Location: book_admin.php');
        exit();
    } else {
        // Handle error if the query fails
        echo "Error: " . $conn->error;
    }
} else {
    echo "Booking ID is not set.";
}
?>
