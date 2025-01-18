<?php 

include '../local/connection.php';

$childId = $_GET['childId'];

// Get vaccination history details
$sql = "SELECT *, c.name as child_name, v.name as vaccine_name,vh.next_due_date, vh.notes, vh.administered_by as doctor_name FROM vaccination_history vh
        LEFT JOIN children c ON vh.child_id = c.id
        LEFT JOIN vaccines v ON vh.vaccine_id = v.id WHERE vh.child_id='$childId'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$output = '<div class="modal-header" style="background: linear-gradient(45deg, #6a11cb, #2575fc);">
                <h5 class="modal-title text-white"><i class="fas fa-file-medical me-2"></i>Vaccination Report</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="alert mb-3" style="background: rgba(106, 17, 203, 0.1); border: 1px solid #6a11cb; color: #6a11cb;">
                    <i class="fas fa-check-circle me-2"></i>
                    This vaccination has been completed successfully
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
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="text-dark small fw-bold">Doctor</label>
                                    <p class="h6 mb-0 fw-bold" style="color: #6a11cb;">'.$row['doctor_name'].'</p>
                                </div>
                                <div class="mb-3">
                                    <label class="text-dark small fw-bold">Appointment Date</label>
                                    <p class="h6 mb-0 fw-bold" style="color: #6a11cb;">'.$row['administered_date'].'</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h6 class="card-title text-dark fw-bold mb-3">Notes</h6>
                        <p class="card-text fw-bold" style="color: #6a11cb;">'.$row['notes'].'</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-top">
                <button type="button" class="btn" data-bs-dismiss="modal" style="background: linear-gradient(45deg, #6a11cb, #2575fc); color: white;">
                    <i class="fas fa-times me-2"></i>Close
                </button>
            </div>';

echo $output;

?>