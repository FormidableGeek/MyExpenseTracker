<?php
session_start();
echo $_SESSION['name'];
session_destroy();
session_unset();
header('location:index.php');
?>