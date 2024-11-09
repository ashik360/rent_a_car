<?php
include 'connection.php';
?>
<?php
session_start();
?>
<?php
// Check if the user is not authenticated and redirect to the login page
if (!isset($_SESSION['username'])) {
  header('location:login1.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Rent your favourite car</title>

  <?php include 'dependency/dependency_top.php' ?>
</head>

<body class="zoom-fix">
  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>
    <div class="container">
      <div class="overlay" data-overlay></div>

      <a href="#" class="logo">
        <img src="./assets/images/logo.png" alt="logo" />
      </a>

      <nav class="navbar" data-navbar>
        <ul class="navbar-list">
          <li>
            <a href="index.php" class="navbar-link" data-nav-link>Home</a>
          </li>

          <li>
            <a href="#featured-car" class="navbar-link" data-nav-link>Explore cars</a>
          </li>

          <li>
            <a href="#" class="navbar-link" data-nav-link>About us</a>
          </li>

          <li>
            <a href="#blog" class="navbar-link" data-nav-link>Blog</a>
          </li>
        </ul>
      </nav>

      <div class="header-actions">
        <div class="header-contact">
          <a href="tel:88002345678" class="contact-link">8 800 234 56 78</a>

          <span class="contact-time">Mon - Sat: 9:00 am - 6:00 pm</span>
        </div>

        <a href="#featured-car" class="btn" aria-labelledby="aria-label-txt">
          <ion-icon name="car-outline"></ion-icon>

          <span id="aria-label-txt">Explore cars</span>
        </a>

        <a href="#" class="btn user-btn" aria-label="Profile">
          <ion-icon name="person-outline"></ion-icon>
        </a>

        <button class="nav-toggle-btn" data-nav-toggle-btn aria-label="Toggle Menu">
          <span class="one"></span>
          <span class="two"></span>
          <span class="three"></span>
        </button>
      </div>
    </div>
  </header>

  <main>
    <article>
      <!-- 
        - #Admin HERO
      -->
      <section class="admin pt-5 mt-5">
        <div class="container-fluid text-center">
          <div class="row">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-2 admin-menus position-fixed sticky-top mt-9"
                  style="height: 100vh; overflow-y: auto;">
                  <h2 class="mt-2 mb-4" style="color: var(--white)">Menu</h2>
                  <a class="" href="dash_admin.php">
                    <div class="card mb-3 mt-2 c-hover" style="max-width: 540px; padding: 0.8rem 0">
                      <div class="row g-0">
                        <div class="col-md-2"></div>
                        <div class="col-md-8 d-flex justify-content-start align-items-center">
                          <span><i class="nav-icon fas fa-tachometer-alt me-1"></i></span>
                          <span class="admin-list">Dashboard </span>
                        </div>
                        <div class="col-md-2"></div>
                      </div>
                    </div>
                  </a>
                  <a class="" href="#">
                    <div class="card mb-3 mt-2 c-hover" style="max-width: 540px; padding: 0.8rem 0">
                      <div class="row g-0">
                        <div class="col-md-2"></div>
                        <div class="col-md-8 d-flex justify-content-start align-items-center">
                          <span><i class="nav-icon fas fa-tachometer-alt me-1"></i></span>
                          <span class="admin-list">Car Management</span>
                        </div>
                        <div class="col-md-2"></div>
                      </div>
                    </div>
                  </a>
                  <a class="" href="categ_admin.php">
                    <div class="card mb-3 mt-2 c-hover" style="max-width: 540px; padding: 0.8rem 0">
                      <div class="row g-0">
                        <div class="col-md-2"></div>
                        <div class="col-md-8 d-flex justify-content-start align-items-center">
                          <span><i class="nav-icon fas fa-tachometer-alt me-1"></i></span>
                          <span class="admin-list">Manage Categories</span>
                        </div>
                        <div class="col-md-2"></div>
                      </div>
                    </div>
                  </a>
                  <a class="" href="book_admin.php">
                    <div class="card mb-3 mt-2 c-hover" style="max-width: 540px; padding: 0.8rem 0">
                      <div class="row g-0">
                        <div class="col-md-2"></div>
                        <div class="col-md-8 d-flex justify-content-start align-items-center">
                          <span><i class="nav-icon fas fa-tachometer-alt me-1"></i></span>
                          <span class="admin-list">View Bookings</span>
                        </div>
                        <div class="col-md-2"></div>
                      </div>
                    </div>
                  </a>
                  <a class="" href="reg_users.php">
                    <div class="card mb-3 mt-2 c-hover" style="max-width: 540px; padding: 0.8rem 0">
                      <div class="row g-0">
                        <div class="col-md-2"></div>
                        <div class="col-md-8 d-flex justify-content-start align-items-center">
                          <span><i class="nav-icon fas fa-tachometer-alt me-1"></i></span>
                          <span class="admin-list">Registered Users</span>
                        </div>
                        <div class="col-md-2"></div>
                      </div>
                    </div>
                  </a>
                  <a class="" href="#">
                    <div class="card mb-3 mt-2 c-hover" style="max-width: 540px; padding: 0.8rem 0">
                      <div class="row g-0">
                        <div class="col-md-2"></div>
                        <div class="col-md-8 d-flex justify-content-start align-items-center">
                          <span><i class="nav-icon fas fa-tachometer-alt me-1"></i></span>
                          <span class="admin-list">Drivers</span>
                        </div>
                        <div class="col-md-2"></div>
                      </div>
                    </div>
                  </a>
                  <a class="" href="#">
                    <div class="card mb-3 mt-2 c-hover" style="max-width: 540px; padding: 0.8rem 0">
                      <div class="row g-0">
                        <div class="col-md-2"></div>
                        <div class="col-md-8 d-flex justify-content-start align-items-center">
                          <span><i class="nav-icon fas fa-tachometer-alt me-1"></i></span>
                          <span class="admin-list">Settings</span>
                        </div>
                        <div class="col-md-2"></div>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-md-10 offset-md-2">
                  <div class="card">
                    <div class="card-header">
                      <div class="row">
                        <div class="col-md-3 fs-3 d-flex flex-start">
                          List Of Cars
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-3 d-flex justify-content-end">
                          <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle rounded d-inline-flex profile-btn"
                              type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <div class="col-md-3 rounded-2">
                                <ion-icon name="person-outline" role="img" class="md hydrated"
                                  aria-label="person outline"></ion-icon>
                              </div>
                              Administrator
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="#">Profile</a></li>
                              <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-header">
                      <div class="row">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-3 d-flex justify-content-end">
                          <a href="addcar.php">
                            <button class="btn-white rounded" type="button">
                              <i class="fa-solid fa-plus"></i>
                              Add A New Car
                            </button>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="table-top my-3 d-flex">
                      <div class="table-top-left d-inline-flex">
                        <span>Showing Entries:</span>
                        <input type="number" name="" id="" />
                      </div>
                      <div class="table-top-right d-inline-flex justify-content-end">
                        <span>Search:</span>
                        <input type="number" name="" id="" />
                      </div>
                    </div>
                    <div class="table-elements">
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Model</th>
        <th>Car year</th>
        <th>Max people</th>
        <th>Km/Litre</th>
        <th>Status</th>
        <th>Costs</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // Database connection settings
      require 'connection.php';

      // SQL query to retrieve all cars
      $sql = "SELECT * FROM car_list";
      $result = $conn->query($sql);

      if ($result === false) {
        // If query fails, display error message
        echo "Error: " . $conn->error;
      } else {
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) { ?>
            <tr>
              <td><strong><?php echo $row['id']; ?></strong></td> <!-- ID in bold -->
              <td><?php echo $row['car_model']; ?></td>
              <td><?php echo $row['car_year']; ?></td>
              <td><?php echo $row['max_people']; ?></td>
              <td><?php echo $row['car_kmpl']; ?></td>
              <td><?php echo $row['status']; ?></td>
              <td><?php echo $row['costs']; ?></td>
              <td>
                <!-- Action buttons -->
                <div class="btn-group">
                  <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Action
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item dp-edit" href="#"><i class="fa-solid fa-pen-to-square px-1"></i>Edit</a></li>
                    <li><a class="dropdown-item dp-delete" href="#"><i class="fa-solid fa-trash px-1"></i>Delete</a></li>
                  </ul>
                </div>
              </td>
            </tr>
          <?php
          }
        } else {
          echo '<p>No car details found.</p>';
        }
      }

      $conn->close();
      ?>
    </tbody>
  </table>
</div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </section>
    </article>
  </main>
<?php include "dependency/dependency_bottom.php" ?>
</body>

</html>