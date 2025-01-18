<?php
include_once '../../local/connection.php';

$sql = "SELECT c.*, u.name as parent_name, u.email as parent_email, u.contact as parent_phone 
    FROM children c JOIN users u ON c.parent_id = u.id";

$result = mysqli_query($conn, $sql);
$children = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach($children as $child):
    static $counter = '#001';
    $child['age'] = (new DateTime())->diff(new DateTime($child['dob']))->y;
    $output = '';
    $output .= '<tr style="background: rgba(255, 255, 255, 0.9); transition: all 0.3s ease;" 
                onmouseover="this.style.background=\'rgba(106,17,203,0.05)\'" 
                onmouseout="this.style.background=\'rgba(255, 255, 255, 0.9)\'">';
    $output .= '<td class="fw-bold" style="color: #6a11cb;">'.$counter.'</td>';
    $output .= '<td style="color: #2575fc;">'.$child['name'].'</td>';
    $output .= '<td><span class="badge" style="background: linear-gradient(45deg, #6a11cb, #2575fc);">'.$child['age'].' years</span></td>';
    $output .= '<td style="color: #6a11cb;">'.$child['parent_name'].'</td>';
    $output .= '<td style="color: #2575fc;">'.$child['parent_phone'].'</td>';
    $output .= '<td style="color: #6a11cb;">'.$child['dob'].'</td>';
    $output .= "<td>
            <button class='btn btn-sm me-1 view' style='background: linear-gradient(45deg, #6a11cb, #2575fc); color: white;' id={$child['id']}>
                <i class='fas fa-eye'></i>
            </button>
            <button class='btn btn-sm me-1 edit' style='background: linear-gradient(45deg, #2ecc71, #27ae60); color: white;' id={$child['id']}>
                <i class='fas fa-edit'></i>
            </button>
            <button class='btn btn-sm delete' style='background: linear-gradient(45deg, #e74c3c, #c0392b); color: white;' id={$child['id']}>
                <i class='fas fa-trash'></i>
            </button>
        </td>";
    $output .= '</tr>';
    $counter++;
    echo $output;
endforeach;

?>
