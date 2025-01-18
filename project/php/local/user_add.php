<?php
include 'connection.php';

extract($_POST);

if($password !== $confirm_password) { 
    header('Location: ../../register.php?error=password_mismatch');
    exit();
}

// Check if email already exists
$check_email = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $check_email);

if(mysqli_num_rows($result) > 0) {
    header('Location: ../../register.php?error=email_exists');
    exit();
}

if($_FILES['profile_image']['name']) {
    $ext = pathinfo($_FILES['profile_image']['name'], PATHINFO_EXTENSION);
    $image_name = uniqid() . '_' . time() . '.' . $ext;
    $upload_dir = '../../img/profile/';
    !file_exists($upload_dir) && mkdir($upload_dir, 0777, true);
    !move_uploaded_file($_FILES['profile_image']['tmp_name'], $upload_dir . $image_name) && die("Error uploading file");
} else {
    $image_name = 'default.png';
}

$sql = "INSERT INTO users (profile,name, email, password, contact, address, city, role) VALUES ( '$image_name','$name', '$email','$password','$phone', '$address', '$city', '$role')";
if (mysqli_query($conn, $sql)) {
    header('Location: ../../login.php?login=success');
    exit();
} else {
    header('Location: ../../register.php?error=query_failed');
    exit();
}
