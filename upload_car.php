<?php 
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rent_car";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Extract form data
    $reg_code = $_POST['reg_code'];
    $car_model = $_POST['car_model'];
    $car_year = $_POST['car_year'];
    $max_people = $_POST['max_people'];
    $car_kmpl = $_POST['car_kmpl'];
    $car_type = $_POST['car_type'];
    $car_cat_id = $_POST['car_cat_id'];
    $costs = $_POST['costs'];

    // Handle file uploads
    $imagePaths = [];
    if (isset($_FILES['car_images']) && $_FILES['car_images']['error'][0] == UPLOAD_ERR_OK) {
        $imageDir = 'assets/images/cars/';

        // Create directory if it doesn't exist
        if (!is_dir($imageDir)) {
            mkdir($imageDir, 0777, true);
        }

        $fileCount = count($_FILES['car_images']['name']);

        for ($i = 0; $i < $fileCount; $i++) {
            $fileName = basename($_FILES['car_images']['name'][$i]);
            $targetFilePath = $imageDir . $fileName;

            if (move_uploaded_file($_FILES['car_images']['tmp_name'][$i], $targetFilePath)) {
                $imagePaths[] = $targetFilePath;
            } else {
                echo "Error uploading file: " . $_FILES['car_images']['name'][$i];
            }
        }
    } else {
        echo "No files were uploaded.";
    }

    // Convert image paths array to a comma-separated string
    $imagePathsStr = implode(',', $imagePaths);

    // Prepare to insert car details into the database
    $sql = "INSERT INTO car_list (reg_code, car_model, car_year, max_people, car_kmpl, car_type, car_cat_id, costs, image_path, date_created) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die('Prepare failed: ' . $conn->error);
    }

    // Correct parameter binding
    $stmt->bind_param("ssiiissds", $reg_code, $car_model, $car_year, $max_people, $car_kmpl, $car_type, $car_cat_id, $costs, $imagePathsStr);

    if ($stmt->execute()) {
        echo 'Car details and images uploaded successfully! 
        <a href="car_details.php" class="btn btn-secondary mt-3">View Car Details</a>';
    } else {
        echo 'Error: ' . $stmt->error;
    }

    $stmt->close();
    $conn->close();

} else {
    echo "Invalid request method.";
}

