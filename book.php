<!-- booking.php -->
<?php
    // Fetch car details from the database
    $carId = $_GET['car_id'];
    // Assuming connection to the database has already been established
    $car = mysqli_query($conn, "SELECT * FROM cars WHERE id = $carId");
    $carData = mysqli_fetch_assoc($car);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Car - <?php echo $carData['model']; ?></title>
</head>
<body>
    <h1>Book Car: <?php echo $carData['model']; ?></h1>
    <form action="payment.php" method="post">
        <input type="hidden" name="car_id" value="<?php echo $carData['id']; ?>">
        <p>Pickup Date: <input type="datetime-local" name="pickup_date" required></p>
        <p>Dropoff Date: <input type="datetime-local" name="dropoff_date" required></p>
        <p><button type="submit">Book Now</button></p>
    </form>
</body>
</html>
