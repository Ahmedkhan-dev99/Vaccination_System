<?php

include '../../local/connection.php';

$sql = "SELECT * FROM hospitals";
$result = mysqli_query($conn, $sql);
$total_hospitals = mysqli_num_rows($result);

$sql = "SELECT * FROM hospitals WHERE status='active'";
$result = mysqli_query($conn, $sql);
$active_hospitals = mysqli_num_rows($result);

$sql = "SELECT * FROM hospitals WHERE status='Inactive'";
$result = mysqli_query($conn, $sql);
$inactive_hospitals = mysqli_num_rows($result);


$output = '';
$output = '<div class="card border-0 shadow-sm mb_30">
                    <div class="card-header bg-transparent border-0">
                        <h3 class="card-title mb-0" style="color: #6a11cb;"><i class="fas fa-hospital me-2"></i>Hospital Status</h3>
                    </div>
                    <div class="card-body" style="background: rgba(255, 255, 255, 0.95);">
                        <div class="single_wrap">
                            <div class="d-flex align-items-center p-3 border-bottom">
                                <div class="flex-grow-1">
                                    <h4 class="f_s_18 f_w_700 mb-0" style="color: #6a11cb;">Total Hospitals</h4>
                                    <small class="text-muted">Registered facilities</small>
                                </div>
                                <span class="badge rounded-pill fs-6" style="background: linear-gradient(45deg, #6a11cb, #2575fc); color: white;">'.$total_hospitals.'</span>
                            </div>
                            <div class="d-flex align-items-center p-3 border-bottom">
                                <div class="flex-grow-1">
                                    <h4 class="f_s_18 f_w_700 mb-0" style="color: #6a11cb;">Active</h4>
                                    <small class="text-muted">Currently operating</small>
                                </div>
                                <span class="badge rounded-pill fs-6" style="background: linear-gradient(45deg, #2ecc71, #27ae60); color: white;">'.$active_hospitals.'</span>
                            </div>
                            <div class="d-flex align-items-center p-3">
                                <div class="flex-grow-1">
                                    <h4 class="f_s_18 f_w_700 mb-0" style="color: #6a11cb;">Inactive</h4>
                                    <small class="text-muted">Temporarily closed</small>
                                </div>
                                <span class="badge rounded-pill fs-6" style="background: linear-gradient(45deg, #ff6491, #ff8d72); color: white;">'.$inactive_hospitals.'</span>
                            </div>
                        </div>
                    </div>
                </div>';

echo $output;

?>