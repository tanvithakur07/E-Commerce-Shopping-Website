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
