<?php
include '../../local/connection.php';

$name = $_POST['name'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$blood_group = $_POST['blood_group'];
$parent_id = $_POST['parent_id'];

$sql = "INSERT INTO children (name, dob, gender, blood_group, parent_id) VALUES ('$name', '$dob', '$gender', '$blood_group', '$parent_id')";

$result = $conn->query($sql);

if($result){
    echo "success";
}else{
    echo "Failed";
}

?>