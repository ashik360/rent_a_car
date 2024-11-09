<?php
session_start();

session_unset();
?>
<?php
// Check if the user is not authenticated and redirect to the login page
if (!isset($_SESSION['username'])) {header('location:index.php');
  exit();
}
else{
  
}
?>