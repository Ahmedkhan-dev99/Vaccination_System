<?php

include_once '../../local/connection.php';

$id = $_GET['childId'];

$sql = "SELECT a.*, c.name as child_name, h.name as hospital_name, v.name as vaccine_name 
        FROM appointments a 
        JOIN children c ON a.child_id = c.id
        JOIN hospitals h ON a.hospital_id = h.id 
        JOIN vaccines v ON a.vaccine_id = v.id
        WHERE a.child_id = '$id'";
$result = mysqli_query($conn, $sql);
$vaccinations = mysqli_fetch_all($result, MYSQLI_ASSOC);




    $output = '';
    $output = '<div class="modal-content fade-up" style="border-radius: 15px; overflow: hidden;">
            <div class="modal-header" style="background: linear-gradient(45deg, #6a11cb, #2575fc);">
                <h5 class="modal-title text-white"><i class="fas fa-syringe me-2"></i>Vaccination History</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                                <th style="color: #6a11cb;">Vaccine</th>
                                <th style="color: #2575fc;">Date</th>
                                <th style="color: #6a11cb;">Hospital</th>
                                <th style="color: #2575fc;">Status</th>
                            </tr>
                        </thead>
                        <tbody >';
                        foreach($vaccinations as $vaccination){
                            $output .= '<tr>
                                <td>'.$vaccination['vaccine_name'].'</td>
                                <td>'.$vaccination['appointment_date'].'</td>
                                <td>'.$vaccination['hospital_name'].'</td>
                                <td><span class="badge" style="background: linear-gradient(45deg, #11cb54, #25fc94);">Completed</span></td>
                            </tr>';
                        }
                        $output .= '</tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn pulse" style="background: linear-gradient(45deg, #6a11cb, #2575fc); color: white; border-radius: 25px; padding: 8px 25px;" data-bs-dismiss="modal">
                    <i class="fas fa-times-circle me-2"></i>Close
                </button>
            </div>
        </div>';

echo $output;

?>
