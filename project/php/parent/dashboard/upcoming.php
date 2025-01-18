<?php 
include_once '../../local/connection.php';

$user_id = $_GET['user_id'];
$result = $conn->query("SELECT * FROM children WHERE parent_id = '$user_id'");
$children_id = array_column(mysqli_fetch_all($result, MYSQLI_ASSOC), 'id');

if(!empty($children_id)){

    $sql = "SELECT a.*, h.name as hospital_name, v.name as vaccine_name FROM appointments a JOIN hospitals h ON a.hospital_id = h.id JOIN vaccines v ON a.vaccine_id = v.id WHERE a.child_id IN (".implode(',', $children_id).") AND a.status = 'pending' ORDER BY a.appointment_date ASC LIMIT 1";        
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $appointment_date = date('d-m-Y', strtotime($row['appointment_date']));

    $output = '<div class="card border-0 slide-right" style="background: rgba(255, 255, 255, 0.95); box-shadow: 0 4px 15px rgba(0,0,0,0.1); border-radius: 15px;">
                        <div class="card-header" style="background: linear-gradient(45deg, #6a11cb, #2575fc); border-radius: 15px 15px 0 0;">
                            <h3 class="card-title mb-0 text-white"><i class="fas fa-calendar-check me-2"></i>Upcoming Appointments</h3>
                        </div>
                        <div class="card-body">
                            <div class="single_wrap">
                                <div class="d-flex align-items-center p-3 border-bottom" data-wow-delay="0.2s">
                                    <div class="flex-grow-1">
                                        <h4 class="f_s_18 f_w_700 mb-0" style="color: #6a11cb;">Next Appointment</h4>
                                        <small class="text-muted">'.$appointment_date.'</small>
                                    </div>
                                    <span class="badge rounded-pill" style="background: linear-gradient(45deg, #3498db, #2980b9);">2 Days</span>
                                </div>
                                <div class="d-flex align-items-center p-3 border-bottom" data-wow-delay="0.4s">
                                    <div class="flex-grow-1">
                                        <h4 class="f_s_18 f_w_700 mb-0" style="color: #2575fc;">Hospital</h4>
                                        <small class="text-muted">Your selected hospital for vaccination</small>
                                    </div>
                                    <span style="color: #6a11cb; font-weight: 600;">'.$row['hospital_name'].'</span>
                                </div>
                                <div class="d-flex align-items-center p-3" data-wow-delay="0.6s">
                                    <div class="flex-grow-1">
                                        <h4 class="f_s_18 f_w_700 mb-0" style="color: #6a11cb;">Vaccine</h4>
                                        <small class="text-muted">Scheduled vaccine for this appointment</small>
                                    </div>
                                    <span style="color: #2575fc; font-weight: 600;">'.$row['vaccine_name'].'</span>
                                </div>
                            </div>
                        </div>
                    </div>';

    echo $output;
}else{
    $output = '<div class="card border-0 slide-right" style="background: rgba(255, 255, 255, 0.95); box-shadow: 0 4px 15px rgba(0,0,0,0.1); border-radius: 15px;">
    <div class="card-header" style="background: linear-gradient(45deg, #6a11cb, #2575fc); border-radius: 15px 15px 0 0;">
        <h3 class="card-title mb-0 text-white"><i class="fas fa-calendar-check me-2"></i>Upcoming Appointments</h3>
    </div>
    <div class="card-body">
        <div class="single_wrap">
            <div class="d-flex align-items-center p-3 border-bottom" data-wow-delay="0.2s">
                <div class="flex-grow-1">
                    <h4 class="f_s_18 f_w_700 mb-0" style="color: #6a11cb;">Next Appointment</h4>
                    <small class="text-muted">0</small>
                </div>
                <span class="badge rounded-pill" style="background: linear-gradient(45deg, #3498db, #2980b9);">0 Days</span>
            </div>
            <div class="d-flex align-items-center p-3 border-bottom" data-wow-delay="0.4s">
                <div class="flex-grow-1">
                    <h4 class="f_s_18 f_w_700 mb-0" style="color: #2575fc;">Hospital</h4>
                    <small class="text-muted">Your selected hospital for vaccination</small>
                </div>
                <span style="color: #6a11cb; font-weight: 600;">-</span>
            </div>
            <div class="d-flex align-items-center p-3" data-wow-delay="0.6s">
                <div class="flex-grow-1">
                    <h4 class="f_s_18 f_w_700 mb-0" style="color: #6a11cb;">Vaccine</h4>
                    <small class="text-muted">Scheduled vaccine for this appointment</small>
                </div>
                <span style="color: #2575fc; font-weight: 600;">-</span>
            </div>
        </div>
    </div>
</div>';

echo $output;
}
?>