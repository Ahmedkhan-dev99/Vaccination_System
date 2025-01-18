<?php
include '../../local/connection.php';

$sql = "SELECT a.*, c.id as child_id, c.name as child_name,
                    u.name as parent_name, 
                    v.name as vaccine_name, 
                    h.name as hospital_name 
        FROM appointments a LEFT JOIN children c ON a.child_id = c.id LEFT JOIN users u ON c.parent_id = u.id LEFT JOIN vaccines v ON a.vaccine_id = v.id LEFT JOIN hospitals h ON a.hospital_id = h.id ORDER BY a.id DESC;";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

$output = '';
while($row = mysqli_fetch_assoc($result)) {
    $status_class = '';
    static $count = '#001';
    switch(strtolower($row['status'])) {
        case 'completed':
            $status_class = 'bg-success';
            break;
        case 'pending':
            $status_class = 'bg-warning';
            break;
        case 'cancelled':
            $status_class = 'bg-danger';
            break;
        default:
            $status_class = 'bg-warning';
    }	

    $output .= '<tr style="background: rgba(255, 255, 255, 0.9); box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
        <td style="color: #6a11cb;">'.($count).'</td>
        <td style="color: #2575fc;">'.($row['child_name']).'</td>
        <td style="color: #6a11cb;">'.($row['hospital_name']).'</td>
        <td style="color: #2575fc;">'.($row['vaccine_name']).'</td>
        <td style="color: #6a11cb;">'.($row['appointment_date']).'</td>
        <td><span class="badge '.$status_class.' fw-bold">'.($row['status']).'</span></td>
        <td>';

    $output .= '<button class="btn btn-sm me-1 ViewReport" id="'.($row['id']).'" style="background: linear-gradient(45deg, #6a11cb, #2575fc); color: white;">
            <i class="fas fa-eye"></i> View
        </button>';

    if($row['status'] == 'pending' || $row['status'] == 'next_dose') {
        $output .= '<button class="btn btn-sm Cancel" id="'.($row['id']).'" style="background: linear-gradient(45deg, #ff6491, #ff8d72); color: white;">
                <i class="fas fa-times"></i> Cancel
            </button> ';
    }
    
    $output .= '</td></tr>';
    $count++;
}

echo $output;
?>
