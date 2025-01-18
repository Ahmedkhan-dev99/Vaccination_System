<?php

include '../../local/connection.php';

$sql = "SELECT * FROM appointments";
$result = mysqli_query($conn, $sql);
$total_appointments = mysqli_num_rows($result);

$sql = "SELECT * FROM appointments WHERE status='completed'";
$result = mysqli_query($conn, $sql);
$completed_appointments = mysqli_num_rows($result);

$sql = "SELECT * FROM appointments WHERE status='pending' OR status='next_dose' OR status='cancelled'";
$result = mysqli_query($conn, $sql);
$pending_appointments = mysqli_num_rows($result);

$sql = "SELECT * FROM appointments WHERE status='cancelled'";
$result = mysqli_query($conn, $sql);
$cancelled_appointments = mysqli_num_rows($result);

echo $output = $completed_appointments . ',' . $pending_appointments . ',' . $cancelled_appointments;

?>