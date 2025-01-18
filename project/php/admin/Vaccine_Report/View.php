<?php
include_once '../../local/connection.php';

$childId = $_GET['childId'];

$sql = "SELECT a.*, c.name as child_name, u.name as parent_name, v.name as vaccine_type, h.name as hospital_name, a.notes FROM appointments a LEFT JOIN children c ON a.child_id = c.id LEFT JOIN users u ON c.parent_id = u.id LEFT JOIN vaccines v ON a.vaccine_id = v.id LEFT JOIN hospitals h ON a.hospital_id = h.id WHERE a.id = $childId";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

$output = '';

$status_class = match(strtolower($row['status'])) {
    'completed' => 'bg-success',
    'cancelled' => 'bg-danger', 
    'pending' => 'bg-warning',
    default => 'bg-warning'
};

$output .= '<div class="modal-header border-0" style="background: linear-gradient(45deg, rgba(106,17,203,0.1), rgba(37,117,252,0.1));">
                <h5 class="modal-title fw-bold" style="background: linear-gradient(45deg, #6a11cb, #2575fc); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                    Vaccination Report - <span>'.$row['child_name'].'</span>
                </h5>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="background: linear-gradient(45deg, rgba(106,17,203,0.05), rgba(37,117,252,0.05));">
                <div class="row g-4">
                    <div class="col-md-4 text-center">
                        <div class="p-3 rounded-4 shadow-sm" style="background: white;">
                            <img src="img/child1.jpg" class="rounded-circle img-thumbnail shadow-sm" width="150" alt="">
                            <h5 class="mt-3 fw-bold" style="background: linear-gradient(45deg, #6a11cb, #2575fc); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                                '.$row['child_name'].'
                            </h5>
                            <span class="badge '.$status_class.' px-3 py-2" style="background: '.
                                ($row['status'] == 'completed' ? 'linear-gradient(45deg, #2ecc71, #27ae60)' : 
                                ($row['status'] == 'cancelled' ? 'linear-gradient(45deg, #e74c3c, #c0392b)' : 
                                'linear-gradient(45deg, #f1c40f, #f39c12)'))
                                .'">'.$row['status'].'</span>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="p-4 rounded-4 shadow-sm" style="background: white;">
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <div class="p-3 rounded-3" style="background: rgba(106,17,203,0.05);">
                                        <small class="text-muted">Child ID</small>
                                        <div class="fw-bold" style="color: #2575fc;">'.$row['child_id'].'</div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="p-3 rounded-3" style="background: rgba(37,117,252,0.05);">
                                        <small class="text-muted">Vaccine Type</small>
                                        <div class="fw-bold" style="color: #6a11cb;">'.$row['vaccine_type'].'</div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="p-3 rounded-3" style="background: rgba(106,17,203,0.05);">
                                        <small class="text-muted">Hospital</small>
                                        <div class="fw-bold" style="color: #2575fc;">'.$row['hospital_name'].'</div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="p-3 rounded-3" style="background: rgba(37,117,252,0.05);">
                                        <small class="text-muted">Doctor</small>
                                        <div class="fw-bold" style="color: #6a11cb;">Dr. Michael Brown</div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="p-3 rounded-3" style="background: rgba(106,17,203,0.05);">
                                        <small class="text-muted">Vaccination Date</small>
                                        <div class="fw-bold" style="color: #2575fc;">'.$row['appointment_date'].'</div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="p-3 rounded-3" style="background: rgba(37,117,252,0.05);">
                                        <small class="text-muted">Next Due Date</small>
                                        <div class="fw-bold" style="color: #6a11cb;">'.$row['appointment_date'].'</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 p-4 rounded-4 shadow-sm" style="background: white;">
                    <h6 class="fw-bold mb-3" style="background: linear-gradient(45deg, #6a11cb, #2575fc); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Notes:</h6>
                    <p class="mb-0" style="color: #2575fc;">'.$row['notes'].'</p>
                </div>
            </div>
            <div class="modal-footer border-0" style="background: linear-gradient(45deg, rgba(106,17,203,0.1), rgba(37,117,252,0.1));">
                <button type="button" class="btn btn-light shadow-sm" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn shadow-sm" style="background: linear-gradient(45deg, #6a11cb, #2575fc); color: white;" onclick="window.print()">
                    <i class="fas fa-print me-2"></i>Print Report
                </button>
            </div>';

echo $output;