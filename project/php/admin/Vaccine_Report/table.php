<?php
include_once '../../local/connection.php';


$sql = "SELECT a.*, c.name as child_name, u.name as parent_name, v.name as vaccine_type, h.name as hospital_name FROM appointments a LEFT JOIN children c ON a.child_id = c.id LEFT JOIN users u ON c.parent_id = u.id LEFT JOIN vaccines v ON a.vaccine_id = v.id LEFT JOIN hospitals h ON a.hospital_id = h.id";

$result = mysqli_query($conn, $sql);

$output = '';
while ($row = mysqli_fetch_assoc($result)) {
    static $count = '#001';
    $status_class = match(strtolower($row['status'])) {
        'completed' => 'bg-success',
        'cancelled' => 'bg-danger',
        'pending' => 'bg-warning',
        default => 'bg-warning'
    };

    $output .= '<tr style="transition: all 0.3s ease;" onmouseover="this.style.background=\'rgba(106,17,203,0.05)\'" onmouseout="this.style.background=\'transparent\'">
    <td>
        <div class="d-flex align-items-center">
            <div class="ms-2" style="color: #6a11cb; font-weight: 500;">'.$count.'</div>
        </div>
    </td>
    <td style="color: #2575fc; font-weight: 500;">'.$row['child_name'].'</td>
    <td style="color: #6a11cb;">'.$row['vaccine_type'].'</td>
    <td style="color: #2575fc;">'.$row['hospital_name'].'</td>
    <td style="color: #6a11cb;">'.$row['appointment_date'].'</td>
    <td><span class="badge '.$status_class.'" style="background: '.
        ($row['status'] == 'completed' ? 'linear-gradient(45deg, #2ecc71, #27ae60)' : 
        ($row['status'] == 'cancelled' ? 'linear-gradient(45deg, #e74c3c, #c0392b)' : 
        'linear-gradient(45deg, #f1c40f, #f39c12)'))
        .'">'.$row['status'].'</span></td>
    <td>
       <button class="btn btn-sm view" style="background: linear-gradient(45deg, #6a11cb, #2575fc); color: white;" id="'.$row['id'].'">
            <i class="fas fa-eye"></i>
        </button>
    </td>
</tr>';
    $count++;
}
echo $output;
?>