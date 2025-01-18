<?php

$bookingId = $_GET['bookingId'];

$output = '<div class="modal-header" style="background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%); color: white;">
                <h5 class="modal-title text-white"><i class="fas fa-times-circle me-2"></i>Cancel Booking</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="background: #f8f9fa;">
                <form id="cencelbook" method="POST">
                    <div class="mb-3">
                        <input type="hidden" name="bookingId" value="'.$bookingId.'">
                        <div class="info-box p-3 rounded" style="background: rgba(106, 17, 203, 0.1);">
                            <label class="form-label fw-bold mb-2" style="color: #6a11cb;"><i class="fas fa-comment-alt me-2"></i>Reason for Cancellation</label>
                            <textarea class="form-control" name="reason" rows="3" placeholder="Enter reason for cancellation" style="border: 1px solid #6a11cb; background: rgba(255, 255, 255, 0.95);" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer" style="background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn" style="background: linear-gradient(45deg, #ff6491, #ff8d72); color: white;"><i class="fas fa-times me-2"></i>Confirm Cancel</button>
                    </div>
                </form>
            </div>';

echo $output;

?>