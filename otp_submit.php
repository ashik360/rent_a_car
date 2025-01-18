<?php
session_start();
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Combine digits into a single OTP value
    $user_otp = implode('', array_map('intval', $_POST['digit']));
    $email = $_SESSION['email']; // Get email from session

    // Query to fetch the stored OTP for the email
    $query = "SELECT otp_made FROM verified_user WHERE email = '$email' ORDER BY date_time DESC LIMIT 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row && $row['otp_made'] == $user_otp) {
        // OTP matches
        $_SESSION['user_logged_in'] = true; // Mark the user as logged in
        $_SESSION['user_email'] = $email; // Save email to session
        $_SESSION['user_phone'] = 'N/A';  // Default phone number

        // Redirect to client_area.php
        header('Location: client_area.php');
        exit();
    } else {
        // OTP does not match
        echo "Invalid OTP. Please try again.";
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #ebecf0;
        }

        .otp-letter-input {
            max-width: 100%;
            height: 50px;
            border: 1px solid #198754;
            border-radius: 10px;
            color: #198754;
            font-size: 30px;
            text-align: center;
            font-weight: bold;
        }

        .btn {
            height: 50px;
        }
    </style>
</head>

<body>
    <div class="container p-5">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 mt-5">
                <div class="bg-white p-5 rounded-3 shadow-sm border">
                    <div>
                        <form action="otp_submit.php" method="POST">
                            <p class="text-center text-success" style="font-size: 5.5rem;">
                                <i class="fas fa-envelope-circle-check"></i>
                            </p>
                            <p class="text-center h5">Please check your email</p>
                            <p class="text-muted text-center">We've sent a code to your email.</p>
                            <div class="row pt-4 pb-2">
                                <?php for ($i = 1; $i <= 6; $i++): ?>
                                    <div class="col-2">
                                        <input id="otp<?= $i ?>" class="otp-letter-input" type="text" name="digit[]"
                                            maxlength="1" required>
                                    </div>
                                <?php endfor; ?>
                            </div>
                            <p class="text-muted text-center">Didn't get the code? <a href="#">Click to resend.</a></p>
                            <div class="row pt-5">
                                <div class="col-6">
                                    <a href="otp_form.php" class="btn btn-outline-secondary w-100">Cancel</a>
                                </div>
                                <div class="col-6">
                                    <button type="submit" class="btn btn-success w-100">Verify</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript to handle auto focus -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const inputs = document.querySelectorAll('.otp-letter-input');
            inputs.forEach((input, index) => {
                input.addEventListener('input', function () {
                    if (this.value.length === this.maxLength && index < inputs.length - 1) {
                        inputs[index + 1].focus();
                    }
                });
            });
        });
    </script>
</body>

</html>