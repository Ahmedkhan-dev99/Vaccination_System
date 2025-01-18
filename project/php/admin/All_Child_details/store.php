<?php
include_once '../../local/connection.php';

extract($_POST);


// Update child details
 $sql1 = "UPDATE children SET name = '$name',dob = '$dob',gender = '$gender',blood_group = '$blood_group' WHERE id = '$id'";

// Update parent details
 $sql2 = "UPDATE users u JOIN children c ON u.id = c.parent_id SET u.name = '$parent_name',u.contact = '$contact',u.address = '$address' WHERE c.id = '$id'";

$result1 = mysqli_query($conn, $sql1);
$result2 = mysqli_query($conn, $sql2);

if($result1 && $result2){
    echo 'success';
} else {
    echo 'Failed';
}
?>