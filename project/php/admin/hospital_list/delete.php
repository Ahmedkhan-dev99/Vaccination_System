<?php

include '../../local/connection.php';

extract($_GET);

$sql = "DELETE FROM hospitals WHERE id='$hospitalId'";

$result = mysqli_query($conn, $sql);

echo $result ? "success" : "failed";
    
?>