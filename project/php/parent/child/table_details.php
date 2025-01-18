<?php
include_once '../../local/connection.php';

$user_id = $_GET['user_id'];
$sql = "SELECT c.*, u.name as parent_name, u.email as parent_email, u.contact as parent_phone 
    FROM children c JOIN users u ON c.parent_id = u.id WHERE c.parent_id = '$user_id'";

$result = mysqli_query($conn, $sql);
$children = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach($children as $child):
    static $counter = 1;
    $child['age'] = (new DateTime())->diff(new DateTime($child['dob']))->y;
    $output = '';
    $output .= '<tr style="background: rgba(255, 255, 255, 0.9);">';
    $output .= '<td style="color: #6a11cb;">'.$counter.'</td>';
    $output .= '<td style="color: #2575fc;">'.$child['name'].'</td>';
    $output .= '<td style="color: #6a11cb;">'.$child['dob'].'</td>';
    $output .= '<td style="color: #2575fc;">'.$child['age'].' years</td>';
    $output .= '<td style="color: #6a11cb;">'.$child['gender'].'</td>';
    $output .= '<td style="color: #2575fc;">'.$child['blood_group'].'</td>';
    $output .= '<td>
            <button class="btn btn-sm me-1 view" id="'.$child['id'].'" style="background: linear-gradient(45deg, #4CAF50, #45a049); color: white;">
                <i class="fas fa-eye"></i>
            </button>
            <button class="btn btn-sm me-1 edit" id="'.$child['id'].'" style="background: linear-gradient(45deg, #2196F3, #0d47a1); color: white;">
                <i class="fas fa-edit"></i>
            </button>
            <button class="btn btn-sm me-1 vaccination" id="'.$child['id'].'" style="background: linear-gradient(45deg, #9C27B0, #7B1FA2); color: white;">
                <i class="fas fa-syringe"></i>
            </button>
            <button class="btn btn-sm delete" id="'.$child['id'].'" style="background: linear-gradient(45deg, #f44336, #d32f2f); color: white;">
                <i class="fas fa-trash"></i>
            </button>
        </td>
        </tr>';
    echo $output;
    $counter++;
endforeach;

?>
