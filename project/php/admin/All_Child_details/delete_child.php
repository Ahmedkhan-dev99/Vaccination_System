<?php
include_once '../../local/connection.php';

$childId = $_POST['childId'];

// First delete related appointments
$sql_appointments = "DELETE FROM appointments WHERE child_id = $childId";
$result_appointments = mysqli_query($conn, $sql_appointments);

// Then delete the child record
$sql = "DELETE FROM children WHERE id = '$childId'";
$result_child = mysqli_query($conn, $sql);

if($result_appointments && $result_child){
    echo "success";
}else{
    echo "failed";
}

?>
