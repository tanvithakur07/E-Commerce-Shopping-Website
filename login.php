<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "Tanvi9903@";
$database = "rarebeauty";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['user'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM customers WHERE name='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows == 1) {
        $_SESSION['username'] = $username;

        echo "
        <!DOCTYPE html>
        <html>
        <head>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        </head>
        <body>
        <script>
            Swal.fire({
              icon: 'success',
              title: 'Login Successful!',
              showConfirmButton: false,
              timer: 1500
            }).then(() => {
              window.location.href = 'dashboard.php';
            });
        </script>
        </body>
        </html>";
    } else {
        echo "
        <!DOCTYPE html>
        <html>
        <head>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        </head>
        <body>
        <script>
            Swal.fire({
              icon: 'error',
              title: 'Invalid login details!',
              showConfirmButton: true
            }).then(() => {
              window.location.href = 'loginform.html';
            });
        </script>
        </body>
        </html>";
    }
}
?>
