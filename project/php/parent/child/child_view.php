<?php
include_once '../../local/connection.php';

$id = $_GET['childId'];

$sql = "SELECT c.*, u.name as parent_name, u.email as parent_email, u.contact as parent_phone, u.address as parent_address FROM children c JOIN users u ON c.parent_id = u.id WHERE c.id = '" . mysqli_real_escape_string($conn, $id) . "'";
$result = mysqli_query($conn, $sql);
$child = mysqli_fetch_assoc($result);

$child['age'] = (new DateTime())->diff(new DateTime($child['dob']))->y;

echo $output = '<div class="modal-header" style="background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%); color: white;">
                <h5 class="modal-title text-white"><i class="fas fa-child me-2"></i>Child Profile</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="background: #f8f9fa;">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="info-box p-3 rounded" style="background: rgba(106, 17, 203, 0.1);">
                                    <label class="form-label fw-bold mb-2" style="color: #6a11cb;">Child ID</label>
                                    <h6 style="color: #2575fc;">'.$child['id'].'</h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box p-3 rounded" style="background: rgba(37, 117, 252, 0.1);">
                                    <label class="form-label fw-bold mb-2" style="color: #6a11cb;">Full Name</label>
                                    <h6 style="color: #2575fc;">'.$child['name'].'</h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box p-3 rounded" style="background: rgba(106, 17, 203, 0.1);">
                                    <label class="form-label fw-bold mb-2" style="color: #6a11cb;">Date of Birth</label>
                                    <h6 style="color: #2575fc;">'.$child['dob'].'</h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box p-3 rounded" style="background: rgba(37, 117, 252, 0.1);">
                                    <label class="form-label fw-bold mb-2" style="color: #6a11cb;">Age</label>
                                    <h6 style="color: #2575fc;">'.$child['age'].' years</h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box p-3 rounded" style="background: rgba(106, 17, 203, 0.1);">
                                    <label class="form-label fw-bold mb-2" style="color: #6a11cb;">Gender</label>
                                    <h6 style="color: #2575fc;">'.$child['gender'].'</h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box p-3 rounded" style="background: rgba(37, 117, 252, 0.1);">
                                    <label class="form-label fw-bold mb-2" style="color: #6a11cb;">Blood Group</label>
                                    <h6 style="color: #2575fc;">'.$child['blood_group'].'</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>';
?>

<!-- 
<div class="col-md-6">
                        <label class="form-label fw-bold">Next Vaccination:</label>
                        <p class="text-primary"><span class="badge bg-warning">MMR (Due in 5 days)</span></p>
                    </div> -->
