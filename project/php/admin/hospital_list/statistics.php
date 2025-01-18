<?php
include '../../local/connection.php';

$sql = "SELECT * FROM hospitals";
$result = mysqli_query($conn, $sql);
$total_hospitals = mysqli_num_rows($result);

$output = '<div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle p-3" style="background: linear-gradient(45deg, #6a11cb, #2575fc);">
                                <i class="fas fa-hospital-alt fa-2x" style="color: white;"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-1" style="color: #6a11cb;">Total Hospitals</h6>
                                <h3 class="mb-0" style="color: #2575fc;">'.$total_hospitals.'</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';

$sql = "SELECT * FROM hospitals WHERE status = 'active'";
$result = mysqli_query($conn, $sql);
$total_active_hospitals = mysqli_num_rows($result);

$output .= '<div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle p-3" style="background: linear-gradient(45deg, #2ecc71, #27ae60);">
                                <i class="fas fa-check-circle fa-2x" style="color: white;"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-1" style="color: #2ecc71;">Active Hospitals</h6>
                                <h3 class="mb-0" style="color: #27ae60;">'.$total_active_hospitals.'</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';

$sql = "SELECT * FROM hospitals WHERE status = 'inactive'";
$result = mysqli_query($conn, $sql);
$total_inactive_hospitals = mysqli_num_rows($result);

$output .= '<div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle p-3" style="background: linear-gradient(45deg, #f1c40f, #f39c12);">
                                <i class="fas fa-pause-circle fa-2x" style="color: white;"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-1" style="color: #f1c40f;">Inactive Hospitals</h6>
                                <h3 class="mb-0" style="color: #f39c12;">'.$total_inactive_hospitals.'</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
echo $output;
?>