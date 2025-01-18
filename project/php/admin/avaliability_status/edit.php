<?php
include '../../local/connection.php';

$id = $_POST['id'];

$sql = "SELECT * FROM hospital_vaccines WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$output = '';
$output = '<div class="modal-header" style="background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%); border-radius: 10px 10px 0 0;">
                <h5 class="modal-title text-white" style="font-size: 1.2rem; letter-spacing: 0.5px;"><i class="fas fa-sync-alt me-2"></i>Update Vaccine Stock</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px);">
                <form id="update_stock_form">
                    <div class="mb-4">
                        <label class="form-label fw-bold" style="color: #6a11cb; font-size: 1rem;">Current Stock</label>
                        <div class="input-group">
                            <span class="input-group-text" style="background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%); color: white; border: none;"><i class="fas fa-box"></i></span>
                            <input type="number" class="form-control" value="'.$row['quantity'].'" name="quantity" readonly style="border: 2px solid #e0e0ff; background: rgba(255, 255, 255, 0.9); box-shadow: inset 0 2px 4px rgba(0,0,0,0.05);">
                            <input type="number" class="form-control" value="'.$row['id'].'" name="id" hidden>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold" style="color: #6a11cb; font-size: 1rem;">Add Stock</label>
                        <div class="input-group">
                            <span class="input-group-text" style="background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%); color: white; border: none;"><i class="fas fa-plus"></i></span>
                            <input type="number" class="form-control" placeholder="Enter quantity" name="add_stock" required style="border: 2px solid #e0e0ff; background: rgba(255, 255, 255, 0.9); box-shadow: inset 0 2px 4px rgba(0,0,0,0.05);">
                        </div>
                    </div>
            </div>
            <div class="modal-footer" style="background: rgba(255, 255, 255, 0.95); border-radius: 0 0 10px 10px;">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal" style="background: #f8f9fa; border: none; box-shadow: 0 2px 8px rgba(0,0,0,0.1); transition: all 0.3s ease;" onmouseover="this.style.transform=\'translateY(-2px)\'" onmouseout="this.style.transform=\'translateY(0)\'">
                    <i class="fas fa-times me-2"></i>Cancel
                </button>
                <button type="button" class="btn save" style="background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%); color: white; border: none; box-shadow: 0 2px 8px rgba(106,17,203,0.3); transition: all 0.3s ease;" onmouseover="this.style.transform=\'translateY(-2px)\'" onmouseout="this.style.transform=\'translateY(0)\'">
                    <i class="fas fa-save me-2"></i>Update Stock
                </button>
                </form>
            </div>';

echo $output;

?>