<?php
include '../../local/connection.php';

$id = $_GET['id'];
$sql = "SELECT appointments.*, children.name as child_name, hospitals.name as hospital_name, vaccines.name as vaccine_name 
        FROM appointments 
        INNER JOIN children ON appointments.child_id = children.id
        INNER JOIN hospitals ON appointments.hospital_id = hospitals.id 
        INNER JOIN vaccines ON appointments.vaccine_id = vaccines.id
        WHERE appointments.id = '$id'";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
$status_class = match(strtolower($row['status'])) {
    'completed' => 'bg-success',
    'pending' => 'bg-warning',
    'next_dose' => 'bg-warning', 
    'cancelled' => 'bg-danger',
};
$output = '';
$output = '<div class="modal-header" style="background: linear-gradient(45deg, #6a11cb, #2575fc);">
                <h5 class="modal-title text-white"><i class="fas fa-file-medical me-2"></i>Vaccination Report</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="alert mb-3" style="background: rgba(106, 17, 203, 0.1); border: 1px solid #6a11cb; color: #6a11cb;">
                    <i class="fas fa-info-circle me-2"></i>
                    Vaccination details and status information
                </div>
                <div class="card shadow-sm mb-3">
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="text-dark small fw-bold">Child Name</label>
                                    <p class="h6 mb-0 fw-bold" style="color: #6a11cb;">'.$row['child_name'].'</p>
                                </div>
                                <div class="mb-3">
                                    <label class="text-dark small fw-bold">Vaccine</label>
                                    <p class="h6 mb-0 fw-bold" style="color: #6a11cb;">'.$row['vaccine_name'].'</p>
                                </div>
                                <div class="mb-3">
                                    <label class="text-dark small fw-bold">Hospital</label>
                                    <p class="h6 mb-0 fw-bold" style="color: #6a11cb;">'.$row['hospital_name'].'</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="text-dark small fw-bold">Date Taken</label>
                                    <p class="h6 mb-0 fw-bold" style="color: #2575fc;">'.$row['appointment_date'].'</p>
                                </div>
                                <div class="mb-3">
                                    <label class="text-dark small fw-bold">Next Due Date</label>
                                    <p class="h6 mb-0 fw-bold" style="color: #2575fc;">'.$row['appointment_time'].'</p>
                                </div>
                                <div class="mb-3">
                                    <label class="text-dark small fw-bold">Status</label>
                                    <p class="h6 mb-0"><span class="badge '.$status_class.'">'.$row['status'].'</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow-sm mb-3">
                    <div class="card-body">
                        <h6 class="card-title text-dark fw-bold mb-3">Doctor\'s Notes</h6>
                        <p class="card-text" style="color: #6a11cb;">Vaccination administered successfully. No adverse reactions observed. Child should return for next dose as scheduled.</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-top">
                <button type="button" class="btn" data-bs-dismiss="modal" style="background: #ff6491; color: white;">
                    <i class="fas fa-times me-2"></i>Close
                </button>
            </div>';
echo $output;

?>
