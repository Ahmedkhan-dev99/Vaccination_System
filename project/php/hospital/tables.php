<?php
include '../local/connection.php';

$sql = "SELECT a.*, c.id as child_id, c.name as child_name, u.name as parent_name, v.name as vaccine_name FROM appointments a LEFT JOIN children c ON a.child_id = c.id LEFT JOIN users u ON c.parent_id = u.id LEFT JOIN vaccines v ON a.vaccine_id = v.id ORDER BY a.id DESC;";

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

    $output .= '<tr>
                    <td style="color: #2575fc;">'.($count).'</td>
                    <td style="color: #6a11cb;">'.($row['child_name']).'</td>
                    <td style="color: #2575fc;">'.($row['parent_name']).'</td>
                    <td style="color: #6a11cb;">'.($row['vaccine_name']).'</td>
                    <td style="color: #2575fc;">'.($row['appointment_date']).'</td>
                    <td><span class="badge '.$status_class.'" style="background: linear-gradient(45deg, #6a11cb, #2575fc);">'.($row['status']).'</span></td>
                    <td>';
    if($row['status'] == 'pending' || $row['status'] == 'next_dose') {
        $output .= '<button class="btn btn-sm me-1 Update" id="'.($row['id']).'" style="background: linear-gradient(45deg, #6a11cb, #2575fc); color: white;">
                        <i class="fas fa-check me-1"></i>Update Status
                    </button>
                    <button class="btn btn-sm Cancel" id="'.($row['id']).'" style="background: #8B0000; color: white; border: none; transition: all 0.3s ease;" onmouseover="this.style.background=\'#A52A2A\'" onmouseout="this.style.background=\'#8B0000\'">
                        <i class="fas fa-times me-1"></i>Cancel
                    </button>';
    } else if($row['status'] == 'completed') {
        $output .= '<button class="btn btn-sm ViewReport" id="'.($row['child_id']).'" style="background: linear-gradient(45deg, #11cb6a, #25fc75); color: white;">
                        <i class="fas fa-file-medical me-1"></i>View Report
                    </button>';
    } else if($row['status'] == 'cancelled') {
        $output .= '<button class="btn btn-sm Cancelled" id="'.($row['child_id']).'" style="background: linear-gradient(45deg, #FF0000, #DC143C); color: white;">
                        <i class="fas fa-times-circle me-1"></i>Cancelled Report
                    </button>';
    }
    $output .= '</td></tr>';
    $count++;
}

echo $output;
?>