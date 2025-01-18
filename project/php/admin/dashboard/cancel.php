<?php

$bookingId = $_GET['bookingId'];

$output = '<div class="modal-header">
                <h5 class="modal-title">Cancel Booking</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="cencelbook" method="POST">
                    <div class="mb-3">
                        <input type="hidden" name="bookingId" value="'.$bookingId.'">
                        <label class="form-label">Reason for Cancellation</label>
                        <textarea class="form-control" name="reason" rows="3" placeholder="Enter reason for cancellation" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Confirm Cancel</button>
                    </div>
                </form>
            </div>';

echo $output;


?>