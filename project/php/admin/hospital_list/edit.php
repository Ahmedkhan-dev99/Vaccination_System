<?php
include '../../local/connection.php';

$id = $_GET['hospitalId'];

$sql = "SELECT * FROM hospitals WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$output  = '';
$output  = '<div class="modal-header" style="background: linear-gradient(120deg, #6a11cb 0%, #2575fc 100%); border-radius: 10px 10px 0 0;">
                <h5 class="modal-title text-light"><i class="fas fa-hospital-alt me-2 text-light animate__animated animate__fadeIn"></i>Edit Hospital Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4" style="background: rgba(255, 255, 255, 0.95);">
                <form class="row g-3" id="formUpdate">
                    <input type="hidden" name="hospital_id" value="'.$row['id'].'">
                    <div class="col-md-6">
                        <label class="form-label fw-bold"><i class="fas fa-hospital me-2" style="color: #6a11cb; text-shadow: 1px 1px 2px rgba(0,0,0,0.1);"></i>Hospital Name</label>
                        <input type="text" class="form-control shadow-sm" name="name" value="'.$row['name'].'" required style="border: 2px solid #6a11cb; border-radius: 8px; transition: all 0.3s ease;">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold"><i class="fas fa-id-card me-2" style="color: #2575fc; text-shadow: 1px 1px 2px rgba(0,0,0,0.1);"></i>Registration Number</label>
                        <input type="text" class="form-control shadow-sm" name="registration" value="'.$row['registration'].'" required style="border: 2px solid #2575fc; border-radius: 8px; transition: all 0.3s ease;">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold"><i class="fas fa-envelope me-2" style="color: #6a11cb; text-shadow: 1px 1px 2px rgba(0,0,0,0.1);"></i>Email</label>
                        <input type="email" class="form-control shadow-sm" name="email" value="'.$row['email'].'" required style="border: 2px solid #6a11cb; border-radius: 8px; transition: all 0.3s ease;">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold"><i class="fas fa-phone me-2" style="color: #2575fc; text-shadow: 1px 1px 2px rgba(0,0,0,0.1);"></i>Phone</label>
                        <input type="tel" class="form-control shadow-sm" name="phone" value="'.$row['phone'].'" required style="border: 2px solid #2575fc; border-radius: 8px; transition: all 0.3s ease;">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold"><i class="fas fa-city me-2" style="color: #6a11cb; text-shadow: 1px 1px 2px rgba(0,0,0,0.1);"></i>City</label>
                        <input type="text" class="form-control shadow-sm" name="city" value="'.$row['city'].'" required style="border: 2px solid #6a11cb; border-radius: 8px; transition: all 0.3s ease;">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold"><i class="fas fa-toggle-on me-2" style="color: #2575fc; text-shadow: 1px 1px 2px rgba(0,0,0,0.1);"></i>Status</label>
                        <select class="form-select shadow-sm" name="status" required style="border: 2px solid #2575fc; border-radius: 8px; transition: all 0.3s ease;">
                            <option value="active"'.( ($row['status']=='Active')?'selected':'').'>Active</option>
                            <option value="inactive"'.( ($row['status']=='Inactive')?'selected':'').'>Inactive</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-bold"><i class="fas fa-map-marker-alt me-2" style="color: #6a11cb; text-shadow: 1px 1px 2px rgba(0,0,0,0.1);"></i>Address</label>
                        <textarea class="form-control shadow-sm" name="address" rows="3" required style="border: 2px solid #6a11cb; border-radius: 8px; transition: all 0.3s ease;">'.$row['address'].'</textarea>
                    </div>
                
            </div>
            <div class="modal-footer" style="background: rgba(255, 255, 255, 0.95); border-radius: 0 0 10px 10px;">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background: linear-gradient(120deg, #6c757d 0%, #495057 100%); border: none; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.2); transition: all 0.3s ease;">
                    <i class="fas fa-times me-2"></i>Cancel
                </button>
                <button type="submit" class="btn btn-primary update" id="formUpdate" style="background: linear-gradient(120deg, #6a11cb 0%, #2575fc 100%); border: none; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.2); transition: all 0.3s ease;">
                    <i class="fas fa-save me-2"></i>Save Changes
                </button>
                </form>
            </div>';

echo $output;

?>