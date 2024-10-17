<?php
$servername = "localhost";
$username = "root";
$password = "" ;

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo "<script type='text/javascript'>alert('Database Connected');</script>";

?>

