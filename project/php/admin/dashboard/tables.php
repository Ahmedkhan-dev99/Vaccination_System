<?php
include '../../local/connection.php';

$sql = "SELECT a.*, c.id as child_id, c.name as child_name,
                u.name as parent_name, 
                v.name as vaccine_name, 
                h.name as hospital_name 
        FROM appointments a 
        LEFT JOIN children c ON a.child_id = c.id 
        LEFT JOIN users u ON c.parent_id = u.id 
        LEFT JOIN vaccines v ON a.vaccine_id = v.id 
        LEFT JOIN hospitals h ON a.hospital_id = h.id 
        WHERE a.status IN ('pending', 'next_dose') 
        ORDER BY a.id DESC LIMIT 6";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

$output = '';

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        static $count = 1;
        $status_bg = '';
        if($row['status'] == 'completed') {
            $status_bg = 'linear-gradient(45deg, #2ecc71, #27ae60)';
        } else if($row['status'] == 'pending') {
            $status_bg = 'linear-gradient(45deg, #f1c40f, #f39c12)'; 
        } else if($row['status'] == 'next_dose') {
            $status_bg = 'linear-gradient(45deg, #3498db, #2980b9)';
        } else if($row['status'] == 'cancelled') {
            $status_bg = 'linear-gradient(45deg, #e74c3c, #c0392b)';
        }
        $output .= '<tr style="background: rgba(255, 255, 255, 0.9); transition: all 0.3s ease;" 
                    onmouseover="this.style.background=\'rgba(106,17,203,0.05)\'" 
                    onmouseout="this.style.background=\'rgba(255, 255, 255, 0.9)\'">';
        $output .= '<td class="fw-bold" style="color: #6a11cb;">'.$count.'</td>';
        $output .= '<td style="color: #2575fc;">'.$row['child_name'].'</td>';
        $output .= '<td style="color: #6a11cb;">'.$row['hospital_name'].'</td>';
        $output .= '<td style="color: #2575fc;">'.$row['vaccine_name'].'</td>';
        $output .= '<td style="color: #6a11cb;">'.$row['appointment_date'].'</td>';
        $output .= '<td><span class="badge" style="background:'.$status_bg.';">'.$row['status'].'</span></td>';
        $output .= '</tr>';
        $count++;
    }
} else {
    $output .= '<tr><td colspan="6" class="text-center">No records found</td></tr>';
}

echo $output;
?>
