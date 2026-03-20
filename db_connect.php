<?php
$host = "127.0.0.1:3307"; 
$username = "root";
$password = ""; 
$database = "aura_coffee";

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
