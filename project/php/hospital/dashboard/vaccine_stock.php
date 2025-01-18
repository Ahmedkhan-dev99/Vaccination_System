<?php
include_once '../../local/connection.php';

$sql = "SELECT * FROM vaccines";
$result = mysqli_query($conn, $sql);
$total = mysqli_num_rows($result);

$sql = "SELECT * FROM vaccines WHERE status='available'";
$result = mysqli_query($conn, $sql);
$available = mysqli_num_rows($result);

$sql = "SELECT * FROM vaccines WHERE status IN ('Low Stock', 'Out of Stock')";
$result = mysqli_query($conn, $sql);
$out_of_stock = mysqli_num_rows($result);

$output = '';
$output = '<div class="card border-0 slide-right" style="background: rgba(255, 255, 255, 0.95); box-shadow: 0 4px 15px rgba(0,0,0,0.1); border-radius: 15px;">
                    <div class="card-header" style="background: linear-gradient(45deg, #6a11cb, #2575fc); border-radius: 15px 15px 0 0;">
                        <h3 class="card-title mb-0 text-white"><i class="fas fa-syringe me-2"></i>Vaccine Stock Status</h3>
                    </div>
                    <div class="card-body">
                        <div class="single_wrap">
                            <div class="d-flex align-items-center p-3 border-bottom" data-wow-delay="0.2s">
                                <div class="flex-grow-1">
                                    <h4 class="f_s_18 f_w_700 mb-0" style="color: #6a11cb;">Total Vaccines</h4>
                                    <small class="text-muted">All vaccine types</small>
                                </div>
                                <span class="badge rounded-pill fs-6" style="background: linear-gradient(45deg, #6a11cb, #2575fc);">'.$total.'</span>
                            </div>
                            <div class="d-flex align-items-center p-3 border-bottom" data-wow-delay="0.4s">
                                <div class="flex-grow-1">
                                    <h4 class="f_s_18 f_w_700 mb-0" style="color: #2575fc;">Available Vaccines</h4>
                                    <small class="text-muted">Currently in stock</small>
                                </div>
                                <span class="badge rounded-pill fs-6" style="background: linear-gradient(45deg, #2ecc71, #27ae60);">'.$available.'</span>
                            </div>
                            <div class="d-flex align-items-center p-3" data-wow-delay="0.6s">
                                <div class="flex-grow-1">
                                    <h4 class="f_s_18 f_w_700 mb-0" style="color: #6a11cb;">Low/Out of Stock</h4>
                                    <small class="text-muted">Need restock soon</small>
                                </div>
                                <span class="badge rounded-pill fs-6" style="background: linear-gradient(45deg, #f1c40f, #f39c12);">'.$out_of_stock.'</span>
                            </div>
                        </div>
                    </div>
                </div>';

echo $output;

?>