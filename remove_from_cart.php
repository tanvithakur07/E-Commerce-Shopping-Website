<?php
include("dbconnect.php");

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: loginform.html");
    exit();
}

$id = $_GET['id'];
$sql = "DELETE FROM cart WHERE id = $id";
mysqli_query($conn, $sql);

// Show SweetAlert2 confirmation
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
            title: 'Removed from Cart!',
            showConfirmButton: false,
            timer: 1500
        }).then(() => {
            window.location.href = 'cart_page.php';
        });
    </script>
</body>
</html>";
?>
