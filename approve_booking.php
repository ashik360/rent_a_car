<?php
require 'connection.php';  // Include your database connection

// Check if the form is submitted and the booking_id is set
if (isset($_POST['approve']) && isset($_POST['booking_id'])) {
    $booking_id = $_POST['booking_id'];

    // SQL query to update the booking status to 'Approved'
    $update_sql = "UPDATE bookings SET status = 'Approved' WHERE id = ?";
    $stmt = $conn->prepare($update_sql);

    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind parameters and execute the update statement
    $stmt->bind_param('i', $booking_id);
    
    if ($stmt->execute()) {
        // Redirect back to the admin bookings page after successful approval
        header('Location: book_admin.php?status=approved');
        exit();
    } else {
        echo "Error updating booking status: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
