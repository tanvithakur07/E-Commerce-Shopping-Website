<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: loginform.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: Arial;
            text-align: center;
            margin-top: 100px;
        }
        .btn {
            font-size: 20px;
            padding: 10px 25px;
            background-color: #e9c9d9;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }
        h2 {
            color: #7e1f4e;
        }
        /* ================= PHONE VIEW ================= */

@media screen and (max-width:768px){

body{
margin-top:60px;
padding:15px;
}

/* welcome heading */

h2{
font-size:24px;
}

/* paragraph */

p{
font-size:18px;
}

/* button */

.btn{
font-size:18px;
padding:10px 20px;
width:80%;
max-width:250px;
}

}
    </style>
</head>
<body>
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <p>Ready to shop?</p>
    <form action="index.html" method="get">
        <button type="submit" class="btn">Let's Shop!</button>
    </form>
</body>
</html>
