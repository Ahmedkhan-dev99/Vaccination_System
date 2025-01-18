<?php

include '../../local/connection.php'; 

$sql = "SELECT * FROM vaccines";
$result = mysqli_query($conn, $sql);
$total_vaccines = mysqli_num_rows($result);

$sql = "SELECT * FROM vaccines WHERE status='available'";
$result = mysqli_query($conn, $sql);
$available_vaccines = mysqli_num_rows($result);

$sql = "SELECT * FROM vaccines WHERE status IN ('Low Stock', 'Out of Stock')";
$result = mysqli_query($conn, $sql);
$out_of_stock_vaccines = mysqli_num_rows($result);

$output = '';
$output = '<div class="card border-0 shadow-sm mb_30">
                    <div class="card-header bg-transparent border-0">
                        <h3 class="card-title mb-0" style="color: #6a11cb;"><i class="fas fa-vial me-2"></i>Vaccine Availability</h3>
                    </div>
                    <div class="card-body" style="background: rgba(255, 255, 255, 0.95);">
                        <div class="single_wrap">
                            <div class="d-flex align-items-center p-3 border-bottom">
                                <div class="flex-grow-1">
                                    <h4 class="f_s_18 f_w_700 mb-0" style="color: #6a11cb;">Total Vaccines</h4>
                                    <small class="text-muted">Types available</small>
                                </div>
                                <span class="badge rounded-pill fs-6" style="background: linear-gradient(45deg, #6a11cb, #2575fc); color: white;">'.$total_vaccines.'</span>
                            </div>
                            <div class="d-flex align-items-center p-3 border-bottom">
                                <div class="flex-grow-1">
                                    <h4 class="f_s_18 f_w_700 mb-0" style="color: #6a11cb;">Available</h4>
                                    <small class="text-muted">In stock</small>
                                </div>
                                <span class="badge rounded-pill fs-6" style="background: linear-gradient(45deg, #2ecc71, #27ae60); color: white;">'.$available_vaccines.'</span>
                            </div>
                            <div class="d-flex align-items-center p-3">
                                <div class="flex-grow-1">
                                    <h4 class="f_s_18 f_w_700 mb-0" style="color: #6a11cb;">Out of Stock</h4>
                                    <small class="text-muted">Need restock</small>
                                </div>
                                <span class="badge rounded-pill fs-6" style="background: linear-gradient(45deg, #ff6491, #ff8d72); color: white;">'.$out_of_stock_vaccines.'</span>
                            </div>
                        </div>
                    </div>
                </div>';

echo $output;

?>