<?php

$childId = $_POST['childId'];

$output = ''; 
echo $output .= '<div class="modal-header" style="background: linear-gradient(45deg, #6a11cb, #2575fc);">
                <h5 class="modal-title text-white"><i class="fas fa-edit me-2"></i>Update Vaccination Status</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="alert mb-3" style="background: rgba(106, 17, 203, 0.1); border: 1px solid #6a11cb; color: #6a11cb;">
                    <i class="fas fa-info-circle me-2"></i>
                    Please update the vaccination status and provide relevant details
                </div>
                <form id="updateStatus" method="POST">
                    <input type="hidden" name="childId" value="'.$childId.'" id="childId">
                    <div class="mb-3">
                        <label class="form-label text-dark fw-bold">Status</label>
                        <select class="form-select" name="status" id="status" required style="border: 1px solid #6a11cb;">
                            <option value="" selected disabled>Select Status</option>
                            <option value="completed">Completed</option>
                            <option value="pending">Pending</option>
                            <option value="next_dose">Next Dose</option>
                        </select>
                    </div>
                    <div class="mb-3 next-date-field" style="display:none;">
                        <label class="form-label text-dark fw-bold">Next Vaccination Date</label>
                        <input type="date" class="form-control" name="next_date" id="next_date" style="border: 1px solid #6a11cb;">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-dark fw-bold">Notes</label>
                        <textarea class="form-control" name="notes" rows="3" placeholder="Enter any additional notes" style="border: 1px solid #6a11cb;"></textarea>
                    </div>
                    <div class="modal-footer border-top">
                        <button type="button" class="btn" data-bs-dismiss="modal" style="background: #ff6491; color: white;">
                            <i class="fas fa-times me-2"></i>Close
                        </button>
                        <button type="submit" class="btn" id="updateStatus" style="background: linear-gradient(45deg, #6a11cb, #2575fc); color: white;">
                            <i class="fas fa-check me-2"></i>Update Status
                        </button>
                    </div>
                </form>
            </div>
            <script>
            $(document).ready(function() {
                $("#status").change(function() {
                    if($(this).val() == "next_dose") {
                        $(".next-date-field").show();
                        $("#next_date").prop("required", true);
                    } else {
                        $(".next-date-field").hide();
                        $("#next_date").prop("required", false);
                    }
                });
            });
            </script>';

?>