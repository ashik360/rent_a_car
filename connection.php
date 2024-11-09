<?php
// Database credentials
$dbhost = 'localhost';     // Database host (usually 'localhost')
$dbname = 'rent_car'; // Database name
$dbuser = 'root';      // Database username
$dbpass = '';      // Database password

// Establish a connection to the database
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

