<?php
include '../../local/connection.php';
extract($_POST);

// Check if vaccine already exists for this hospital
$check_sql = "SELECT * FROM hospital_vaccines WHERE hospital_id = '$hospital_id' AND vaccine_id = '$vaccine_id'";
$check_result = mysqli_query($conn, $check_sql);

if(mysqli_num_rows($check_result) > 0) {
    echo "duplicate"; // Vaccine already exists for this hospital
    exit();
}

$current_stock = '';
if ($quantity > 150) {
    $current_stock = 'Available';
} else if ($quantity > 100 && $quantity <= 150) {
    $current_stock = 'Low Stock'; 
} else {
    $current_stock = 'Out of Stock';
}

$SQL = "INSERT INTO hospital_vaccines (hospital_id, vaccine_id, quantity, current_stock) VALUES ('$hospital_id', '$vaccine_id', '$quantity', '$current_stock')";
$result = mysqli_query($conn, $SQL);

if($result){
    echo "success";
}else{
    echo "error";
}

?>