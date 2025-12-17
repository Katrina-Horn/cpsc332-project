<?php

$host = "mariadb";      
$user = "cs332g5";    
$pass = "REDACTED";    
$db   = "cs332g5"; 

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("DB connection failed: " . $conn->connect_error);
}
?>
