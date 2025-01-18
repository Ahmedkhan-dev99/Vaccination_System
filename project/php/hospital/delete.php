<?php
include '../local/connection.php';
$id = $_POST['childId'];
$note = $_POST['reason'];


$sql = "UPDATE appointments SET status='cancelled', notes='$note' WHERE id='$id'";

if(mysqli_query($conn, $sql)) {
    echo "success";
} else {
    echo "error";
}

mysqli_close($conn);
?>