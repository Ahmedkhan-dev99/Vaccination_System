<?php 
session_start();
session_destroy();
header("Location: ../../login.php?role=" . $_SESSION['role']);
?>