<?php
session_start();

session_unset();
?>
<?php
// Check if the user is not authenticated and redirect to the login page
if (!isset($_SESSION['username'])) {header('location:login1.php');
  exit();
}
else{
  
}
?>