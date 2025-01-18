<?php 
include 'connection.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password' ";
    $result = $conn->query($sql);
    $error = mysqli_error($conn);
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $id = $row['id'];
        $role = $row['role'];
        $profile = $row['profile'];
        session_start();
        $_SESSION['user_id'] = $id;
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['role'] = $role;
        $_SESSION['profile'] = $profile;

        if($role == 'admin'){
            header("Location: ../../index.php");
        }elseif($role == 'parent'){
            header("Location: ../../parent.php");
        }elseif($role == 'hospital'){
            header("Location: ../../hospital.php");
        }
    }else{
        header("Location: ../../login.php?&error=Invalid");
      
    }
}



?>