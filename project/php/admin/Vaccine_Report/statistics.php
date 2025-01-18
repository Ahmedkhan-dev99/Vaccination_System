<?php
include '../../local/connection.php';

$sql = "SELECT * FROM appointments";
$result = mysqli_query($conn, $sql);
$total_vaccinations = mysqli_num_rows($result);

$output = '';
$output = '<div class="col-md-3">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle p-3" style="background: linear-gradient(45deg, #6a11cb, #2575fc);">
                                <i class="fas fa-syringe fa-2x" style="color: white;"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-1" style="color: #6a11cb;">Total Vaccinations</h6>
                                <h3 class="mb-0" style="color: #2575fc;">'.$total_vaccinations.'</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';


$sql = "SELECT * FROM appointments WHERE status = 'completed'";
$result = mysqli_query($conn, $sql);
$total_completed_vaccinations = mysqli_num_rows($result);

$output .= '<div class="col-md-3">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle p-3" style="background: linear-gradient(45deg, #2ecc71, #27ae60);">
                                <i class="fas fa-check-circle fa-2x" style="color: white;"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-1" style="color: #2ecc71;">Completed</h6>
                                <h3 class="mb-0" style="color: #27ae60;">'.$total_completed_vaccinations.'</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';


$sql = "SELECT * FROM appointments WHERE status = 'pending' or status = 'next_dose'";
$result = mysqli_query($conn, $sql);
$total_pending_vaccinations = mysqli_num_rows($result);

$output .= '<div class="col-md-3">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle p-3" style="background: linear-gradient(45deg, #f1c40f, #f39c12);">
                                <i class="fas fa-clock fa-2x" style="color: white;"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-1" style="color: #f1c40f;">Pending</h6>
                                <h3 class="mb-0" style="color: #f39c12;">'.$total_pending_vaccinations.'</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';

$sql = "SELECT * FROM appointments WHERE status = 'cancelled'";
$result = mysqli_query($conn, $sql);
$total_cancelled_vaccinations = mysqli_num_rows($result);

$output .= '<div class="col-md-3">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle p-3" style="background: linear-gradient(45deg, #ff6491, #ff8d72);">
                                <i class="fas fa-times-circle fa-2x" style="color: white;"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-1" style="color: #ff6491;">Cancelled</h6>
                                <h3 class="mb-0" style="color: #ff8d72;">'.$total_cancelled_vaccinations.'</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';


echo $output;


?>