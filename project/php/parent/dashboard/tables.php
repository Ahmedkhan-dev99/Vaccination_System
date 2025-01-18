<?php
include '../../local/connection.php'; 
$user_id = $_GET['user_id'];
$sql = "SELECT * FROM children WHERE parent_id = '$user_id'";
$result = mysqli_query($conn, $sql);
$children_id = array_column(mysqli_fetch_all($result, MYSQLI_ASSOC), 'id');

if(!empty($children_id)){
$sql = "SELECT a.*, h.name as hospital_name, v.name as vaccine_name, c.name as child_name FROM appointments a JOIN hospitals h ON a.hospital_id = h.id JOIN vaccines v ON a.vaccine_id = v.id JOIN children c ON a.child_id = c.id WHERE a.child_id IN (".implode(',', $children_id).")  ORDER BY id ASC LIMIT 3";        
$result = mysqli_query($conn, $sql);



$output = '';
while($row = mysqli_fetch_assoc($result)){
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


$output = '<tr>
                                        <td><i class="fas fa-user-circle me-2" style="color: #6a11cb;"></i>'.$row['child_name'].'</td>
                                        <td><i class="fas fa-syringe me-2" style="color: #2575fc;"></i>'.$row['vaccine_name'].'</td>
                                        <td><i class="fas fa-hospital me-2" style="color: #6a11cb;"></i>'.$row['hospital_name'].'</td>
                                        <td><i class="far fa-calendar-alt me-2" style="color: #2575fc;"></i>'.$row['appointment_date'].'</td>
                                        <td><span class="badge rounded-pill px-2 py-1 fs-7" style="background: '.$status_bg.'; box-shadow: 0 2px 5px rgba(0,0,0,0.1); text-transform: capitalize; font-size: 0.8rem;">'.$row['status'].'</span></td>
                                        
                                    </tr>';
                                    echo $output;
}
}else{
    
}
?>
