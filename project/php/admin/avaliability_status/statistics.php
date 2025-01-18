<?php
include '../../local/connection.php';

$sql = "SELECT count(*) as available FROM hospital_vaccines WHERE current_stock = 'Available'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$available = $row['available'];

$output = '';
$output = '<div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle p-3" style="background: linear-gradient(45deg, #2ecc71, #27ae60);">
                                <i class="fas fa-check-circle fa-2x" style="color: white;"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-1" style="color: #6a11cb;">Available Vaccines</h6>
                                <h4 class="mb-0" style="color: #2575fc;">'.$available.'</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';

$sql = "SELECT count(*) as low_stock FROM hospital_vaccines WHERE current_stock = 'Low Stock'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$low_stock = $row['low_stock'];

$output .= '<div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle p-3" style="background: linear-gradient(45deg, #f1c40f, #f39c12);">
                                <i class="fas fa-exclamation-circle fa-2x" style="color: white;"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-1" style="color: #6a11cb;">Low Stock Vaccines</h6>
                                <h4 class="mb-0" style="color: #2575fc;">'.$low_stock.'</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';

$sql = "SELECT count(*) as out_of_stock FROM hospital_vaccines WHERE current_stock = 'Out of Stock'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$out_of_stock = $row['out_of_stock'];

$output .= '<div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle p-3" style="background: linear-gradient(45deg, #e74c3c, #c0392b);">
                                <i class="fas fa-times-circle fa-2x" style="color: white;"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-1" style="color: #6a11cb;">Out of Stock</h6>
                                <h4 class="mb-0" style="color: #2575fc;">'.$out_of_stock.'</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';

echo $output;

?>