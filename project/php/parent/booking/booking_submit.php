<?php

include '../../local/connection.php';

$hospitalId = $_GET['hospitalId'];
$child = $_GET['child'];
$vaccine = $_GET['vaccine'];
$date = $_GET['date'];
$time = $_GET['time'];
$notes = $_GET['notes'];

$sql = "INSERT INTO appointments (hospital_id,child_id, vaccine_id, appointment_date, appointment_time, notes) VALUES ($hospitalId, $child, $vaccine, '$date', '$time', '$notes')";
$result = mysqli_query($conn, $sql);
if($result){
    echo "success";
}else{
    echo "failed";
}


?>