<?php
session_start();

// Check if the user is not authenticated and redirect to the login page
if (!isset($_SESSION['username'])) {
    header('location:login1.php');
    exit();
}

// Debugging: Check if the ID is passed in the URL
if (!isset($_GET['id'])) {
    die("No car ID provided for editing.");
}

require 'connection.php'; // Ensure this file contains your database connection setup
// Get the car ID from the URL
$car_id = isset($_GET['id']) ? intval($_GET['id']) : null;

// If the car ID is not provided, redirect to another page (e.g., car list page)
if (!$car_id) {
    header("Location: cars_admin.php");  // Redirect to admin panel if ID is missing
    exit;
}

// Fetch the car details from the database
$sql = "SELECT * FROM car_list WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $car_id);
$stmt->execute();
$result = $stmt->get_result();
$car = $result->fetch_assoc();

if (!$car) {
    die("Car not found.");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Car</title>
    <?php include "dependency/dependency_top.php"; ?>
    <style>
        .no-br {
            border-left: none !important;
        }

        body {
            padding-left: 15px;
            padding-right: 15px;
        }

        .container-fluid {
            padding-left: 15px;
            padding-right: 15px;
        }

        .card-header.bg-green {
            background-color: #28a745;
            color: white;
        }

        .card-header h2 {
            margin: 0;
            padding: 10px;
        }

        .card-body {
            text-align: center;
        }

        .btn-primary {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <main>
        <article>
            <section class="admin pt-5 mt-5">
                <div class="container-fluid text-center">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div class="card">
                                <div class="card-header text-center bg-green text-white">
                                    <h2 class="my-3">Edit Car Details</h2>
                                </div>
                                <div class="card-body no-br text-start">
                                    <form action="update_car.php" method="POST" enctype="multipart/form-data">
                                        <div class="mb-3">
                                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($car['id']); ?>">
                                            <label for="reg_code" class="form-label">Registration Code</label>
                                            <input type="text" class="form-control" id="reg_code" name="reg_code"
                                                value="<?php echo htmlspecialchars($car['reg_code'], ENT_QUOTES); ?>"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="car_model" class="form-label">Car Model</label>
                                            <input type="text" class="form-control" id="car_model" name="car_model"
                                                value="<?php echo htmlspecialchars($car['car_model'], ENT_QUOTES); ?>"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="car_year" class="form-label">Car Year</label>
                                            <input type="number" class="form-control" id="car_year" name="car_year"
                                                value="<?php echo htmlspecialchars($car['car_year'], ENT_QUOTES); ?>"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="max_people" class="form-label">Max People</label>
                                            <input type="number" class="form-control" id="max_people" name="max_people"
                                                value="<?php echo htmlspecialchars($car['max_people'], ENT_QUOTES); ?>"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="car_kmpl" class="form-label">Car Km/Hour</label>
                                            <input type="number" step="any" class="form-control" id="car_kmpl"
                                                name="car_kmpl"
                                                value="<?php echo htmlspecialchars($car['car_kmpl'], ENT_QUOTES); ?>"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="car_type" class="form-label">Car Type</label>
                                            <input type="text" class="form-control" id="car_type" name="car_type"
                                                value="<?php echo htmlspecialchars($car['car_type'], ENT_QUOTES); ?>"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="car_cat_id" class="form-label">Car Category</label>
                                            <select class="form-select" id="car_cat_id" name="car_cat_id" required>
                                                <option value="1" <?php echo ($car['car_cat_id'] == 1) ? 'selected' : ''; ?>>Sedan</option>
                                                <option value="2" <?php echo ($car['car_cat_id'] == 2) ? 'selected' : ''; ?>>SUV</option>
                                                <option value="3" <?php echo ($car['car_cat_id'] == 3) ? 'selected' : ''; ?>>Hatchback</option>
                                                <option value="4" <?php echo ($car['car_cat_id'] == 4) ? 'selected' : ''; ?>>Coupe</option>
                                                <option value="5" <?php echo ($car['car_cat_id'] == 5) ? 'selected' : ''; ?>>Convertible</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="costs" class="form-label">Costs Per Hour (Taka)</label>
                                            <input type="number" class="form-control" id="costs" name="costs"
                                                value="<?php echo htmlspecialchars($car['costs'], ENT_QUOTES); ?>"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Upload New Car Images (max 5)</label>
                                            <input type="file" class="form-control" id="car_images" name="car_images[]"
                                                accept="image/*" multiple>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update Car</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </div>
            </section>
        </article>
    </main>
    <?php include "dependency/dependency_bottom.php"; ?>
</body>

</html>