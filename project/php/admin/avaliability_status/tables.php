<?php 
include '../../local/connection.php';

$sql = "SELECT  hv.*, h.name as hospital_name, v.name as vaccine_name 
        FROM hospital_vaccines hv
        JOIN hospitals h ON hv.hospital_id = h.id 
        JOIN vaccines v ON hv.vaccine_id = v.id
        ORDER BY hv.id DESC";
$result = mysqli_query($conn, $sql);

$output = ''; 
while($row = mysqli_fetch_assoc($result)){
    static $counter = '#V001';
    $status_class = match(strtolower($row['current_stock'])) {
        'available' => 'bg-success',
        'low stock' => 'bg-warning', 
        'out of stock' => 'bg-danger',
        default => 'bg-warning'
    };
    $date = date('Y-m-d', strtotime($row['last_updated']));
    
    $output .= '<tr style="background: rgba(255, 255, 255, 0.9);">
                                        <td style="color: #6a11cb;">'.$counter.'</td>
                                        <td style="color: #2575fc;">'.$row['vaccine_name'].'</td>
                                        <td style="color: #6a11cb;">'.$row['hospital_name'].'</td>
                                        <td style="color: #2575fc;">'.$date.'</td>
                                        <td style="color: #6a11cb;">'.$row['quantity'].' doses</td>
                                        <td><span class="badge '.$status_class.'" style="box-shadow: 0 2px 5px rgba(0,0,0,0.1);">'.$row['current_stock'].'</span></td>
                                        <td>
                                        <button class="btn btn-sm btn-outline-info me-1 edit" id="'.$row['id'].'" style="background: linear-gradient(45deg, #6a11cb, #2575fc); color: white; border: none; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                                                <i class="fas fa-sync-alt"></i> Update Stock
                                            </button>
                                        </td>
                                    </tr>'; 
    $counter++;
}

echo $output;

?>