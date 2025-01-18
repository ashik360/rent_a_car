<?php
// Start the session
session_start();

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

     // Initialize variables
     $username = isset($_POST['username']) ? $_POST['username'] : ''; 
     $password = isset($_POST['password']) ? $_POST['password'] : '';
     $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
     $fullname = isset($_POST['fullname']) ? $_POST['fullname'] : '';
     $license = isset($_FILES['license']) ? $_FILES['license'] : null;
     $confirmPassword = isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : '';

    // Check if all required fields are filled out
    if (empty($username) || empty($password) || empty($phone) || empty($fullname)) {
        die("Please fill in all required fields.");
    }

    // Check if passwords match
    if ($password !== $confirmPassword) {
        die("Passwords do not match.");
    }

    // File upload handling for the driver's license
    if ($license && $license['error'] == 0) {
        // Validate file type (for example, only allow image files)
        $allowedMimeTypes = ['image/jpeg', 'image/png', 'application/pdf']; // Extend as needed
        if (!in_array($license['type'], $allowedMimeTypes)) {
            die("Invalid file type. Only JPG, PNG, and PDF are allowed.");
        }

        // Check file size (for example, limit to 1MB)
        if ($license['size'] > 1048576) {  // 1MB = 1048576 bytes
            die("File size exceeds 1MB limit.");
        }

        // Upload the file to a directory (ensure the directory exists and is writable)
        $uploadDir = 'uploads/';
        $fileName = basename($license['name']);
        $uploadFilePath = $uploadDir . $fileName;

        if (!move_uploaded_file($license['tmp_name'], $uploadFilePath)) {
            die("License upload failed.");
        }
    } else {
        die("License upload failed or no file uploaded.");
    }

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Now, insert the driver into the database (adjust the query as necessary)
    include 'connection.php'; // Make sure to include the database connection

    $stmt = $conn->prepare("INSERT INTO drivers (name, username, password, license) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
        die("Query preparation failed: " . $conn->error);
    }

    $stmt->bind_param("ssss", $fullname, $username, $hashedPassword, $uploadFilePath);
    
    // Execute the query and check for errors
    if ($stmt->execute()) {
        $_SESSION['driver_id'] = $conn->insert_id;  // Store driver ID in session
        $_SESSION['driver_name'] = $fullname;  // Store driver name in session
        header("Location: driver_area.php");  // Redirect to the driver area page
        exit();
    } else {
        die("Driver registration failed: " . $stmt->error);
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
