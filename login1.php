<?php
session_start();

include 'connection.php';

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Query the database for the user
  $query = "SELECT * FROM user WHERE username = '$username' && password = '$password'";
  $result = mysqli_query($conn, $query);
  $rows = mysqli_num_rows($result);

  if ($rows > 0) {
    $_SESSION['username'] = $username;
    header('location:dash_admin.php');
  } else {
    echo "Failed";
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>Rent your favourite car</title>

  <?php include "dependency/dependency_top.php" ?>
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
</head>

<body class="login1-body d-flex justify-content-center align-items-center">
  <form class="d-flex align-items-center flex-column  justify-content-center" class="form-signin" method="POST"
    action="">
    <div class="d-flex justify-content-center">
      <!-- <i class="fas fa-car-side fa-4x"></i> -->
      <a href="index.php">
        <img src="assets/images/lg.png" alt="" />
      </a>
    </div>
    <h1 class="h3 mb-3 font-weight-normal">Rent A Car Admin</h1>
    <label for="inputUname" class="sr-only">Username</label>
    <input type="text" name="username" id="inputUname" class="form-control" placeholder="Username" required />
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required />
    <div class="d-grid gap-2 col-12 d-block mt-3">
      <button class="btn btn-primary rounded" name="login" type="submit">Login
      </button>
    </div>
    <p class="mt-5 mb-3 text-muted">&copy; 2024 ashik360</p>
  </form>

  <script src="https://code.jquery.com/jquery-migrate-3.4.0.min.js"></script>
</body>

</html>