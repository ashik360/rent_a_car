<?php
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
require 'vendor/phpmailer/phpmailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Start session
session_start();

// Include your database connection
require 'connection.php';

// Get the email from the form
$email = $_POST['email'];

// Generate a 6-digit OTP
$otp = rand(100000, 999999);

// Store OTP in the session for validation
$_SESSION['otp'] = $otp;
$_SESSION['email'] = $email;

// PHPMailer setup
$mail = new PHPMailer(true);

try {
    // SMTP server configuration
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'ashik4745@gmail.com';
    $mail->Password = 'jukd ryvp migg pmhq';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Email content
    $mail->setFrom('ashik4745@gmail.com', 'CarDeal - Reliable way to rent a car');
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = 'Your OTP Verification Code';
    $mail->Body = '
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f9f9f9;">
        <!-- Logo and Welcome Section -->
        <div style="text-align: center; background-color: #e55039; padding: 20px;">
            <img src="assets/images/logo.png" alt="Logo" width="125" height="120" style="border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none;" />
            <h1 style="color: white; font-size: 36px; font-family: \'Lato\', sans-serif; margin-top: 20px;">Welcome!</h1>
        </div>

        <!-- Main Content -->
        <div style="background-color: #ffffff; padding: 30px; text-align: center;">
            <p style="font-size: 18px; font-family: \'Lato\', sans-serif;">Thanks for signing in. We\'re thrilled to have you here!</p>
            <h2 style="background-color: #e55039; color: white; padding: 10px 20px; font-size: 26px; border-radius: 5px; border: none;">Your OTP is: ' . $otp . '</h2>
            <p style="font-size: 18px; font-family: \'Lato\', sans-serif;">Use this code to get verified!</p>
        </div>
        
        <!-- Help Section -->
        <div style="text-align: center; background-color: #f4f4f4; padding: 20px;">
            <p style="font-size: 16px; font-family: \'Lato\', sans-serif;">If you have any questions, just reply to this email— we\'re always happy to help out.</p>
            <p style="font-size: 16px; font-family: \'Lato\', sans-serif;">Follow Us on:</p>
            <div style="text-align: center;">
                <a href="https://instagram.com/ashik36o" style="text-decoration: none; margin: 0 10px;">
                    <img src="https://cdn-icons-png.flaticon.com/512/2111/2111463.png" alt="Instagram" style="width: 30px;" />
                </a>
                <a href="https://twitter.com/ashik360" style="text-decoration: none; margin: 0 10px;">
                    <img src="https://cdn-icons-png.flaticon.com/512/733/733579.png" alt="Twitter" style="width: 30px;" />
                </a>
            </div>
        </div>

        <!-- Footer Section -->
        <div style="text-align: center; background-color: #f4f4f4; padding: 20px;">
            <p style="font-size: 18px; font-family: \'Lato\', sans-serif;">Need more help?</p>
            <a href="mailto:mail" style="background-color: red; color: white; padding: 10px 20px; font-size: 16px; text-decoration: none; border-radius: 5px;">We’re here to help you out</a> 
        </div>
    </div>
    ';

    // Send the email
    $mail->send();

    // Store the OTP in the database
    $query = "INSERT INTO verified_user (email, date_time, otp_made) VALUES ('$email', NOW(), '$otp')";
    mysqli_query($conn, $query);

    // Redirect to the OTP submit page
    header('Location: otp_submit.php');
    exit();
} catch (Exception $e) {
    echo "Error: {$mail->ErrorInfo}";
}
?>
