<?php
include '../../local/connection.php';

 $id = $_GET['bookingId'];

$sql = "SELECT a.*, c.id as child_id, c.name as child_name, u.name as parent_name, v.name as vaccine_name, h.name as hospital_name FROM appointments a LEFT JOIN children c ON a.child_id = c.id LEFT JOIN users u ON c.parent_id = u.id LEFT JOIN vaccines v ON a.vaccine_id = v.id LEFT JOIN hospitals h ON a.hospital_id = h.id WHERE a.id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$output = '';
$output = '<div class="modal-header bg-primary text-white">
                <h5 class="modal-title text-white"><i class="fas fa-info-circle me-2"></i>Booking Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label text-primary"><i class="fas fa-hashtag me-2"></i>Booking ID</label>
                            <input type="text" class="form-control bg-light text-dark" id="view_booking_id" value="#00'.($row['id']).'" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label text-primary"><i class="fas fa-check-circle me-2"></i>Status</label>
                            <input type="text" class="form-control bg-light text-dark" id="view_status" value="'.($row['status']).'" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label text-primary"><i class="fas fa-child me-2"></i>Child Name</label>
                            <input type="text" class="form-control bg-light text-dark" id="view_child_name" value="'.($row['child_name']).'" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label text-primary"><i class="fas fa-user me-2"></i>Parent Name</label>
                            <input type="text" class="form-control bg-light text-dark" id="view_parent_name" value="'.($row['parent_name']).'" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label text-primary"><i class="fas fa-hospital me-2"></i>Hospital</label>
                            <input type="text" class="form-control bg-light text-dark" id="view_hospital" value="'.($row['hospital_name']).'" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label text-primary"><i class="fas fa-syringe me-2"></i>Vaccine</label>
                            <input type="text" class="form-control bg-light text-dark" id="view_vaccine" value="'.($row['vaccine_name']).'" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label text-primary"><i class="fas fa-calendar me-2"></i>Appointment Date</label>
                            <input type="text" class="form-control bg-light text-dark" id="view_date" value="'.($row['appointment_date']).'" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label text-primary"><i class="fas fa-clock me-2"></i>Appointment Time</label>
                            <input type="text" class="form-control bg-light text-dark " id="view_time" value="'.($row['appointment_time']).'" readonly>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label text-primary"><i class="fas fa-sticky-note me-2"></i>Notes</label>
                            <textarea class="form-control bg-light text-dark" id="view_notes" rows="3" readonly>'.($row['notes']).'</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal"><i class="fas fa-times me-2"></i>Close</button>
            </div>';

 echo $output;

?>