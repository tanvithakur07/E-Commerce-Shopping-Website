<?php
session_start();
include("dbconnect.php");

if (!isset($_SESSION['username'])) {
    echo "<!DOCTYPE html>
        <html>
        <head>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        </head>
        <body>
            <script>
                Swal.fire({
                    icon: 'warning',
                    title: 'Please Login to add to cart!',
                    showConfirmButton: false,
                    timer: 2100
                }).then(() => {
                    window.location.href = 'loginform.html';
                });
            </script>
        </body>
        </html>";
    exit;
}

$user_name = $_SESSION['username'];
$product_name = $_POST['product_name'] ?? '';
$price = $_POST['price'] ?? '';
$product_image = $_POST['product_image'] ?? '';

if ($product_name && $price && $product_image) {
    $query = "INSERT INTO cart (user_name, product_name, price, product_image) 
              VALUES ('$user_name', '$product_name', '$price', '$product_image')";
    if (mysqli_query($conn, $query)) {
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
                    title: 'Added to Cart!',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = 'cart_page.php';
                });
            </script>
        </body>
        </html>";
    } else {
        echo "Failed to add to cart.";
    }
} else {
    echo "Missing product data.";
}
?>
