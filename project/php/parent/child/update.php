<?php
include '../../local/connection.php';
$childId = $_POST['childId'];
$name = $_POST['name'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$blood_group = $_POST['blood_group'];

 $sql = "UPDATE children SET name = '$name', dob = '$dob', gender = '$gender', blood_group = '$blood_group' WHERE id = '$childId'";

$result = mysqli_query($conn, $sql);

if($result){
    echo "success";
}else{
    echo "Failed";
}


?>