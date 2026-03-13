<?php
session_start();
include("dbconnect.php"); // connect to your MySQL database

// Check if user is logged in
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
                title: 'Please login to view your cart',
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

$username = $_SESSION['username'];

// Fetch cart items for the logged-in user
$sql = "SELECT * FROM cart WHERE user_name = '$username'";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="design.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table.cart {
            width: 80%;
            border-collapse: collapse;
            margin: auto;
        }
        table.cart th, table.cart td {
            border: 1px solid #7e1f4e;
            padding: 12px;
            text-align: center;
        }
        table.cart th {
            background-color: #d9b0bf;
        }
        h1 {
            text-align: center;
            color: #7e1f4e;
        }
        .checkout-btn, .more-products-btn {
            background-color: #7e1f4e;
            color: white;
            padding: 10px 20px;
            border: none;
            font-weight: bold;
            cursor: pointer;
            margin-top: 20px;
            border-radius: 8px;
        }
        .empty {
            text-align: center;
            font-size: 20px;
            margin-top: 40px;
        }
        .btn-container {
            text-align: center;
            margin-top: 20px;
        }

    /* ================= PHONE VIEW ================= */

@media screen and (max-width:768px){

h1{
font-size:22px;
padding:10px;
}

/* cart table becomes full width */

table.cart{
width:80%;
font-size:11px;
margin:auto;
}

/* smaller cells */

table.cart th,
table.cart td{
padding:4px;
}

/* very small product images */

table.cart img{
width:35px !important;
height:auto !important;
}

/* smaller buttons */

.checkout-btn,
.more-products-btn{
padding:6px 12px;
font-size:12px;
}

.empty{
font-size:18px;
padding:20px;
}

}
    </style>
</head>
<body>

<h1>Your Shopping Cart</h1>

<?php
if (mysqli_num_rows($result) > 0) {
    echo "<table class='cart'>
            <tr>
    <th>Image</th>
    <th>Product Name</th>
    <th>Price (₹)</th>
    <th>Quantity</th>
    <th>Total</th>
    <th>Remove</th>
</tr>";

    $grand_total = 0;

    while ($row = mysqli_fetch_assoc($result)) {
        $total = $row['price'] * $row['quantity'];
        $grand_total += $total;
        echo "<tr>
        <td><img src='{$row['product_image']}' width='60' height='60'></td>
        <td>{$row['product_name']}</td>
        <td>{$row['price']}</td>
        <td>{$row['quantity']}</td>
        <td>₹ {$total}</td>
        <td><a href='remove_from_cart.php?id={$row['id']}' style='color:red;'>Remove</a></td>
      </tr>";
    }

    echo "<tr>
            <td colspan='3' style='text-align:right; font-weight:bold;'>Grand Total</td>
            <td colspan='2'><b>₹ $grand_total</b></td>
          </tr>";
    echo "</table>";

    echo "<div class='btn-container'>
            <button class='checkout-btn'>Proceed to Checkout</button><br>
            <a href='index.html'><button class='more-products-btn'>Let's See More Products</button></a>
          </div>";
} else {
    echo "<div class='empty'>Your cart is empty.</div>";
    echo "<div class='btn-container'>
            <a href='index.html'><button class='more-products-btn'>Let's See More Products</button></a>
          </div>";
}
?>

</body>
</html>
