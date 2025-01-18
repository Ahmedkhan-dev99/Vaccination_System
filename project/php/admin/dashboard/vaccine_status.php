<?php

include '../../local/connection.php';

$sql = "SELECT * FROM appointments ";
$result = mysqli_query($conn, $sql);
$total_children = mysqli_num_rows($result);

$sql = "SELECT * FROM appointments WHERE status='completed'";
$result = mysqli_query($conn, $sql);
$vaccinated = mysqli_num_rows($result);

$sql = "SELECT * FROM appointments WHERE status='pending' OR status='next_dose' OR status='cancelled'";
$result = mysqli_query($conn, $sql);
$pending = mysqli_num_rows($result);


$output = '';
$output = '<div class="card border-0 shadow-sm mb_30">
                    <div class="card-header bg-transparent border-0">
                        <h3 class="card-title mb-0" style="color: #6a11cb;"><i class="fas fa-syringe me-2"></i>Vaccination Status</h3>
                    </div>
                    <div class="card-body" style="background: rgba(255, 255, 255, 0.95);">
                        <div class="single_wrap">
                            <div class="d-flex align-items-center p-3 border-bottom">
                                <div class="flex-grow-1">
                                    <h4 class="f_s_18 f_w_700 mb-0" style="color: #6a11cb;">Total Children</h4>
                                    <small class="text-muted">Registered in system</small>
                                </div>
                                <span class="badge rounded-pill fs-6" style="background: linear-gradient(45deg, #6a11cb, #2575fc); color: white;">'.$total_children.'</span>
                            </div>
                            <div class="d-flex align-items-center p-3 border-bottom">
                                <div class="flex-grow-1">
                                    <h4 class="f_s_18 f_w_700 mb-0" style="color: #6a11cb;">Vaccinated</h4>
                                    <small class="text-muted">Completed vaccination</small>
                                </div>
                                <span class="badge rounded-pill fs-6" style="background: linear-gradient(45deg, #2ecc71, #27ae60); color: white;">'.$vaccinated.'</span>
                            </div>
                            <div class="d-flex align-items-center p-3">
                                <div class="flex-grow-1">
                                    <h4 class="f_s_18 f_w_700 mb-0" style="color: #6a11cb;">Pending</h4>
                                    <small class="text-muted">Awaiting vaccination</small>
                                </div>
                                <span class="badge rounded-pill fs-6" style="background: linear-gradient(45deg, #ff6491, #ff8d72); color: white;">'.$pending.'</span>
                            </div>
                        </div>
                    </div>
                </div>';

echo $output;

?>