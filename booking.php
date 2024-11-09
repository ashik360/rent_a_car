<?php
session_start();

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
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pickup_date = $_POST['pickup_date'];
    $return_date = $_POST['return_date'];
    $pickup_location = $_POST['pickup_location'];
    $dropoff_location = $_POST['dropoff_location'];

    // Insert booking details into the database
    $sql = "INSERT INTO bookings (car_id, name, email, phone, pickup_date, return_date, pickup_location, dropoff_location) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssssss", $car_id, $name, $email, $phone, $pickup_date, $return_date, $pickup_location, $dropoff_location);

    if ($stmt->execute()) {
        // Store booking details in session
        $_SESSION['booking_id'] = $stmt->insert_id; // Store the booking ID in session for later use
        $_SESSION['booking_details'] = [
            'car_id' => $car_id,
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'pickup_date' => $pickup_date,
            'return_date' => $return_date,
            'pickup_location' => $pickup_location,
            'dropoff_location' => $dropoff_location,
            'car_model' => $car['car_model'],
            'hourly_rate' => $car['hourly_rate']
        ];

        // Redirect to payment page with POST data
        echo '<form id="paymentForm" action="payment.php" method="POST">';
        echo '<input type="hidden" name="car_id" value="' . $car_id . '">';
        echo '<input type="hidden" name="pickup_date" value="' . $pickup_date . '">';
        echo '<input type="hidden" name="return_date" value="' . $return_date . '">';
        echo '</form>';
        echo '<script>document.getElementById("paymentForm").submit();</script>';
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Car - <?php echo $car['car_model']; ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h1>Book <?php echo $car['car_model']; ?></h1>
    <img src="<?php echo $car['image_path']; ?>" alt="<?php echo $car['car_model']; ?>" class="img-fluid mb-3">
    <p><strong>Model:</strong> <?php echo $car['car_model']; ?></p>
    <p><strong>Year:</strong> <?php echo $car['car_year']; ?></p>
    <p><strong>Type:</strong> <?php echo $car['car_type']; ?></p>
    <p><strong>Max People:</strong> <?php echo $car['max_people']; ?></p>

    <form action="" method="POST">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" required>
      </div>
      <div class="mb-3">
        <label for="pickup_date" class="form-label">Pick-up Date</label>
        <input type="date" class="form-control" id="pickup_date" name="pickup_date" required>
      </div>
      <div class="mb-3">
        <label for="return_date" class="form-label">Return Date</label>
        <input type="date" class="form-control" id="return_date" name="return_date" required>
      </div>
      <div class="mb-3">
        <label for="pickup_location" class="form-label">Pick-up Location</label>
        <input type="text" class="form-control" id="pickup_location" name="pickup_location" required>
      </div>
      <div class="mb-3">
        <label for="dropoff_location" class="form-label">Drop-off Location</label>
        <input type="text" class="form-control" id="dropoff_location" name="dropoff_location" required>
      </div>
      <button type="submit" class="btn btn-primary">Book Now</button>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


