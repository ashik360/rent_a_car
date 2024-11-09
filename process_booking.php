<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $car_id = $_POST['car_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pickup_date = $_POST['pickup_date'];
    $dropoff_date = $_POST['dropoff_date'];

    // Database connection
    $conn = new mysqli("localhost", "root", "", "rent_car");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert booking details into the database
    $sql = "INSERT INTO bookings (car_id, name, email, phone, pickup_date, dropoff_date, date_created) VALUES (?, ?, ?, ?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssss", $car_id, $name, $email, $phone, $pickup_date, $dropoff_date);

    if ($stmt->execute()) {
        echo "Booking confirmed! We'll contact you shortly.";
        // Optionally, redirect to a thank-you page or back to the homepage
        // header('Location: thank_you.php');
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
