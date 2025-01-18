<?php
include '../../local/connection.php';

$id = $_GET['bookingId'];

$sql = "SELECT a.*, c.id as child_id, c.name as child_name, u.name as parent_name, v.name as vaccine_name, h.name as hospital_name FROM appointments a LEFT JOIN children c ON a.child_id = c.id LEFT JOIN users u ON c.parent_id = u.id LEFT JOIN vaccines v ON a.vaccine_id = v.id LEFT JOIN hospitals h ON a.hospital_id = h.id WHERE a.id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$output = '';
$output = '<div class="modal-header" style="background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%); color: white;">
                <h5 class="modal-title text-white"><i class="fas fa-info-circle me-2"></i>Booking Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="background: #f8f9fa;">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="info-box p-3 rounded" style="background: rgba(106, 17, 203, 0.1);">
                                    <label class="form-label fw-bold mb-2" style="color: #6a11cb;"><i class="fas fa-hashtag me-2"></i>Booking ID</label>
                                    <h6 style="color: #2575fc;">#00'.($row['id']).'</h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box p-3 rounded" style="background: rgba(37, 117, 252, 0.1);">
                                    <label class="form-label fw-bold mb-2" style="color: #6a11cb;"><i class="fas fa-check-circle me-2"></i>Status</label>
                                    <h6 style="color: #2575fc;">'.($row['status']).'</h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box p-3 rounded" style="background: rgba(106, 17, 203, 0.1);">
                                    <label class="form-label fw-bold mb-2" style="color: #6a11cb;"><i class="fas fa-child me-2"></i>Child Name</label>
                                    <h6 style="color: #2575fc;">'.($row['child_name']).'</h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box p-3 rounded" style="background: rgba(37, 117, 252, 0.1);">
                                    <label class="form-label fw-bold mb-2" style="color: #6a11cb;"><i class="fas fa-user me-2"></i>Parent Name</label>
                                    <h6 style="color: #2575fc;">'.($row['parent_name']).'</h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box p-3 rounded" style="background: rgba(106, 17, 203, 0.1);">
                                    <label class="form-label fw-bold mb-2" style="color: #6a11cb;"><i class="fas fa-hospital me-2"></i>Hospital</label>
                                    <h6 style="color: #2575fc;">'.($row['hospital_name']).'</h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box p-3 rounded" style="background: rgba(37, 117, 252, 0.1);">
                                    <label class="form-label fw-bold mb-2" style="color: #6a11cb;"><i class="fas fa-syringe me-2"></i>Vaccine</label>
                                    <h6 style="color: #2575fc;">'.($row['vaccine_name']).'</h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box p-3 rounded" style="background: rgba(106, 17, 203, 0.1);">
                                    <label class="form-label fw-bold mb-2" style="color: #6a11cb;"><i class="fas fa-calendar me-2"></i>Appointment Date</label>
                                    <h6 style="color: #2575fc;">'.($row['appointment_date']).'</h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box p-3 rounded" style="background: rgba(37, 117, 252, 0.1);">
                                    <label class="form-label fw-bold mb-2" style="color: #6a11cb;"><i class="fas fa-clock me-2"></i>Appointment Time</label>
                                    <h6 style="color: #2575fc;">'.($row['appointment_time']).'</h6>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="info-box p-3 rounded" style="background: rgba(106, 17, 203, 0.1);">
                                    <label class="form-label fw-bold mb-2" style="color: #6a11cb;"><i class="fas fa-sticky-note me-2"></i>Notes</label>
                                    <p style="color: #2575fc;">'.($row['notes']).'</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal"><i class="fas fa-times me-2"></i>Close</button>
            </div>';

echo $output;

?>