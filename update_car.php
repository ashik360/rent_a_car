<?php
session_start();

// Check if the user is not authenticated and redirect to the login page
if (!isset($_SESSION['username'])) {
    header('location:login1.php');
    exit();
}

require 'connection.php'; // Ensure this file contains your database connection setup

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and validate form inputs
    $car_id = isset($_POST['id']) ? intval($_POST['id']) : null;
    $reg_code = isset($_POST['reg_code']) ? htmlspecialchars($_POST['reg_code'], ENT_QUOTES) : '';
    $car_model = isset($_POST['car_model']) ? htmlspecialchars($_POST['car_model'], ENT_QUOTES) : '';
    $car_year = isset($_POST['car_year']) ? intval($_POST['car_year']) : '';
    $max_people = isset($_POST['max_people']) ? intval($_POST['max_people']) : '';
    $car_kmpl = isset($_POST['car_kmpl']) ? floatval($_POST['car_kmpl']) : '';
    $car_type = isset($_POST['car_type']) ? htmlspecialchars($_POST['car_type'], ENT_QUOTES) : '';
    $car_cat_id = isset($_POST['car_cat_id']) ? intval($_POST['car_cat_id']) : '';
    $costs = isset($_POST['costs']) ? floatval($_POST['costs']) : '';

    // Validate required fields
    if (!$reg_code || !$car_model || !$car_year || !$max_people || !$car_kmpl || !$car_type || !$car_cat_id || !$costs) {
        die("All fields are required.");
    }

    // Handle image upload if a new image is uploaded
    $image_path = null;
    if (isset($_FILES['car_images']) && $_FILES['car_images']['error'][0] == 0) {
        $upload_dir = 'uploads/car_images/';
        $uploaded_images = [];

        // Loop through uploaded files
        foreach ($_FILES['car_images']['tmp_name'] as $key => $tmp_name) {
            $file_name = basename($_FILES['car_images']['name'][$key]);
            $target_file = $upload_dir . $file_name;

            // Check if file is a valid image
            $check = getimagesize($tmp_name);
            if ($check === false) {
                die("Uploaded file is not a valid image.");
            }

            // Move the uploaded file to the server directory
            if (move_uploaded_file($tmp_name, $target_file)) {
                $uploaded_images[] = $target_file;
            } else {
                die("Failed to upload image.");
            }
        }

        // Use the first image from the uploaded images as the new image for the car
        if (!empty($uploaded_images)) {
            $image_path = $uploaded_images[0]; // Get the first uploaded image
        }
    }

    // Prepare the SQL query to update the car details
    $sql = "UPDATE car_list SET 
                reg_code = ?, car_model = ?, car_year = ?, max_people = ?, car_kmpl = ?, car_type = ?, car_cat_id = ?, costs = ?";

    // If an image was uploaded, add the image_path to the query
    if ($image_path) {
        $sql .= ", image_path = ?";
    }

    // Complete the query with the WHERE clause for the car id
    $sql .= " WHERE id = ?";

    // Prepare the statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind the parameters dynamically based on the presence of an image
        if ($image_path) {
            $stmt->bind_param("ssiiisdis", $reg_code, $car_model, $car_year, $max_people, $car_kmpl, $car_type, $car_cat_id, $costs, $image_path, $car_id);
        } else {
            $stmt->bind_param("ssiiisdis", $reg_code, $car_model, $car_year, $max_people, $car_kmpl, $car_type, $car_cat_id, $costs, $car_id);
        }

        // Execute the query and check if it was successful
        if ($stmt->execute()) {
            header("Location: cars_admin.php?status=success");
            exit();
        } else {
            echo "Error executing query: " . $stmt->error;
        }
    } else {
        echo "Error preparing query: " . $conn->error;
    }
} else {
    // Redirect to cars admin page if no POST request
    header("Location: cars_admin.php");
    exit();
}
?>
