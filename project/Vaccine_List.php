<?php session_start(); 
if(!isset($_SESSION['email'])){
    header("Location: login.php");
}
?>
<?php include 'layout/cdn.php'; ?>
<body class="crm_body_bg" style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);">

<!-- sidebar  -->
<?php include 'layout/sidebar.php'; ?>
<!--/ sidebar  -->

<section class="main_content dashboard_part large_header_bg">
<!-- Navbar  -->
<?php include 'layout/navbar.php'; ?>
<!--/ Navbar  -->

<div class="main_content_iner overly_inner">
    <div class="container-fluid p-0">
        <!-- page title  -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="page_title_box d-flex align-items-center justify-content-between fade-up" style="background: rgba(255, 255, 255, 0.9); box-shadow: 0 4px 15px rgba(0,0,0,0.1); border-radius: 10px; padding: 20px;">
                    <div class="page_title_left d-flex align-items-center">
                        <div class="rounded-circle p-3 me-3" style="background: linear-gradient(45deg, #6a11cb, #2575fc);">
                            <i class="fas fa-syringe fa-2x" style="color: white;"></i>
                        </div>
                        <div>
                            <h3 class="f_s_25 f_w_700 mb-0" style="background: linear-gradient(45deg, #6a11cb, #2575fc); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;">Vaccine List</h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 mt-1">
                                    <li class="breadcrumb-item"><a href="#" style="color: #2575fc; text-decoration: none;">Home</a></li>
                                    <li class="breadcrumb-item active" style="color: #6a11cb;">Vaccines</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Vaccine List Table -->
        <div class="row">
            <div class="col-12">
                <div class="card border-0 slide-left" style="background: rgba(255, 255, 255, 0.95); box-shadow: 0 4px 15px rgba(0,0,0,0.1); border-radius: 15px;">
                    <div class="card-header" style="background: linear-gradient(45deg, #6a11cb, #2575fc); border-radius: 15px 15px 0 0;">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="card-title mb-0 text-white"><i class="fas fa-list me-2"></i>Available Vaccines</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table table-hover" id="childTable">
                                <thead>
                                    <tr>
                                        <th style="color: #6a11cb; font-weight: 600;">Vaccine ID</th>
                                        <th style="color: #2575fc; font-weight: 600;">Vaccine Name</th>
                                        <th style="color: #6a11cb; font-weight: 600;">Age Group</th>
                                        <th style="color: #2575fc; font-weight: 600;">Doses Required</th>
                                        <th style="color: #6a11cb; font-weight: 600;">Gap Between Doses</th>
                                        <th style="color: #2575fc; font-weight: 600;">Availability</th>
                                    </tr>
                                </thead>
                                <tbody id="vaccineTable">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Vaccine Modal -->
<div class="modal fade" id="editVaccineModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content fade-up" style="border-radius: 15px; overflow: hidden;">
            <div class="modal-header" style="background: linear-gradient(45deg, #6a11cb, #2575fc);">
                <h5 class="modal-title text-white"><i class="fas fa-edit me-2"></i>Update Vaccine Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <form class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="color: #6a11cb;"><i class="fas fa-syringe me-2"></i>Vaccine Name</label>
                        <input type="text" class="form-control" value="BCG" style="border: 2px solid #6a11cb; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="color: #2575fc;"><i class="fas fa-users me-2"></i>Age Group</label>
                        <input type="text" class="form-control" value="0-1 month" style="border: 2px solid #2575fc; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="color: #6a11cb;"><i class="fas fa-list-ol me-2"></i>Doses Required</label>
                        <input type="number" class="form-control" value="1" style="border: 2px solid #6a11cb; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="color: #2575fc;"><i class="fas fa-clock me-2"></i>Gap Between Doses</label>
                        <input type="text" class="form-control" value="N/A" style="border: 2px solid #2575fc; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="color: #6a11cb;"><i class="fas fa-check-circle me-2"></i>Availability Status</label>
                        <select class="form-select" style="border: 2px solid #6a11cb; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                            <option value="available">Available</option>
                            <option value="low">Low Stock</option>
                            <option value="out">Out of Stock</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" style="background: #6c757d; color: white; border-radius: 25px; padding: 8px 25px;" data-bs-dismiss="modal">
                    <i class="fas fa-times-circle me-2"></i>Cancel
                </button>
                <button type="button" class="btn" style="background: linear-gradient(45deg, #6a11cb, #2575fc); color: white; border-radius: 25px; padding: 8px 25px;">
                    <i class="fas fa-save me-2"></i>Save Changes
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Vaccine Modal -->
<div class="modal fade" id="deleteVaccineModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content fade-up" style="border-radius: 15px; overflow: hidden;">
            <div class="modal-header" style="background: linear-gradient(45deg, #ff6491, #ff8d72);">
                <h5 class="modal-title text-white"><i class="fas fa-trash-alt me-2"></i>Delete Vaccine</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <p class="mb-0">Are you sure you want to delete this vaccine? This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" style="background: #6c757d; color: white; border-radius: 25px; padding: 8px 25px;" data-bs-dismiss="modal">
                    <i class="fas fa-times-circle me-2"></i>Cancel
                </button>
                <button type="button" class="btn" style="background: linear-gradient(45deg, #ff6491, #ff8d72); color: white; border-radius: 25px; padding: 8px 25px;">
                    <i class="fas fa-trash-alt me-2"></i>Delete
                </button>
            </div>
        </div>
    </div>
</div>

<!-- footer  -->
<?php include 'layout/footer.php'; ?>
<!-- footer END -->
</section>

<script>
    $(document).ready(function(){
        function loaddata(){
            $.ajax({
                url: 'php/admin/vaccines_list.php',
                type: 'GET',
                success: function(data){
                    try {
                        $('#vaccineTable').html(data);
                        if($.fn.DataTable.isDataTable('#childTable')) {
                            $('#childTable').DataTable().destroy();
                        }
                        $('#childTable').DataTable({
                            responsive: true,
                            lengthMenu: [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
                            pageLength: 5,
                            order: [[0, 'asc']],
                            pagingType: 'simple',
                            language: {
                                paginate: {
                                    previous: '<i class="fas fa-chevron-left"></i>',
                                    next: '<i class="fas fa-chevron-right"></i>'
                                }
                            },
                            dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>rtip',
                            initComplete: function() {
                                $('.dataTables_filter input').addClass('form-control').css({
                                    'border': '2px solid #6a11cb',
                                    'border-radius': '8px',
                                    'box-shadow': '0 2px 5px rgba(0,0,0,0.1)'
                                });
                                $('.dataTables_length select').addClass('form-select').css({
                                    'border': '2px solid #2575fc',
                                    'border-radius': '8px',
                                    'box-shadow': '0 2px 5px rgba(0,0,0,0.1)'
                                });
                            }
                        });
                    } catch(e) {
                        console.error('Error processing data:', e);
                        $('#table_data').html('<tr><td colspan="7" class="text-center">Error loading data</td></tr>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Ajax error:', error);
                    $('#table_data').html('<tr><td colspan="7" class="text-center">Failed to load data</td></tr>');
                }
            });
        }
        loaddata();
    });
</script>