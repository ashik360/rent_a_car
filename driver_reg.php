<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include "dependency/dependency_top.php" ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .btn-primary {
            padding: 1vw 10vw !important;
        }

        body {
            background-color: #f7f7f7;
            font-family: 'Arial', sans-serif;
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
        }

        .card-body {
            padding: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-control {
            border-radius: 8px;
            box-shadow: none;
            padding: 10px 15px;
            font-size: 1rem;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .input-group-text {
            background-color: #f0f0f0;
            border: 1px solid #ddd;
            border-radius: 8px 0 0 8px;
            padding: 14px 15px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            font-size: 1.1rem;
            padding: 12px;
            border-radius: 8px;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .divider-text {
            position: relative;
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .divider-text span {
            padding: 7px;
            font-size: 14px;
            position: relative;
            z-index: 2;
            background-color: #fff;
        }

        .divider-text:after {
            content: "";
            position: absolute;
            width: 100%;
            border-bottom: 1px solid #ddd;
            top: 55%;
            left: 0;
            z-index: 1;
        }

        ion-icon {
            display: inline!important;
        }
    </style>
</head>

<body>

    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="card bg-light">
            <article class="card-body text-center mx-auto" style="max-width: 600px;">
                <div class="d-flex justify-content-center flex-column align-items-center">
                    <h4 class="card-title text-center">Create Account</h4>
                    <img  src="assets/images/1648050060_cbslg.png" alt="" srcset="">
                    <p class="text-center">Fill Out This Form To Get Started</p>
                </div>

                <form action="driver_reg_process.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        </div>
                        <input name="fullname" class="form-control" placeholder="Full name" type="text" required>
                    </div> <!-- form-group// -->

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                        </div>
                        <input name="username" class="form-control" placeholder="Username" type="text" required>
                    </div> <!-- form-group// -->

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                        </div>
                        <select class="custom-select" style="max-width: 100px;">
                            <option selected="">+88</option>
                        </select>
                        <input name="phone" class="form-control" placeholder="Phone number" type="text" required>
                    </div> <!-- form-group// -->

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-file"></i> </span>
                        </div>
                        <input title="Upload Your Driving License Here!! Max: 1MB" class="form-control form-control-md"
                            id="formFilemd" name="license" type="file" />
                    </div> <!-- form-group end.// -->

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input class="form-control" name="password" placeholder="Create password" type="password" required>
                    </div> <!-- form-group// -->

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input class="form-control" name="confirmPassword" placeholder="Repeat password" type="password" required>
                    </div> <!-- form-group// -->

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block mt-3"> Create Account </button>
                    </div> <!-- form-group// -->

                    <p class="text-center">Already have an account? <a href="driver_login.php">Log In</a></p>
                </form>
            </article>
        </div> <!-- card.// -->
    </div>

    <?php include "dependency/dependency_bottom.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>
</body>

</html>