<?php 
include '../../local/connection.php';

$id = $_GET['hospital_Id'];

$sql = "SELECT * FROM hospitals WHERE id = $id";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);


$output = '';
$status_class = match(strtolower($row['status'])) {
    'active' => 'bg-success',
    'inactive' => 'bg-warning',
};

$output = '<div class="modal-header" style="background: linear-gradient(45deg, #6a11cb, #2575fc);">
                        <h5 class="modal-title text-light"><i class="fas fa-hospital-alt me-2 text-light"></i>Hospital Details</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body p-4" style="background: rgba(255, 255, 255, 0.9);">
                        <div class="row">
                            <div class="col-12 mb-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h3 class="mb-0" style="color: #6a11cb;">'.$row['name'].'</h3>
                                    <span class="badge '.$status_class.' px-3 py-2" style="box-shadow: 0 2px 5px rgba(0,0,0,0.1);">'.$row['status'].'</span>
                                </div>
                                <p class="text-muted mb-0">Registration #: <span style="color: #2575fc;">'.$row['registration'].'</span></p>
                            </div>
                            
                            <div class="col-12">
                                <div class="card border-0 shadow-sm">
                                    <div class="card-body">
                                        <div class="row g-4">
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-hashtag fa-fw me-3" style="color: #6a11cb;"></i>
                                                    <div>
                                                        <small class="text-muted d-block">Hospital ID</small>
                                                        <strong style="color: #2575fc;">#00'.$row['id'].'</strong>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-envelope fa-fw me-3" style="color: #6a11cb;"></i>
                                                    <div>
                                                        <small class="text-muted d-block">Email</small>
                                                        <strong style="color: #2575fc;">'.$row['email'].'</strong>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-phone fa-fw me-3" style="color: #6a11cb;"></i>
                                                    <div>
                                                        <small class="text-muted d-block">Phone</small>
                                                        <strong style="color: #2575fc;">'.$row['phone'].'</strong>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-city fa-fw me-3" style="color: #6a11cb;"></i>
                                                    <div>
                                                        <small class="text-muted d-block">City</small>
                                                        <strong style="color: #2575fc;">'.$row['city'].'</strong>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-12">
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-map-marker-alt fa-fw me-3" style="color: #6a11cb;"></i>
                                                    <div>
                                                        <small class="text-muted d-block">Address</small>
                                                        <strong style="color: #2575fc;">'.$row['address'].'</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="background: rgba(255, 255, 255, 0.9);">
                        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal" style="background: linear-gradient(45deg, #6a11cb, #2575fc); color: white; border: none;">
                            <i class="fas fa-times me-2"></i>Close
                        </button>
                    </div>';

echo $output;

?>