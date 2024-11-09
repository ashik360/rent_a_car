<?php
// Start the session to access session data
session_start();

// Retrieve phone number from session
$phoneNumber = isset($_SESSION['user_phone']) ? $_SESSION['user_phone'] : null;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Congratulations!! your booking is on the way!</title>
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            /* Ensure the body takes up the full height */
            margin: 0;
        }

        .congratulation-wrapper {
            display: flex;
            /* Make this a flex container */
            flex-direction: column;
            /* Ensure content is arranged vertically */
            justify-content: center;
            /* Vertically center content */
            align-items: center;
            /* Horizontally center content */
            max-width: 550px;
            margin-inline: auto;
            box-shadow: 0 0 20px #f3f3f3;
            padding: 30px 20px;
            background-color: #fff;
            border-radius: 10px;
        }

        .congratulation-contents {
            display: flex;
            /* Ensure this is also a flex container */
            flex-direction: column;
            align-items: center;
            /* Horizontally center the contents */
            justify-content: center;
            /* Vertically center the contents */
            text-align: center;
        }

        .congratulation-contents.center-text .congratulation-contents-icon {
            margin-inline: auto;
        }

        .congratulation-contents-icon {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            height: 100px;
            width: 100px;
            background-color: #65c18c;
            color: #fff;
            font-size: 50px;
            border-radius: 50%;
            margin-bottom: 30px;
        }

        .congratulation-contents-title {
            font-size: 32px;
            line-height: 36px;
            margin: -6px 0 0;
        }

        .congratulation-contents-para {
            font-size: 16px;
            line-height: 24px;
            margin-top: 15px;
        }

        .btn-wrapper {
            display: block;
        }

        .cmn-btn.btn-bg-1 {
            background: #6176f6;
            color: #fff;
            border: 2px solid transparent;
            border-radius: 3px;
            text-decoration: none;
            padding: 5px;
        }

        /* Add this to your existing styles */
        @keyframes tickAnimation {
            0% {
                transform: scale(0);
                opacity: 0;
            }

            60% {
                transform: scale(1.2);
                opacity: 1;
            }

            100% {
                transform: scale(1);
            }
        }

        .congratulation-contents-icon i {
            animation: tickAnimation 0.6s ease-out;
        }
    </style>
</head>

<body>
    <!-- Congratulations area start -->
    <div class="congratulation-area text-center mt-5">
        <div class="container">
            <div class="congratulation-wrapper">
                <div class="congratulation-contents center-text">
                    <div class="congratulation-contents-icon">
                        <i class="fas fa-check"></i>
                    </div>
                    <h4 class="congratulation-contents-title"> Congratulations! </h4>
                    <p class="congratulation-contents-para"> Your booking is almost ready to review account info and
                        make payment visit Client_Area. </p>
                    <div class="btn-wrapper mt-4">
                        <a href="client_area.php" class="cmn-btn btn-bg-1"> Go to Client Area </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Congratulations area end -->

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>