<?php
session_start();
if (isset($_SESSION['username'])) {
    echo '<form action="logout.php" method="post">
            <button style="position:absolute;top:20px;right:20px;padding:8px 20px;border:none;background:#e9c9d9;border-radius:8px;font-size:16px;cursor:pointer;">
                Logout
            </button>
          </form>';
}
?>
