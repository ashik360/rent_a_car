<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $phone = (string) $_POST['phone'];  // Explicitly cast phone to a string

    // Validate phone number (optional)
    // Ensuring the phone number starts with a 0 and contains exactly 11 digits
    if (!preg_match("/^0[0-9]{10}$/", $phone)) {
        echo 'Invalid phone number format.';
        exit;
    }

    // Prepare the SQL query to update the phone number
    $stmt = $conn->prepare("UPDATE verified_user SET phone = ? WHERE email = ?");
    
    if (!$stmt) {
        echo "Statement preparation failed: " . $conn->error;  // Output error if preparing the statement fails
        exit;
    }

    // Bind parameters
    $stmt->bind_param("ss", $phone, $email);

    // Execute the query
    if ($stmt->execute()) {
        // Update the session with the new phone number
        $_SESSION['user_phone'] = $phone;  // Store the new phone number in the session
        echo 'success';  // Success response
    } else {
        echo 'Error: ' . $stmt->error;  // Output the specific error message from the database
    }

    $stmt->close();
}
?>
