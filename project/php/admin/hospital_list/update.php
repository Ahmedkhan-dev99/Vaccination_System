<?php 

include '../../local/connection.php';

extract($_POST);

$sql = "UPDATE hospitals SET name='$name', registration='$registration', email='$email', phone='$phone', city='$city', address='$address', status='$status' WHERE id='$hospital_id'";

$result = mysqli_query($conn, $sql);

if($result){
    echo "success";
}else{
    echo "failed";
}

?>