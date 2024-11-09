<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Construct entered OTP from POST data
    $enteredOTP = "";
    for ($i = 1; $i <= 6; $i++) {
        if (!isset($_POST["digit$i"]) || empty($_POST["digit$i"])) {
            echo "Please enter the complete OTP.";
            exit();
        }
        $enteredOTP .= $_POST["digit$i"];
    }

    // Check if OTP is set in session
    if (isset($_SESSION["otp"])) {
        $storedOTP = $_SESSION["otp"];

        // Compare entered OTP with stored OTP
        if ($enteredOTP == $storedOTP) {
            // OTP is correct, do something (e.g., mark user as verified)
            echo "OTP Verified successfully!";
            // Optionally, clear OTP from session
            unset($_SESSION["otp"]);
            unset($_SESSION["email"]);
        } else {
            // OTP is incorrect
            echo "Invalid OTP. Please try again.";
        }
    } else {
        echo "OTP not set in session.";
    }
} else {
    echo "Invalid request.";
}
?>
