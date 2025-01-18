<?php
include '../../local/connection.php';
session_start();
$id = $_SESSION['user_id'];
$sql = "SELECT * FROM children WHERE parent_id = '$id'";
$result = mysqli_query($conn, $sql);
$child_id = array_column(mysqli_fetch_all($result, MYSQLI_ASSOC), 'id');


if(!empty($child_id)){

$sql = "SELECT * FROM appointments WHERE child_id IN (".implode(',', $child_id).")";
$result = mysqli_query($conn, $sql);
$total_vaccinations = mysqli_num_rows($result);


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


$sql = "SELECT * FROM appointments WHERE status = 'completed' AND child_id IN (".implode(',', $child_id).")";
$result = mysqli_query($conn, $sql);
$total_completed_vaccinations = mysqli_num_rows($result);

$output .= '<div class="col-md-3">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle p-3" style="background: linear-gradient(45deg, #11cb6a, #25fc75);">
                                <i class="fas fa-check-circle fa-2x" style="color: white;"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-1" style="color: #11cb6a;">Completed</h6>
                                <h3 class="mb-0" style="color: #25fc75;">'.$total_completed_vaccinations.'</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';


$sql = "SELECT * FROM appointments WHERE (status = 'pending' or status = 'next_dose') AND child_id IN (".implode(',', $child_id).")";
$result = mysqli_query($conn, $sql);
$total_pending_vaccinations = mysqli_num_rows($result);

$output .= '<div class="col-md-3">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle p-3" style="background: linear-gradient(45deg, #cb8511, #fcb725);">
                                <i class="fas fa-clock fa-2x" style="color: white;"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-1" style="color: #cb8511;">Pending</h6>
                                <h3 class="mb-0" style="color: #fcb725;">'.$total_pending_vaccinations.'</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';

$sql = "SELECT * FROM appointments WHERE status = 'cancelled' AND child_id IN (".implode(',', $child_id).")";
$result = mysqli_query($conn, $sql);
$total_cancelled_vaccinations = mysqli_num_rows($result);

$output .= '<div class="col-md-3">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle p-3" style="background: linear-gradient(45deg, #cb1111, #fc2525);">
                                <i class="fas fa-times-circle fa-2x" style="color: white;"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-1" style="color: #cb1111;">Cancelled</h6>
                                <h3 class="mb-0" style="color: #fc2525;">'.$total_cancelled_vaccinations.'</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';


echo $output;
}

?>