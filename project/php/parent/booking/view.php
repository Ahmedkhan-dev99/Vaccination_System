<?php

include '../../local/connection.php';

$hospitalId = $_GET['hospitalId'];

$sql = "SELECT * FROM hospitals WHERE id = $hospitalId";
$result = mysqli_query($conn, $sql);
$hospital = mysqli_fetch_assoc($result);

$sql = "SELECT v.name as vaccine_name FROM hospital_vaccines hv JOIN vaccines v ON hv.vaccine_id = v.id WHERE hv.hospital_id = $hospitalId";
$result = mysqli_query($conn, $sql);
$vaccines = mysqli_fetch_assoc($result);

$output = '<div class="modal-header" style="background: linear-gradient(45deg, #6a11cb, #2575fc);">
                <h5 class="modal-title text-white"><i class="fas fa-hospital-alt me-2"></i>Hospital Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="alert mb-3" style="background: rgba(106, 17, 203, 0.1); border: 1px solid #6a11cb; color: #6a11cb;">
                    <i class="fas fa-info-circle me-2"></i>
                    Hospital details and available services
                </div>
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fas fa-hospital fa-2x me-2" style="color: #6a11cb;"></i>
                                    <h6 class="mb-0 fw-bold" style="color: #2575fc;">Hospital Name</h6>
                                </div>
                                <p class="mb-0" style="color: #6a11cb;">'.$hospital['name'].'</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fas fa-envelope fa-2x me-2" style="color: #6a11cb;"></i>
                                    <h6 class="mb-0 fw-bold" style="color: #2575fc;">Hospital Email</h6>
                                </div>
                                <p class="mb-0" style="color: #6a11cb;">'.$hospital['email'].'</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fas fa-id-card fa-2x me-2" style="color: #6a11cb;"></i>
                                    <h6 class="mb-0 fw-bold" style="color: #2575fc;">Registration Number</h6>
                                </div>
                                <p class="mb-0" style="color: #6a11cb;">'.$hospital['registration'].'</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fas fa-phone fa-2x me-2" style="color: #6a11cb;"></i>
                                    <h6 class="mb-0 fw-bold" style="color: #2575fc;">Contact Number</h6>
                                </div>
                                <p class="mb-0" style="color: #6a11cb;">'.$hospital['phone'].'</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fas fa-map-marker-alt fa-2x me-2" style="color: #6a11cb;"></i>
                                    <h6 class="mb-0 fw-bold" style="color: #2575fc;">Address</h6>
                                </div>
                                <p class="mb-0" style="color: #6a11cb;">'.$hospital['address'].'</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fas fa-city fa-2x me-2" style="color: #6a11cb;"></i>
                                    <h6 class="mb-0 fw-bold" style="color: #2575fc;">City</h6>
                                </div>
                                <p class="mb-0" style="color: #6a11cb;">'.$hospital['city'].'</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fas fa-syringe fa-2x me-2" style="color: #6a11cb;"></i>
                                    <h6 class="mb-0 fw-bold" style="color: #2575fc;">Available Vaccines</h6>
                                </div>
                                <div class="d-flex flex-wrap gap-2">';
                                while($row = mysqli_fetch_assoc($result)){
                                    $output .= '<span class="badge" style="background: linear-gradient(45deg, #6a11cb, #2575fc);">'.$row['vaccine_name'].'</span>';
                                }
                                $output .= '</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fas fa-plus-square fa-2x me-2" style="color: #6a11cb;"></i>
                                    <h6 class="mb-0 fw-bold" style="color: #2575fc;">Facilities</h6>
                                </div>
                                <p class="mb-0" style="color: #6a11cb;">24/7 Emergency Services, Pediatric Care, Vaccination Center</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';

echo $output;

?>