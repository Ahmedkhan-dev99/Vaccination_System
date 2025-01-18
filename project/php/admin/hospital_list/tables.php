<?php
include '../../local/connection.php';

$sql = 'SELECT * FROM hospitals';

$result = mysqli_query($conn, $sql);

$output = '';

while ($row = mysqli_fetch_assoc($result)) {
    static $counter = '#001';
    $status_class = match(strtolower($row['status'])) {
        'active' => 'bg-success',
        'inactive' => 'bg-warning',
    };
    $output = '<tr style="background: rgba(255, 255, 255, 0.9);">
                    <td style="color: #6a11cb;">' . $counter . '</td>
                    <td style="color: #2575fc;">' . $row['name'] . '</td>
                    <td style="color: #6a11cb;">' . $row['registration'] . '</td>
                    <td style="color: #2575fc;">' . $row['phone'] . '</td>
                    <td style="color: #6a11cb;">' . $row['city'] . '</td>
                    <td><span class="badge '.$status_class.'" style="box-shadow: 0 2px 5px rgba(0,0,0,0.1);">' . $row['status'] . '</span></td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary view" id='.$row['id'].' style="background: linear-gradient(45deg, #4CAF50, #45a049); color: white; border: none;">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-info edit" id='.$row['id'].' style="background: linear-gradient(45deg, #2196F3, #1976D2); color: white; border: none;">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-danger delete" id='.$row['id'].' style="background: linear-gradient(45deg, #f44336, #d32f2f); color: white; border: none;">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                ';

    echo $output;
    $counter++;
}
