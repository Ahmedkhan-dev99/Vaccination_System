<?php

$childId = $_GET['childId'];

$output = '<div class="modal-header" style="background: linear-gradient(45deg, #ff6491, #ff8d72);">
                <h5 class="modal-title text-white"><i class="fas fa-ban me-2"></i>Cancel Appointment</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="alert mb-3" style="background: rgba(255, 100, 145, 0.1); border: 1px solid #ff6491; color: #ff6491;">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    Please provide a reason for cancelling this appointment
                </div>
                <form id="cancelAppointmentForm" method="POST">
                    <div class="mb-3">
                        <input type="hidden" name="childId" value="'.$childId.'">
                        <label class="form-label text-dark fw-bold">Reason for Cancellation</label>
                        <textarea class="form-control" name="reason" rows="3" placeholder="Enter reason for cancellation" required style="border: 1px solid #ff6491;"></textarea>
                    </div>
                    <div class="modal-footer border-top">
                        <button type="button" class="btn" data-bs-dismiss="modal" style="background: #6a11cb; color: white;">
                            <i class="fas fa-times me-2"></i>Close
                        </button>
                        <button type="submit" class="btn" style="background: linear-gradient(45deg, #ff6491, #ff8d72); color: white;">
                            <i class="fas fa-ban me-2"></i>Confirm Cancel
                        </button>
                    </div>
                </form>
            </div>';

echo $output;

?>