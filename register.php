<?php
$servername = "localhost";
$username = "root";
$password = "Tanvi9903@";
$dbname = "rarebeauty";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$contactno = $_POST['contactno'];
$email = $_POST['email'];
$password = $_POST['password'];

// Start HTML output
echo "<!DOCTYPE html><html><head>
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
</head><body>";

if ($name == "" || $contactno == "" || $email == "" || $password == "") {
    echo "<script>
        Swal.fire({
            icon: 'warning',
            title: 'All fields are required!',
            showConfirmButton: true
        }).then(() => {
            window.history.back();
        });
    </script>";
} else {
    $sql = "INSERT INTO customers (name, contact_no, email, password) 
            VALUES ('$name', '$contactno', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Registered successfully!',
                showConfirmButton: false,
                timer: 2000
            }).then(() => {
                window.location.href = 'index.html';
            });
        </script>";
    } else {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Registration Failed!',
                text: '" . addslashes($conn->error) . "'
            });
        </script>";
    }
}

$conn->close();

echo "</body></html>";
?>
