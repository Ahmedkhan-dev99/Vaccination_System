<?php
include '../../local/connection.php';

// Get Hospital Details
$hospitalId = $_GET['hospitalId'];
$sql = "SELECT * FROM hospitals WHERE id = $hospitalId";
$result = mysqli_query($conn, $sql);

// Get Vaccine Details
$sql3 = "SELECT * FROM vaccines";
$result3 = mysqli_query($conn, $sql3);

// Get Child Details
$user_id = $_GET['user_id'];
$sql2 = "SELECT * FROM children WHERE parent_id = $user_id";
$result2 = mysqli_query($conn, $sql2);

echo $output = '<div class="modal-header" style="background: linear-gradient(45deg, #6a11cb, #2575fc);">
                <h5 class="modal-title text-white"><i class="fas fa-calendar-check me-2"></i>Book Appointment</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="alert mb-3" style="background: rgba(106, 17, 203, 0.1); border: 1px solid #6a11cb; color: #6a11cb;">
                    <i class="fas fa-info-circle me-2"></i>
                    Please fill in the appointment details below
                </div>
                <form id="bookingForm">
                    <input type="hidden" name="hospitalId" value="'.$hospitalId.'">
                    <input type="hidden" name="user_id" value="'.$user_id.'">
                    <div class="mb-3">
                        <label class="form-label text-dark small fw-bold">Select Child</label>
                        <select class="form-select" name="child" style="border: 1px solid #6a11cb;">
                            <option selected disabled>Choose child</option>';
                            while($row2 = mysqli_fetch_assoc($result2)){
                                echo '<option value="'.$row2['id'].'">'.$row2['name'].'</option>';
                            }
                        echo '</select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-dark small fw-bold">Select Vaccine</label>
                        <select class="form-select" name="vaccine" style="border: 1px solid #6a11cb;">
                            <option selected disabled>Choose vaccine</option>';
                            while($row3 = mysqli_fetch_assoc($result3)){
                                echo '<option value="'.$row3['id'].'">'.$row3['name'].'</option>';
                            }
                        echo '</select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-dark small fw-bold">Preferred Date</label>
                        <input type="date" name="date" class="form-control" style="border: 1px solid #6a11cb;">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-dark small fw-bold">Preferred Time Slot</label>
                        <select class="form-select" name="time" style="border: 1px solid #6a11cb;">
                            <option selected disabled>Choose time slot</option>
                            <option name="09:00">09:00 AM - 10:00 AM</option>
                            <option name="10:00">10:00 AM - 11:00 AM</option>
                            <option name="11:00">11:00 AM - 12:00 PM</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-dark small fw-bold">Any Special Notes</label>
                        <textarea class="form-control" name="notes" rows="3" style="border: 1px solid #6a11cb;"></textarea>
                    </div>
                
            </input>
            <div class="modal-footer border-top">
                <button type="button" class="btn" data-bs-dismiss="modal" style="background: #ff6491; color: white;">
                    <i class="fas fa-times me-2"></i>Cancel
                </button>
                <button type="button" id="confirmBooking" type="submit" class="btn" style="background: linear-gradient(45deg, #11998e, #38ef7d); color: white;">
                    <i class="fas fa-check me-2"></i>Confirm Booking
                </button>
                </form>
            </div>';

?>