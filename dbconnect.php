<?php
$servername = "localhost";
$username = "root";
$password = "Tanvi9903@";
$database = "rarebeauty"; // Change if your DB has a different name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
