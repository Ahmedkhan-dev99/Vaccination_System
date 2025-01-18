<?php
include '../../local/connection.php';


if(isset($_POST)){
    extract($_POST);

$sql = "INSERT INTO hospitals (name, registration, email, phone, address, city, status) VALUES ('$name', '$registration', '$email', '$phone', '$address', '$city', '$status')";

if(mysqli_query($conn, $sql)){
    header("Location: ../../../Add_Hospital.php?msg=success");
}else{
    header("Location: ../../../Add_Hospital.php?msg=failed");
}
  
}else{
   
}




?>