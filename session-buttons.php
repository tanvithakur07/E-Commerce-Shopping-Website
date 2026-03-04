<?php
session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    echo '
    <div style="margin-top: 30px;">
        <span style="font-size: 20px; color: green; margin-right: 15px;">Hi, ' . htmlspecialchars($username) . ' 👋</span>
        <a href="logout.php" style="font-size: 18px; background-color: red; padding: 10px 20px; color: white; border-radius: 10px; text-decoration: none;">Logout</a>
    </div>';
} else {
    echo ''; // Not logged in, show nothing
}
?>
