<?php
include '../local/connection.php';
extract($_POST);
session_start();
$administered_by = $_SESSION['email'];

$sql = "UPDATE appointments SET status = '$status' WHERE id = '$childId'";
$result = mysqli_query($conn, $sql);


$sql = "SELECT * FROM appointments WHERE id = '$childId'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$child_id = $row['child_id'];
$vaccine_id = $row['vaccine_id'];
$hospital_id = $row['hospital_id'];
$administered_date = $row['appointment_date'];

$sql = "INSERT INTO vaccination_history (child_id, vaccine_id, hospital_id, administered_date, administered_by, notes) VALUES ('$child_id', '$vaccine_id', '$hospital_id', '$administered_date', '$administered_by', '$notes')";


$result = mysqli_query($conn, $sql);

if($result){
    echo 'success';
}else{
    echo 'failed';
}


?>
