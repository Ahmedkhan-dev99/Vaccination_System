<?php 
include '../../local/connection.php';
$childId = $_GET['childId'];
$sql = "SELECT * FROM children WHERE id = '$childId'";
$result = mysqli_query($conn, $sql);
$child = mysqli_fetch_assoc($result);

echo $output = '<div class="modal-header" style="background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%); color: white;">
                <h5 class="modal-title text-white"><i class="fas fa-edit me-2"></i>Edit Child Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="background: #f8f9fa;">
               <form class="row g-3" id="formUpdate">
                    <div class="col-md-6">
                        <div class="form-group p-3 rounded" style="background: rgba(106, 17, 203, 0.1);">
                            <label class="form-label fw-bold" style="color: #6a11cb;">First Name</label>
                            <input type="text" class="form-control border-0 shadow-sm" name="name" value="'.$child['name'].'" required>
                            <input type="hidden" class="form-control" name="childId" value="'.$child['id'].'" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group p-3 rounded" style="background: rgba(37, 117, 252, 0.1);">
                            <label class="form-label fw-bold" style="color: #2575fc;">Date of Birth</label>
                            <input type="date" class="form-control border-0 shadow-sm" name="dob" value="'.$child['dob'].'" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group p-3 rounded" style="background: rgba(106, 17, 203, 0.1);">
                            <label class="form-label fw-bold" style="color: #6a11cb;">Gender</label>
                            <select class="form-select border-0 shadow-sm" name="gender" required>
                                <option hidden value="'.$child['gender'].'" selected>'.$child['gender'].'</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group p-3 rounded" style="background: rgba(37, 117, 252, 0.1);">
                            <label class="form-label fw-bold" style="color: #2575fc;">Blood Group</label>
                            <select class="form-select border-0 shadow-sm" name="blood_group" required>
                                <option hidden value="'.$child['blood_group'].'" selected>'.$child['blood_group'].'</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="O-">O-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer" style="background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-light update">Save Changes</button>
             </form>
            </div>';
?>