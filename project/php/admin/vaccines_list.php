<?php
include '../local/connection.php';

$sql = "SELECT * FROM vaccines";    
$result = mysqli_query($conn, $sql);

$output = '';
while($row = mysqli_fetch_assoc($result)) {
    static $counter = '#001';
    $output .= '<tr style="transition: all 0.3s ease;" onmouseover="this.style.background=\'rgba(106,17,203,0.05)\'" onmouseout="this.style.background=\'transparent\'">
                                        <td style="color: #6a11cb; font-weight: 500;">'.$counter.'</td>
                                        <td style="color: #2575fc; font-weight: 500;">'.$row['name'].'</td>
                                        <td style="color: #6a11cb;">'.$row['age_group'].'</td>
                                        <td style="color: #2575fc;">'.$row['doses_required'].' doses</td>
                                        <td style="color: #6a11cb;">'.$row['gap_between_doses'].'</td>
                                        <td><span class="badge" style="background: '.
                                            ($row['status'] == 'Available' ? 'linear-gradient(45deg, #2ecc71, #27ae60)' : 
                                            ($row['status'] == 'Low Stock' ? 'linear-gradient(45deg, #f1c40f, #f39c12)' : 
                                            'linear-gradient(45deg, #e74c3c, #c0392b)'))
                                            .'">'.$row['status'].'</span></td>
                                    </tr>';
    $counter++;
}

echo $output;

?>