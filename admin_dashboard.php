<?php
require 'auth_check.php';

if ($_SESSION['user_role'] !== 'admin') {
    echo "Access denied!";
    exit;
}
?>

<h1>Welcome Admin, <?= $_SESSION['user_name'] ?></h1>
<a href="logout.php">Logout</a>

