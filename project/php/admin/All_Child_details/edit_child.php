<?php
include_once '../../local/connection.php';

$id = $_POST['childId'];
$sql = "SELECT c.*, u.name as parent_name, u.contact as parent_phone, u.address as address
        FROM children c
        JOIN users u ON c.parent_id = u.id 
        WHERE c.id = '$id'";
$result = mysqli_query($conn, $sql);
$child = mysqli_fetch_assoc($result);

$output = '';
$output .= '<div class="modal-header border-0" style="background: linear-gradient(45deg, rgba(106,17,203,0.1), rgba(37,117,252,0.1));">
                <h5 class="modal-title fw-bold" style="background: linear-gradient(45deg, #6a11cb, #2575fc); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                    Edit Child - '.$child['name'].'
                </h5>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="background: linear-gradient(45deg, rgba(106,17,203,0.05), rgba(37,117,252,0.05));">
                <form id="editChildForm">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label fw-bold" style="color: #6a11cb;">Full Name</label>
                                <input type="hidden" name="id" value="'.$child['id'].'">
                                <input type="text" class="form-control shadow-none" name="name" value="'.$child['name'].'" style="border: 1px solid rgba(106,17,203,0.2); background: white;">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label fw-bold" style="color: #2575fc;">Gender</label>
                                <select class="form-select shadow-none" name="gender" style="border: 1px solid rgba(37,117,252,0.2); background: white;">
                                    <option hidden value="'.$child['gender'].'" selected>'.$child['gender'].'</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label fw-bold" style="color: #6a11cb;">Date of Birth</label>
                                <input type="date" class="form-control shadow-none" name="dob" value="'.$child['dob'].'" style="border: 1px solid rgba(106,17,203,0.2); background: white;">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label fw-bold" style="color: #2575fc;">Blood Group</label>
                                <select class="form-select shadow-none" name="blood_group" style="border: 1px solid rgba(37,117,252,0.2); background: white;">
                                    <option value="'.$child['blood_group'].'" selected>'.$child['blood_group'].'</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label fw-bold" style="color: #6a11cb;">Parent Name</label>
                                <input type="text" class="form-control shadow-none" name="parent_name" value="'.$child['parent_name'].'" style="border: 1px solid rgba(106,17,203,0.2); background: white;">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label fw-bold" style="color: #2575fc;">Contact Number</label>
                                <input type="tel" class="form-control shadow-none" name="contact" value="'.$child['parent_phone'].'" style="border: 1px solid rgba(37,117,252,0.2); background: white;">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label fw-bold" style="color: #6a11cb;">Address</label>
                                <textarea class="form-control shadow-none" rows="3" name="address" style="border: 1px solid rgba(106,17,203,0.2); background: white;">'.$child['address'].'</textarea>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer border-0" style="background: linear-gradient(45deg, rgba(106,17,203,0.05), rgba(37,117,252,0.05));">
                    <button type="button" class="btn shadow-none" data-bs-dismiss="modal" style="background: linear-gradient(45deg, #e74c3c, #c0392b); color: white;">Close</button>
                    <button type="button" class="btn shadow-none save" type="submit" id="'.$child['id'].'" style="background: linear-gradient(45deg, #6a11cb, #2575fc); color: white;">Save changes</button>
                </form>
            </div>';

echo $output;

?>
