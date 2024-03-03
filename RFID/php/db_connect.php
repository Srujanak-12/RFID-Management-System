<?php

$hostname = "localhost"; 
$username = "root"; 
$password = "qazmlp123<>?"; 
$database_name = "rfid"; 


$conn = mysqli_connect($hostname, $username, $password, $database_name);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully";


mysqli_close($conn);
?>
