<?php session_start(); 
if(!isset($_SESSION['email'])){
    header("Location: login.php");}
?>
<?php include 'layout/cdn.php'; ?>
<body class="crm_body_bg">

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
                            <h3 class="f_s_25 f_w_700 mb-0" style="background: linear-gradient(45deg, #6a11cb, #2575fc); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;">Child Details</h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 mt-1">
                                    <li class="breadcrumb-item"><a href="#" style="color: #2575fc; text-decoration: none;">Home</a></li>
                                    <li class="breadcrumb-item active" style="color: #6a11cb;">Child Details</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-lg px-4 pulse" style="background: linear-gradient(45deg, #6a11cb, #2575fc); color: white; border-radius: 25px; box-shadow: 0 4px 15px rgba(0,0,0,0.2);" data-bs-toggle="modal" data-bs-target="#addChildModal">
                            <i class="fas fa-plus-circle me-2"></i> Add Child
                        </button>
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
                                <h5 class="card-title mb-0 text-white"><i class="fas fa-list me-2"></i>My Children</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table table-hover" id="childTable">
                                <thead>
                                    <tr>
                                        <th style="color: #6a11cb; font-weight: 600;">Child ID</th>
                                        <th style="color: #2575fc; font-weight: 600;">Name</th>
                                        <th style="color: #6a11cb; font-weight: 600;">Date of Birth</th>
                                        <th style="color: #2575fc; font-weight: 600;">Age</th>
                                        <th style="color: #6a11cb; font-weight: 600;">Gender</th>
                                        <th style="color: #2575fc; font-weight: 600;">Blood Group</th>
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

<!-- Add Child Modal -->
<div class="modal fade" id="addChildModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content fade-up" style="border-radius: 15px; overflow: hidden;">
            <div class="modal-header" style="background: linear-gradient(45deg, #6a11cb, #2575fc);">
                <h5 class="modal-title text-white"><i class="fas fa-plus-circle me-2"></i>Add New Child</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <form class="row g-3" id="formAdd">
                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="color: #6a11cb;"><i class="fas fa-user me-2"></i>First Name</label>
                        <input type="text" class="form-control" name="name" required style="border: 2px solid #6a11cb; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                        <input type="hidden" class="form-control" name="parent_id" value="<?php echo $_SESSION['user_id']; ?>" required>
                    </div>
                    
                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="color: #2575fc;"><i class="fas fa-calendar me-2"></i>Date of Birth</label>
                        <input type="date" class="form-control" name="dob" required style="border: 2px solid #2575fc; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="color: #6a11cb;"><i class="fas fa-venus-mars me-2"></i>Gender</label>
                        <select class="form-select" name="gender" required style="border: 2px solid #6a11cb; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                            <option value="" disabled selected>Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="color: #2575fc;"><i class="fas fa-tint me-2"></i>Blood Group</label>
                        <select class="form-select" name="blood_group" required style="border: 2px solid #2575fc; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                            <option value="" disabled selected>Select Blood Group</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                        </select>
                    </div>
                   
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" id="add" class="btn add pulse" style="background: linear-gradient(45deg, #6a11cb, #2575fc); color: white; border-radius: 25px; padding: 8px 25px;">
                    <i class="fas fa-plus-circle me-2"></i>Add Child
                </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- View Child Modal -->
<div class="modal fade" id="viewChildModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content fade-up" id="childDetails" style="border-radius: 15px; overflow: hidden;">
            
        </div>
    </div>
</div>

<!-- Edit Child Modal -->
<div class="modal fade" id="editChildModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content fade-up" id="childUpdate" style="border-radius: 15px; overflow: hidden;">
            
        </div>
    </div>
</div>

<!-- Vaccination History Modal -->
<div class="modal fade" id="vaccinationHistoryModal" tabindex="-1">
    <div class="modal-dialog modal-lg" id="vaccination_history">
        
    </div>
</div>

<!-- footer  -->
<?php include 'layout/footer.php'; ?>
<!-- footer END -->
</section>

<script>
    $(document).ready(function(){
        var table; 

        // Table data
        function loaddata(){
            $.ajax({
                url: 'php/parent/child/table_details.php',
                type: 'GET',
                data: {
                    user_id: <?php echo $_SESSION['user_id']; ?>
                },
                success: function(data){
                    $('#table_data').html(data);
                    
                    if ($.fn.DataTable.isDataTable('#childTable')) {
                        $('#childTable').DataTable().destroy();
                    }

                    table = $('#childTable').DataTable({
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
                }
            });
        }
        loaddata();

        $(document).on('click', '.view', function() {
            $('#viewChildModal').modal('show');
            var childId = $(this).attr('id');
            $.ajax({
                url: 'php/parent/child/child_view.php',
                type: 'GET',
                data: { childId: childId },
                success: function(data) {
                    $('#childDetails').html(data);
                }
            });
        });

        $(document).on('click', '.edit', function() {
            $('#editChildModal').modal('show');
            var childId = $(this).attr('id');
            $.ajax({
                url: 'php/parent/child/child_update.php',
                type: 'GET',
                data: { childId: childId },
                success: function(data) {
                    $('#childUpdate').html(data);
                }
            });
        });

        $(document).on('click', '.update', function(e) {
            e.preventDefault(); 
            $.ajax({
                url: 'php/parent/child/update.php',
                type: 'POST',
                data: $('#formUpdate').serialize(),
                success: function(data) {
                    if(data == "success"){
                        $('#editChildModal').modal('hide');
                        location.reload();
                    }else{
                        alert("Failed to update child details");
                    }
                }
            });
        });

        $(document).on('click', '.add', function(e) {
            e.preventDefault(); 
            $.ajax({
                url: 'php/parent/child/add.php',
                type: 'POST',
                data: $('#formAdd').serialize(),
                success: function(data) {
                    if(data == "success"){
                        $('#addChildModal').modal('hide');
                        location.reload();
                    }else{
                        alert("Failed to add child details");
                    }
                }
            });
        });

        $(document).on('click', '.vaccination', function() {
            $('#vaccinationHistoryModal').modal('show');
            var childId = $(this).attr('id');
            $.ajax({
                url: 'php/parent/child/child_view.php',
                type: 'GET',
                data: { childId: childId },
                success: function(data) {
                    $('#childDetails').html(data);
                }
            });
        });

        $(document).on('click', '.delete', function() {
            var childId = $(this).attr('id');
            if(confirm('Are you sure you want to delete this child record?')) {
                $.ajax({
                    url: 'php/parent/child/child_delete.php',
                    type: 'GET',
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
            }
        });
        
        $(document).on('click', '.vaccination', function() {
            var childId = $(this).attr('id');
                $.ajax({
                    url: 'php/parent/child/vaccination_history.php',
                    type: 'GET',
                    data: { childId: childId },
                    success: function(data) {
                        $('#vaccination_history').html(data);
                    }
                });
            
        });

        
    });
</script>
