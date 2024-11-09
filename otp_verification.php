<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize email input
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

    // Generate OTP (you can use a library for better OTP generation)
    $otp = mt_rand(100000, 999999); // Example OTP generation (6 digits)

    // Save OTP and email in session for verification
    $_SESSION["otp"] = $otp;
    $_SESSION["email"] = $email;

    // Send OTP via email (you should replace this with actual email sending code)
    // mail($email, "Your OTP", "Your OTP is: $otp");

    // Redirect to OTP submission page
    header("Location: otp_submit.php");
    exit();
}
?>
