<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "rent_car");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$car_id = $pickup_date = $return_date = $hourly_rate = $total_cost = $hours = 0;

// Fetch car details and calculate rental cost
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize POST data
    $car_id = isset($_POST['car_id']) ? intval($_POST['car_id']) : 0;
    $pickup_date = isset($_POST['pickup_date']) ? $_POST['pickup_date'] : '';
    $return_date = isset($_POST['return_date']) ? $_POST['return_date'] : '';

    // Prepare and execute SQL query to fetch car details
    $sql = "SELECT costs FROM car_list WHERE id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $car_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($car = $result->fetch_assoc()) {
            $hourly_rate = $car['costs'];

            // Calculate the number of hours between pickup and return
            $pickup_time = strtotime($pickup_date);
            $return_time = strtotime($return_date);
            $hours = ($return_time - $pickup_time) / 3600;

            // Calculate the total cost
            $total_cost = $hours * $hourly_rate;
        } else {
            echo "Error: Car not found.";
        }

        $stmt->close();
    } else {
        echo "Error preparing SQL statement: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment - Car Rental</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Payment Details</h1>

        <p><strong>Car ID:</strong> <?php echo htmlspecialchars($car_id); ?></p>
        <p><strong>Hourly Rate:</strong> $<?php echo htmlspecialchars($hourly_rate); ?></p>
        <p><strong>Rental Duration:</strong> <?php echo htmlspecialchars($hours); ?> hours</p>
        <p><strong>Total Cost:</strong> $<?php echo htmlspecialchars($total_cost); ?></p>

        <h2>Select Payment Method</h2>
        <form action="confirm_payment.php" method="POST">
            <input type="hidden" name="car_id" value="<?php echo htmlspecialchars($car_id); ?>">
            <input type="hidden" name="total_cost" value="<?php echo htmlspecialchars($total_cost); ?>">
            <div class="mb-3">
                <label for="payment_method" class="form-label">Payment Method</label>
                <select class="form-control" id="payment_method" name="payment_method" required>
                    <option value="paypal">PayPal</option>
                    <option value="mastercard">MasterCard</option>
                    <option value="bkash">Bkash</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Confirm Payment</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
