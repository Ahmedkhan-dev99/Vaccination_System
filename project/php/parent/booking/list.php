<?php 
include '../../local/connection.php';

$sql = "SELECT * FROM hospitals where status = 'Active'";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)){
    static $counter = "#001";
    $output = '<tr>
                    <td>'.$counter.'</td>
                    <td>'.$row['name'].'</td>
                    <td>'.$row['city'].'</td>
                    <td>';
                    for ($i=0; $i < $row['Rating']; $i++) { 
                        $output .= '<i class="fas fa-star" style="color: #2575fc;"></i>';
                    }
    $output .= '</td>
                    <td>
                        <button class="btn btn-sm me-1 View" id="'.$row['id'].'" style="background: linear-gradient(45deg, #4b6cb7, #182848); color: white;">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="btn btn-sm Book" id="'.$row['id'].'" style="background: linear-gradient(45deg, #11998e, #38ef7d); color: white;">
                            <i class="fas fa-calendar-check me-1"></i>Book
                        </button>
                    </td>
                </tr>';
                
    echo $output;
    $counter++;
}
?>