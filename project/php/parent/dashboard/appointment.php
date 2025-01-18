<?php
include_once '../../local/connection.php';

$user_id = $_GET['user_id'];
$sql = "SELECT * FROM children WHERE parent_id = '$user_id'";
$result = mysqli_query($conn, $sql);
$children_id = array_column(mysqli_fetch_all($result, MYSQLI_ASSOC), 'id');

if(!empty($children_id)){

    $sql = "SELECT * FROM appointments WHERE child_id IN (".implode(',', $children_id).")";
    $result = mysqli_query($conn, $sql);
    $total = mysqli_num_rows($result);

    $sql = "SELECT * FROM appointments WHERE child_id IN (".implode(',', $children_id).") AND status = 'completed'";
    $result = mysqli_query($conn, $sql);
    $completed = mysqli_num_rows($result);




    $sql = "SELECT * FROM appointments WHERE child_id IN (".implode(',', $children_id).") AND status = 'pending'";
    $result = mysqli_query($conn, $sql);
    $pending = mysqli_num_rows($result);


    $output = '<div class="card border-0 slide-left" style="background: rgba(255, 255, 255, 0.95); box-shadow: 0 4px 15px rgba(0,0,0,0.1); border-radius: 15px;">
                        <div class="card-header" style="background: linear-gradient(45deg, #6a11cb, #2575fc); border-radius: 15px 15px 0 0;">
                            <h3 class="card-title mb-0 text-white"><i class="fas fa-calendar-check me-2"></i>My Appointments</h3>
                        </div>
                        <div class="card-body">
                            <div class="single_wrap">
                                <div class="d-flex align-items-center p-3 border-bottom" data-wow-delay="0.2s">
                                    <div class="flex-grow-1">
                                        <h4 class="f_s_18 f_w_700 mb-0" style="color: #6a11cb;">Total Appointments</h4>
                                        <small class="text-muted">All scheduled appointments</small>
                                    </div>
                                    <span class="badge rounded-pill fs-6" style="background: linear-gradient(45deg, #6a11cb, #2575fc);">'.$total.'</span>
                                </div>
                                <div class="d-flex align-items-center p-3 border-bottom" data-wow-delay="0.4s">
                                    <div class="flex-grow-1">
                                        <h4 class="f_s_18 f_w_700 mb-0" style="color: #2575fc;">Completed Appointments</h4>
                                        <small class="text-muted">Successfully completed</small>
                                    </div>
                                    <span class="badge rounded-pill fs-6" style="background: linear-gradient(45deg, #2ecc71, #27ae60);">'.$completed.'</span>
                                </div>
                                <div class="d-flex align-items-center p-3" data-wow-delay="0.6s">
                                    <div class="flex-grow-1">
                                        <h4 class="f_s_18 f_w_700 mb-0" style="color: #6a11cb;">Pending Appointments</h4>
                                        <small class="text-muted">Upcoming appointments</small>
                                    </div>
                                    <span class="badge rounded-pill fs-6" style="background: linear-gradient(45deg, #f1c40f, #f39c12);">'.$pending.'</span>
                                </div>
                            </div>
                        </div>
                    </div>';

    echo  $output;
}else{
    $output = '<div class="card border-0 slide-left" style="background: rgba(255, 255, 255, 0.95); box-shadow: 0 4px 15px rgba(0,0,0,0.1); border-radius: 15px;">
                        <div class="card-header" style="background: linear-gradient(45deg, #6a11cb, #2575fc); border-radius: 15px 15px 0 0;">
                            <h3 class="card-title mb-0 text-white"><i class="fas fa-calendar-check me-2"></i>My Appointments</h3>
                        </div>
                        <div class="card-body">
                            <div class="single_wrap">
                                <div class="d-flex align-items-center p-3 border-bottom" data-wow-delay="0.2s">
                                    <div class="flex-grow-1">
                                        <h4 class="f_s_18 f_w_700 mb-0" style="color: #6a11cb;">Total Appointments</h4>
                                        <small class="text-muted">All scheduled appointments</small>
                                    </div>
                                    <span class="badge rounded-pill fs-6" style="background: linear-gradient(45deg, #6a11cb, #2575fc);">0</span>
                                </div>
                                <div class="d-flex align-items-center p-3 border-bottom" data-wow-delay="0.4s">
                                    <div class="flex-grow-1">
                                        <h4 class="f_s_18 f_w_700 mb-0" style="color: #2575fc;">Completed Appointments</h4>
                                        <small class="text-muted">Successfully completed</small>
                                    </div>
                                    <span class="badge rounded-pill fs-6" style="background: linear-gradient(45deg, #2ecc71, #27ae60);">0</span>
                                </div>
                                <div class="d-flex align-items-center p-3" data-wow-delay="0.6s">
                                    <div class="flex-grow-1">
                                        <h4 class="f_s_18 f_w_700 mb-0" style="color: #6a11cb;">Pending Appointments</h4>
                                        <small class="text-muted">Upcoming appointments</small>
                                    </div>
                                    <span class="badge rounded-pill fs-6" style="background: linear-gradient(45deg, #f1c40f, #f39c12);">0</span>
                                </div>
                            </div>
                        </div>
                    </div>';

    echo  $output;
}

?>