<?php
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "", "rent_car");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get booking details from POST request
$car_id = $_POST['car_id'];
$total_cost = $_POST['total_cost'];
$payment_method = $_POST['payment_method'];

if ($payment_method == 'bkash') {
    // Bkash API credentials
    $app_key = 'YOUR_APP_KEY';
    $app_secret = 'YOUR_APP_SECRET';
    $username = 'YOUR_USERNAME';
    $password = 'YOUR_PASSWORD';

    // Bkash API URLs
    $auth_url = 'https://tokenized.pay.bka.sh/v1.2.0-beta/token/grant';
    $create_payment_url = 'https://tokenized.pay.bka.sh/v1.2.0-beta/payment/create';
    $execute_payment_url = 'https://tokenized.pay.bka.sh/v1.2.0-beta/payment/execute';

    // Step 1: Get OAuth Token
    $auth_data = [
        'app_key' => $app_key,
        'app_secret' => $app_secret,
    ];

    $auth_response = getBkashToken($auth_url, $auth_data, $username, $password);
    if (!$auth_response) {
        die('Failed to authenticate with Bkash.');
    }

    $token = $auth_response->id_token;

    // Step 2: Create Payment
    $create_payment_data = [
        'amount' => $total_cost,
        'currency' => 'BDT',
        'intent' => 'sale',
        'merchantInvoiceNumber' => 'INV-' . uniqid(),
    ];

    $payment_response = createBkashPayment($create_payment_url, $create_payment_data, $token);
    if (!$payment_response || !isset($payment_response->paymentID)) {
        die('Failed to create Bkash payment.');
    }

    $payment_id = $payment_response->paymentID;

    // Step 3: Execute Payment
    $execute_response = executeBkashPayment($execute_payment_url, $payment_id, $token);
    if (!$execute_response || $execute_response->transactionStatus !== 'Completed') {
        die('Payment failed or was not completed.');
    }

    // Payment successful, save booking information to the database
    $sql = "INSERT INTO bookings (car_id, name, email, phone, pickup_date, return_date, pickup_location, dropoff_location, payment_method, total_cost) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "issssssssd",
        $car_id,
        $_SESSION['booking_details']['name'],
        $_SESSION['booking_details']['email'],
        $_SESSION['booking_details']['phone'],
        $_SESSION['booking_details']['pickup_date'],
        $_SESSION['booking_details']['return_date'],
        $_SESSION['booking_details']['pickup_location'],
        $_SESSION['booking_details']['dropoff_location'],
        $payment_method,
        $total_cost
    );

    if ($stmt->execute()) {
        echo "Payment successful! Booking has been confirmed.";
    } else {
        echo "Failed to save booking details.";
    }
}

$conn->close();

// Functions to interact with Bkash API
function getBkashToken($url, $data, $username, $password) {
    $headers = [
        'Content-Type: application/json',
        'Authorization: Basic ' . base64_encode("$username:$password"),
    ];

    $response = makeHttpRequest($url, json_encode($data), $headers);
    return json_decode($response);
}

function createBkashPayment($url, $data, $token) {
    $headers = [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $token,
    ];

    $response = makeHttpRequest($url, json_encode($data), $headers);
    return json_decode($response);
}

function executeBkashPayment($url, $payment_id, $token) {
    $headers = [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $token,
    ];

    $data = ['paymentID' => $payment_id];
    $response = makeHttpRequest($url, json_encode($data), $headers);
    return json_decode($response);
}

function makeHttpRequest($url, $data, $headers) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}
?>
