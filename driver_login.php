<?php
session_start();

include 'connection.php';  // Include the database connection

if (isset($_POST['login'])) {
  // Get the username and password from the login form
  $username = $_POST['username'];
  $password = $_POST['password'];  // The password entered by the user

  // Query the database for the driver with the given username
  $query = "SELECT * FROM drivers WHERE username = '$username' AND status = 'available'";
  
  // Execute the query
  $result = mysqli_query($conn, $query);
  
  // Check if a driver was found
  $driver = mysqli_fetch_assoc($result);

  if ($driver) {
    // Check if the stored password is bcrypt (it will start with "$2y$" or "$2a$")
    if (password_verify($password, $driver['password'])) {
      // Password matches the bcrypt hash, login successful

      $_SESSION['username'] = $driver['username'];
      $_SESSION['name'] = $driver['name'];
      $_SESSION['license'] = $driver['license'];
      $_SESSION['id'] = $driver['id'];

      // Redirect to the driver dashboard or another protected page
      header('location: driver_area.php');
      exit();
    }
    // If password doesn't match bcrypt, check if it's an MD5 hash
    elseif (md5($password) === $driver['password']) {
      // MD5 matched, this user is using an older password format (MD5)

      // To securely transition the user, hash the password with bcrypt and update the database
      $new_hashed_password = password_hash($password, PASSWORD_BCRYPT);
      
      // Update the password in the database with the new bcrypt hash
      $update_query = "UPDATE drivers SET password = '$new_hashed_password' WHERE id = " . $driver['id'];
      mysqli_query($conn, $update_query);

      // Store session data and redirect
      $_SESSION['username'] = $driver['username'];
      $_SESSION['name'] = $driver['name'];
      $_SESSION['license'] = $driver['license'];
      $_SESSION['id'] = $driver['id'];

      header('location: driver_area.php');
      exit();
    } else {
      // Invalid password (neither bcrypt nor MD5 matches)
      echo "Login failed. Please check your username and password.";
    }
  } else {
    // No driver found with the given username
    echo "Login failed. Please check your username and password.";
  }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Login Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f3f4f6;
            font-family: 'Arial', sans-serif;
            height: 100vh;
        }

        .login-box {
            max-width: 400px;
            width: 100%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 100%;
        }

        #logo-img {
            max-width: 150px;
            margin-bottom: 20px;
        }

        .card {
            border-radius: 8px;
            box-shadow: none;
        }

        .card-header {
            background-color: #6f42c1;
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
            padding: 1rem;
            border-radius: 8px 8px 0 0;
        }

        .card-body {
            padding: 2rem;
        }

        .input-group-text {
            background-color: #f0f0f0;
            border: 1px solid #ddd;
            border-radius: 8px 0 0 8px;
        }

        .form-control {
            border-radius: 8px;
            box-shadow: none;
            padding: 10px 15px;
            font-size: 1rem;
        }

        .form-control:focus {
            border-color: #6f42c1;
            box-shadow: 0 0 5px rgba(111, 66, 193, 0.5);
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
            font-size: 1.1rem;
            padding: 12px;
            border-radius: 8px;
            width: 100%;
            transition: background-color 0.3s;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .row {
            margin-top: 20px;
        }

        .text-center a {
            text-decoration: none;
            color: #6f42c1;
            font-size: 1rem;
        }

        .text-center a:hover {
            text-decoration: underline;
        }

        .input-group-text {
            padding: 1rem 1rem;
        }
    </style>
</head>

<body>

    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="login-box">
            <!-- Logo -->
            <center><img src="assets/images/1648050060_cbslg.png" alt="System Logo" id="logo-img"></center>
            <div class="card card-outline card-purple">
                <div class="card-header text-center">
                    <a href="#" class="h4 text-decoration-none text-white"><b>Driver Login Panel</b></a>
                </div>
                <div class="card-body">
                    <form id="dlogin-frm" action="" method="POST">
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                            <input type="text" class="form-control" name="username" placeholder="Username"
                                autocomplete="off" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                        <div class="row d-flex align-items-center justify-content-between">
                            <div class="col-4 text-center">
                                <a href="index.php" class="text-decoration-none">Back</a>
                            </div>
                            <div class="col-4">
                                <button name="login" type="submit" class="btn btn-success btn-sm btn-flat btn-block">Log
                                    In</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function () {
            // You can add your loader functionality here if needed
            start_loader(); // Assuming this is a function you've defined elsewhere
            end_loader();   // Assuming this is another function to stop the loader
        })
    </script>
    <?php include "dependency/dependency_bottom.php" ?>
</body>

</html>