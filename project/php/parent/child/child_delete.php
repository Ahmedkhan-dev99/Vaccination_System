<?php
include '../../local/connection.php';

$childId = $_GET['childId'];

// First delete related appointments
$sql_appointments = "DELETE FROM appointments WHERE child_id = $childId";
$result_appointments = mysqli_query($conn, $sql_appointments);

// Then delete the child record
$sql_child = "DELETE FROM children WHERE id = $childId";
$result_child = mysqli_query($conn, $sql_child);

if($result_appointments && $result_child){
    echo "success";
}else{
    echo "failed";
}

?>