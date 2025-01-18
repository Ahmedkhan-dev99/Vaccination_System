<?php
include '../../local/connection.php';

$id = $_POST['id'];
$add_stock = $_POST['add_stock'];
$quantity = $_POST['quantity'];

$new_quantity = $quantity + $add_stock;

$current_stock = '';
if ($new_quantity > 150) {
    $current_stock = 'Available';
} else if ($new_quantity > 100 && $new_quantity <= 150) {
    $current_stock = 'Low Stock'; 
} else {
    $current_stock = 'Out of Stock';
}

// Fixed: Only executing one UPDATE query that updates both quantity and current_stock
$sql = "UPDATE hospital_vaccines SET current_stock = '$current_stock', quantity = $new_quantity WHERE id = $id";
$result = mysqli_query($conn, $sql);

echo $result ? 'success' : 'error';
?>