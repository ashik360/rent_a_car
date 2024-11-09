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
    <?php include "dependency/dependency_top.php" ?>
    <style>
        /* Add some space on the left and right of the page */
        .no-br {
            border-left: none !important;
        }

        body {
            padding-left: 15px;
            padding-right: 15px;
        }

        /* Ensure .container-fluid takes full width and applies margin for spacing */
        .container-fluid {
            padding-left: 15px;
            padding-right: 15px;
        }

        /* Center the heading and apply background color */
        .card-header.bg-green {
            background-color: #28a745;
            /* Green background */
            color: white;
            /* Text color for contrast */
        }

        /* Center the heading text and add margin */
        .card-header h2 {
            margin: 0;
            padding: 10px;
        }

        /* Center the form inside the card */
        .card-body {
            text-align: center;
        }

        /* Style for the submit button */
        .btn-primary {
            margin-top: 10px;
        }
    </style>
    <!-- 
    - favicon
  -->
    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml" />

    <!-- 
    - custom css link
  -->

    <!-- 
    - Bootstrap link
  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./assets/css/style.css" />

    <!-- 
    - google font link
  -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&family=Open+Sans&display=swap"
        rel="stylesheet" />
</head>

<body>
    <!-- 
    - #HEADER
  -->

    <main>
        <article>
            <section class="admin pt-5 mt-5">
                <div class="container-fluid text-center">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div class="card">
                                <div class="card-header text-center bg-green text-white">
                                    <h2 class="my-3">Add A New Car</h2>
                                </div>
                                <div class="card-body no-br text-start">
                                <form action="upload_car.php" method="POST" enctype="multipart/form-data">
    <!-- Car Registration Code -->
    <div class="mb-3">
        <label for="reg_code" class="form-label">Registration Code</label>
        <input type="text" class="form-control" id="reg_code" name="reg_code" required>
    </div>
    <!-- Car Model -->
    <div class="mb-3">
        <label for="car_model" class="form-label">Car Model</label>
        <input type="text" class="form-control" id="car_model" name="car_model" required>
    </div>
    <!-- Car licence -->
    <div class="mb-3">
        <label for="car_licence" class="form-label">Car Model</label>
        <input type="text" class="form-control" id="car_licence" name="car_licence" required>
    </div>
    <!-- Car Year -->
    <div class="mb-3">
        <label for="car_year" class="form-label">Car Year</label>
        <input type="number" class="form-control" id="car_year" name="car_year" required>
    </div>
    <!-- Max People -->
    <div class="mb-3">
        <label for="max_people" class="form-label">Max People</label>
        <input type="number" class="form-control" id="max_people" name="max_people" required>
    </div>
    <!-- Car Km/Hour -->
    <div class="mb-3">
        <label for="car_kmpl" class="form-label">Car Km/Hour</label>
        <input type="number" step="any" class="form-control" id="car_kmpl" name="car_kmpl" required>
    </div>
    <!-- Car Type -->
    <div class="mb-3">
        <label for="car_type" class="form-label">Car Type</label>
        <input type="text" class="form-control" id="car_type" name="car_type" required>
    </div>
    <!-- Car Category -->
    <div class="mb-3">
        <label for="car_cat_id" class="form-label">Car Category</label>
        <select class="form-select" id="car_cat_id" name="car_cat_id" required>
            <option value="" disabled selected>Select Category</option>
            <option value="1">Sedan</option>
            <option value="2">SUV</option>
            <option value="3">Hatchback</option>
            <option value="4">Coupe</option>
            <option value="5">Convertible</option>
        </select>
    </div>
    <!-- Cost Per Hour -->
    <div class="mb-3">
        <label for="costs" class="form-label">Costs Per Hour (Taka)</label>
        <input type="number" class="form-control" id="costs" name="costs" required>
    </div>
    <!-- Car Images -->
    <div class="mb-3">
        <label class="form-label">Upload Car Images (max 5)</label>
        <input type="file" class="form-control" id="car_images" name="car_images[]" accept="image/*" multiple>
    </div>
    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Submit</button>
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
    <?php include "dependency/dependency_bottom.php" ?>
</body>

</html>