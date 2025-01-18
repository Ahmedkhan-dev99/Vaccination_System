<?php
include_once '../../local/connection.php';

$id = $_GET['childId'];

$sql = "SELECT c.*, u.name as parent_name, u.email as parent_email, u.contact as parent_phone, u.address as parent_address FROM children c JOIN users u ON c.parent_id = u.id WHERE c.id = '" . mysqli_real_escape_string($conn, $id) . "'";
$result = mysqli_query($conn, $sql);
$child = mysqli_fetch_assoc($result);

$child['age'] = (new DateTime())->diff(new DateTime($child['dob']))->y;

echo    $output = '<div class="modal-body" style="background: linear-gradient(45deg, rgba(106,17,203,0.05), rgba(37,117,252,0.05));">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="p-4 rounded-4 shadow-sm" style="background: white;">
                                <div class="text-center mb-3">
                                    <img src="img/child-avatar.png" class="rounded-circle img-thumbnail shadow-sm" width="120" alt="">
                                </div>
                                <h5 class="fw-bold text-center" style="background: linear-gradient(45deg, #6a11cb, #2575fc); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                                    '.$child['name'].'
                                </h5>
                                <div class="mt-3">
                                    <div class="p-2 rounded-3 mb-2" style="background: rgba(106,17,203,0.05);">
                                        <i class="fas fa-id-card me-2" style="color: #6a11cb;"></i>
                                        <strong style="color: #6a11cb;">Child ID:</strong>
                                        <span class="fw-bold" style="color: #2575fc;">'.$child['id'].'</span>
                                    </div>
                                    <div class="p-2 rounded-3 mb-2" style="background: rgba(37,117,252,0.05);">
                                        <i class="fas fa-venus-mars me-2" style="color: #6a11cb;"></i>
                                        <strong style="color: #6a11cb;">Gender:</strong>
                                        <span class="fw-bold" style="color: #2575fc;">'.ucfirst($child['gender']).'</span>
                                    </div>
                                    <div class="p-2 rounded-3 mb-2" style="background: rgba(106,17,203,0.05);">
                                        <i class="fas fa-birthday-cake me-2" style="color: #6a11cb;"></i>
                                        <strong style="color: #6a11cb;">Age:</strong>
                                        <span class="fw-bold" style="color: #2575fc;">'.$child['age'].' years</span>
                                    </div>
                                    <div class="p-2 rounded-3 mb-2" style="background: rgba(37,117,252,0.05);">
                                        <i class="fas fa-calendar-alt me-2" style="color: #6a11cb;"></i>
                                        <strong style="color: #6a11cb;">DOB:</strong>
                                        <span class="fw-bold" style="color: #2575fc;">'.$child['dob'].'</span>
                                    </div>
                                    <div class="p-2 rounded-3 mb-2" style="background: rgba(106,17,203,0.05);">
                                        <i class="fas fa-tint me-2" style="color: #6a11cb;"></i>
                                        <strong style="color: #6a11cb;">Blood:</strong>
                                        <span class="fw-bold" style="color: #2575fc;">'.$child['blood_group'].'</span>
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <span class="badge px-4 py-2" style="background: linear-gradient(45deg, #2ecc71, #27ae60); color: white; border-radius: 20px;">
                                        <i class="fas fa-check-circle me-1"></i> Vaccinated
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="p-4 rounded-4 shadow-sm" style="background: white;">
                                <h5 class="mb-4 fw-bold" style="color: #6a11cb;">Parent Information</h5>
                                <div class="row g-3">
                                    <div class="col-12">
                                        <div class="p-3 rounded-3" style="background: rgba(37,117,252,0.05);">
                                            <i class="fas fa-user mb-2" style="color: #6a11cb;"></i>
                                            <strong style="color: #6a11cb;">Parent Name</strong>
                                            <div class="fw-bold" style="color: #2575fc;">'.$child['parent_name'].'</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="p-3 rounded-3 h-100" style="background: rgba(106,17,203,0.05);">
                                            <i class="fas fa-phone mb-2" style="color: #6a11cb;"></i>
                                            <strong style="color: #6a11cb;">Contact</strong>
                                            <div class="fw-bold" style="color: #2575fc;">'.$child['parent_phone'].'</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="p-3 rounded-3 h-100" style="background: rgba(37,117,252,0.05);">
                                            <i class="fas fa-envelope mb-2" style="color: #6a11cb;"></i>
                                            <strong style="color: #6a11cb;">Email</strong>
                                            <div class="fw-bold" style="color: #2575fc;">'.$child['parent_email'].'</div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="p-3 rounded-3" style="background: rgba(106,17,203,0.05);">
                                            <i class="fas fa-map-marker-alt mb-2" style="color: #6a11cb;"></i>
                                            <strong style="color: #6a11cb;">Address</strong>
                                            <div class="fw-bold" style="color: #2575fc;">'.$child['parent_address'].'</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
?>
