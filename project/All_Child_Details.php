<?php session_start(); 
if(!isset($_SESSION['email'])){
    header("Location: login.php");
}
include 'layout/cdn.php';
?>
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
                            <i class="fas fa-child fa-2x" style="color: white;"></i>
                        </div>
                        <div>
                            <h3 class="f_s_25 f_w_700 mb-0" style="background: linear-gradient(45deg, #6a11cb, #2575fc); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;">All Child Details</h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 mt-1">
                                    <li class="breadcrumb-item"><a href="#" style="color: #2575fc; text-decoration: none;">Home</a></li>
                                    <li class="breadcrumb-item active" style="color: #6a11cb;">Child Details</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Child Details Card -->
        <div class="row">
            <div class="col-12">
                <div class="card border-0 slide-left" style="background: rgba(255, 255, 255, 0.95); box-shadow: 0 4px 15px rgba(0,0,0,0.1); border-radius: 15px;">
                    <div class="card-header" style="background: linear-gradient(45deg, #6a11cb, #2575fc); border-radius: 15px 15px 0 0;">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="card-title mb-0 text-white"><i class="fas fa-list me-2"></i>All Children List</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table table-hover" id="childTable">
                                <thead>
                                    <tr>
                                        <th style="color: #2575fc; font-weight: 600;">Child ID</th>
                                        <th style="color: #6a11cb; font-weight: 600;">Name</th>
                                        <th style="color: #6a11cb; font-weight: 600;">Age</th>
                                        <th style="color: #2575fc; font-weight: 600;">Parent Name</th>
                                        <th style="color: #6a11cb; font-weight: 600;">Contact</th>
                                        <th style="color: #2575fc; font-weight: 600;">Date of Birth</th>
                                        <th style="color: #6a11cb; font-weight: 600;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="table_data">
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- footer  -->
<?php include 'layout/footer.php'; ?>
<!-- footer END -->
</section>

<!-- View Modal -->
<div class="modal fade" id="viewModal1" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content fade-up" style="border-radius: 15px; overflow: hidden;">
            <div class="modal-header" style="background: linear-gradient(45deg, #6a11cb, #2575fc);">
                <h5 class="modal-title text-white"><i class="fas fa-eye me-2"></i>Child Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row" id="childDetails">
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn pulse" style="background: linear-gradient(45deg, #6a11cb, #2575fc); color: white; border-radius: 25px; padding: 8px 25px;" data-bs-dismiss="modal">
                    <i class="fas fa-times-circle me-2"></i>Close
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content fade-up" id="editChildDetails" style="border-radius: 15px; overflow: hidden;">
            
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal1" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content fade-up" style="border-radius: 15px; overflow: hidden;">
            <div class="modal-header" style="background: linear-gradient(45deg, #6a11cb, #2575fc);">
                <h5 class="modal-title text-white"><i class="fas fa-trash-alt me-2"></i>Delete Confirmation</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <p class="mb-0">Are you sure you want to delete this child's record? This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn pulse" style="border: 2px solid #6a11cb; color: #6a11cb; border-radius: 25px;" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>Cancel
                </button>
                <button type="button" class="btn pulse" style="background: linear-gradient(45deg, #6a11cb, #2575fc); color: white; border-radius: 25px;">
                    <i class="fas fa-trash-alt me-2"></i>Delete
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Table data
        function loaddata() {
            $.ajax({
                url: 'php/admin/All_Child_Details/table.php',
                type: 'GET',
                data: {
                    user_id: <?php echo $_SESSION['user_id']; ?>
                },
                success: function(data) {
                    $('#table_data').html(data);
                    
                    if ($.fn.DataTable.isDataTable('#childTable')) {
                        $('#childTable').DataTable().destroy();
                    }

                    table = $('#childTable').DataTable({
                        responsive: true,
                        lengthMenu: [[6, 10, 25, 50, -1], [6, 10, 25, 50, "All"]],
                        pageLength: 6,
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
                }
            });
        }

        loaddata();

        // View Child Details
        $('#childTable').on('click', '.view', function() {
            $('#viewModal1').modal('show');
            var childId = $(this).attr('id');
            $.ajax({
                url: 'php/admin/All_Child_Details/Child_View.php',
                type: 'GET',
                data: { childId: childId },
                success: function(data) {
                    $('#childDetails').html(data);
                }
            });
        });

        // Edit Child Details  
        $('#childTable').on('click', '.edit', function() {
            $('#editModal').modal('show');
            var childId = $(this).attr('id');
            $.ajax({
                url: 'php/admin/All_Child_Details/edit_child.php',
                type: 'POST',
                data: { childId: childId },
                success: function(data) {
                    $('#editChildDetails').html(data);
                }
            });
        });

        // Store child details
        $(document).on('click', '.save', function() {
            var childId = $(this).attr('id');
            $('#editModal').modal('hide');
            $.ajax({
                url: 'php/admin/All_Child_Details/store.php',
                type: 'POST',
                data: $('#editChildForm').serialize(),
                success: function(data) {    
                    if(data == 'success'){
                        $('#childTable').DataTable().destroy();
                        loaddata();
                    }else{
                        alert('Failed to update child details');
                    }
                }
            });
        });

        // Delete Child Details
        $('#childTable').on('click', '.delete', function() {
            var childId = $(this).attr('id');

            $.ajax({
                url: 'php/admin/All_Child_Details/delete_child.php',
                type: 'POST',
                data: { childId: childId },
                success: function(data) {
                    if(data == "success"){
                        $('#childTable').DataTable().destroy();
                        loaddata();
                    }else{
                        alert("Failed to delete child details");
                    }
                }
            });
        });
    });
</script>
