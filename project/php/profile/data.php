<?php
include '../local/connection.php';
session_start();
$id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE id = '$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$profile_image = $row['profile'];
$output = '';

$output .= '<div class="row">
                <div class="col-md-4 text-center mb-4 mb-md-0">
                    <div class="card border-0 shadow-sm p-4">
                        <div class="position-relative d-inline-block mx-auto">
                            <img src="img/profile/'.$profile_image.'" class="rounded-circle mb-3" style="width: 180px; height: 180px; object-fit: cover; border: 4px solid #6a11cb; box-shadow: 0 0 20px rgba(106, 17, 203, 0.2);">
                            <button class="btn btn-sm position-absolute bottom-0 end-0" data-bs-toggle="modal" data-bs-target="#updateProfilePicModal" style="background: linear-gradient(45deg, #6a11cb, #2575fc); color: white; border-radius: 50%; padding: 10px;">
                                <i class="fas fa-camera"></i>
                            </button>
                        </div>
                        <h4 class="mb-1 mt-3" style="color: #6a11cb; font-weight: 600;">'.$row['name'].'</h4>
                        <p class="mb-0" style="color: #2575fc; text-transform: uppercase; letter-spacing: 1px; font-size: 0.9rem;">'.$row['role'].'</p>
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="card border-0 shadow-sm p-4">
                        <h5 class="mb-4" style="color: #6a11cb; font-weight: 600;">Profile Information</h5>
                        <form id="profileForm" method="POST" >
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label" style="color: #6a11cb; font-weight: 500;">Full Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text" style="background: rgba(106, 17, 203, 0.1); border: 1px solid #6a11cb;"><i class="fas fa-user"></i></span>
                                        <input type="text" name="name" value="'.$row['name'].'" class="form-control" style="border: 1px solid #6a11cb;" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" style="color: #6a11cb; font-weight: 500;">Email Address</label>
                                    <div class="input-group">
                                        <span class="input-group-text" style="background: rgba(106, 17, 203, 0.1); border: 1px solid #6a11cb;"><i class="fas fa-envelope"></i></span>
                                        <input type="email" name="email" value="'.$row['email'].'" class="form-control" style="border: 1px solid #6a11cb;">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" style="color: #6a11cb; font-weight: 500;">Phone Number</label>
                                    <div class="input-group">
                                        <span class="input-group-text" style="background: rgba(106, 17, 203, 0.1); border: 1px solid #6a11cb;"><i class="fas fa-phone"></i></span>
                                        <input type="text" name="contact" value="'.$row['contact'].'" class="form-control" style="border: 1px solid #6a11cb;">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" style="color: #6a11cb; font-weight: 500;">Role</label>
                                    <div class="input-group">
                                        <span class="input-group-text" style="background: rgba(106, 17, 203, 0.1); border: 1px solid #6a11cb;"><i class="fas fa-user-tag"></i></span>
                                        <input type="text" class="form-control" value="'.$row['role'].'" style="border: 1px solid #6a11cb; background: rgba(106, 17, 203, 0.05);" readonly>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label class="form-label" style="color: #6a11cb; font-weight: 500;">Address</label>
                                    <div class="input-group">
                                        <span class="input-group-text" style="background: rgba(106, 17, 203, 0.1); border: 1px solid #6a11cb;"><i class="fas fa-map-marker-alt"></i></span>
                                        <textarea name="address" class="form-control" rows="3" style="border: 1px solid #6a11cb;" required>'.$row['address'].'</textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" style="color: #6a11cb; font-weight: 500;">City</label>
                                    <div class="input-group">
                                        <span class="input-group-text" style="background: rgba(106, 17, 203, 0.1); border: 1px solid #6a11cb;"><i class="fas fa-city"></i></span>
                                        <input type="text" name="city" value="'.$row['city'].'" class="form-control" style="border: 1px solid #6a11cb;" required>
                                    </div>
                                </div>

                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn btn-lg px-4" style="background: linear-gradient(45deg, #6a11cb, #2575fc); color: white;">
                                        <i class="fas fa-save me-2"></i>Save Changes
                                    </button>
                                    <button type="button" class="btn btn-lg ms-3 px-4" data-bs-toggle="modal" data-bs-target="#changePasswordModal" style="border: 2px solid #6a11cb; color: #6a11cb;">
                                        <i class="fas fa-key me-2"></i>Change Password
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>';

echo $output;
?>