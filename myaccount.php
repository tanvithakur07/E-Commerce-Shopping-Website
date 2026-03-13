<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: loginform.html");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "Tanvi9903@";
$database = "rarebeauty";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user = $_SESSION['username'];
$sql = "SELECT * FROM customers WHERE name = '$user'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $data = $result->fetch_assoc();
} else {
    echo "User not found.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>My Account</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>

body{
font-family: Arial, sans-serif;
padding:30px;
margin:0;
}

/* account card */

.card{
border:1px solid #ddd;
padding:25px;
width:350px;
margin:0 auto;
text-align:center;
border-radius:10px;
box-shadow:0 0 15px rgba(0,0,0,0.1);
}

/* logout button */

.logout-btn{
margin-top:20px;
padding:10px 20px;
background-color:crimson;
color:white;
text-decoration:none;
border-radius:8px;
display:inline-block;
}

/* ================= PHONE VIEW ================= */

@media screen and (max-width:768px){

body{
padding:15px;
}

/* card becomes flexible */

.card{
width:90%;
max-width:350px;
padding:20px;
}

/* text slightly smaller */

.card h2{
font-size:22px;
}

.card p{
font-size:16px;
}

/* button full width */

.logout-btn{
width:100%;
box-sizing:border-box;
}

}

</style>
</head>
<body>
  <div class="card">
    <h2>Welcome, <?php echo htmlspecialchars($data['name']); ?> 👋</h2>
	<p><strong>Name:</strong> <?php echo htmlspecialchars($data['name']); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($data['email']); ?></p>
	<p><strong>Contact No:</strong> <?php echo htmlspecialchars($data['contact_no']); ?></p>
    <!-- Add more user fields as needed -->
<br><br>
    <a href="logout.php" class="logout-btn">Logout</a>
  </div>
</body>
</html>
