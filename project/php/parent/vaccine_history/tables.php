<?php
include '../../local/connection.php';
session_start();

$id = $_SESSION['user_id'];
$sql = "SELECT * FROM children WHERE parent_id = '$id'";
$result = $conn->query($sql);
$child_id = array_column(mysqli_fetch_all($result, MYSQLI_ASSOC), 'id');


if(!empty($child_id)){


    $sql = "SELECT appointments.*, children.name as child_name, hospitals.name as hospital_name, vaccines.name as vaccine_name 
            FROM appointments 
            INNER JOIN children ON appointments.child_id = children.id
            INNER JOIN hospitals ON appointments.hospital_id = hospitals.id 
            INNER JOIN vaccines ON appointments.vaccine_id = vaccines.id
            WHERE appointments.child_id IN (".implode(',', $child_id).")";
    $result = $conn->query($sql);

    while($row = mysqli_fetch_assoc($result)){
    $output = '';
    static $counter = '#001';
        $status_class = match(strtolower($row['status'])) {
            'completed' => 'bg-success',
            'pending' => 'bg-warning', 
            'next_dose' => 'bg-warning',
            'cancelled' => 'bg-danger',
        };
    $output .= ' <tr>
                                            <td style="color: #6a11cb;">'.$counter.'</td>
                                            <td style="color: #2575fc;">'.$row['child_name'].'</td>
                                            <td style="color: #6a11cb;">'.$row['vaccine_name'].'</td>
                                            <td style="color: #2575fc;">'.$row['hospital_name'].'</td>
                                            <td style="color: #6a11cb;">'.$row['appointment_date'].'</td>
                                            <td style="color: #2575fc;">'.$row['appointment_time'].'</td>
                                            <td><span class="badge '.$status_class.'">'.$row['status'].'</span></td>
                                            <td>
                                                <button class="btn btn-sm report" style="background: linear-gradient(45deg, #6a11cb, #2575fc); color: white;" id="'.$row['id'].'">
                                                    <i class="fas fa-download"></i> Report
                                                </button>
                                            </td>
                                        </tr>';
                                        echo  $output;
    };
}
?>