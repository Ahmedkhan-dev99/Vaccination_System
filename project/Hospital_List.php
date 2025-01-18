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
                            <i class="fas fa-hospital fa-2x" style="color: white;"></i>
                        </div>
                        <div>
                            <h3 class="f_s_25 f_w_700 mb-0" style="background: linear-gradient(45deg, #6a11cb, #2575fc); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;">Hospital List</h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 mt-1">
                                    <li class="breadcrumb-item"><a href="#" style="color: #2575fc; text-decoration: none;">Home</a></li>
                                    <li class="breadcrumb-item active" style="color: #6a11cb;">Hospitals</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-auto">
                        <a href="Add_Hospital.php" class="btn btn-lg px-4" style="background: linear-gradient(45deg, #6a11cb, #2575fc); color: white; border-radius: 25px; box-shadow: 0 4px 15px rgba(0,0,0,0.2);">
                            <i class="fas fa-plus-circle me-2"></i>Add New Hospital
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hospital Statistics -->
        <div class="row mb-4 slide-left" id="hospital_statistics">
            
        </div>

        <!-- Hospital List Table -->
        <div class="row">
            <div class="col-12">
                <div class="card border-0 fade-up " style="background: rgba(255, 255, 255, 0.95); box-shadow: 0 4px 15px rgba(0,0,0,0.1); border-radius: 15px;">
                    <div class="card-header" style="background: linear-gradient(45deg, #6a11cb, #2575fc); border-radius: 15px 15px 0 0;">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="card-title mb-0 text-white"><i class="fas fa-list me-2"></i>Registered Hospitals</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table table-hover" id="childTable">
                                <thead>
                                    <tr>
                                        <th style="color: #6a11cb; font-weight: 600;">Hospital ID</th>
                                        <th style="color: #2575fc; font-weight: 600;">Hospital Name</th>
                                        <th style="color: #6a11cb; font-weight: 600;">Registration No</th>
                                        <th style="color: #2575fc; font-weight: 600;">Phone</th>
                                        <th style="color: #6a11cb; font-weight: 600;">City</th>
                                        <th style="color: #2575fc; font-weight: 600;">Status</th>
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

<!-- View Hospital Modal -->
<div class="modal fade" id="viewHospitalModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="border-radius: 15px; overflow: hidden;" id="childDetails">
            
        </div>
    </div>
</div>

<!-- Edit Hospital Modal -->
<div class="modal fade" id="editHospitalModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="border-radius: 15px; overflow: hidden;" id="hospitalUpdate">
            
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        var table;

        // Table data 
        function loaddata(){
            $.ajax({
                url: 'php/admin/hospital_list/tables.php',
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
                        lengthMenu: [[6,10, 25, 50, -1], [6,10, 25, 50, "All"]],
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

        $(document).on('click', '.view', function() {
            $('#viewHospitalModal').modal('show');
            var hospital_Id = $(this).attr('id');
            $.ajax({
                url: 'php/admin/hospital_list/view.php',
                type: 'GET',
                data: { hospital_Id: hospital_Id },
                success: function(data) {
                    $('#childDetails').html(data);
                }
            });
        });

        $(document).on('click', '.edit', function() {
            $('#editHospitalModal').modal('show');
            var hospitalId = $(this).attr('id');
            $.ajax({
                url: 'php/admin/hospital_list/edit.php',
                type: 'GET',
                data: { hospitalId: hospitalId },
                success: function(data) {
                    $('#hospitalUpdate').html(data);
                }
            });
        });

        $(document).on('click', '.update', function(e) {
            e.preventDefault(); 
            $.ajax({
                url: 'php/admin/hospital_list/update.php',
                type: 'POST',
                data: $('#formUpdate').serialize(),
                success: function(data) {
                    if(data == "success"){
                        $('#editHospitalModal').modal('hide');
                        location.reload();
                    }else{
                        alert("Failed to update hospital details");
                    }
                }
            });
        });

        $(document).on('click', '.delete', function() {
            var hospitalId = $(this).attr('id');
            if(confirm('Are you sure you want to delete this hospital record?')) {
                $.ajax({
                    url: 'php/admin/hospital_list/delete.php',
                    type: 'GET',
                    data: { hospitalId: hospitalId },
                    success: function(data) {
                        if(data == "success"){
                            $('#childTable').DataTable().destroy();
                            loaddata();
                        }else{
                            alert("Failed to delete hospital details");
                        }
                    }
                });
            }
        });

        // Update Hospital Statistics
        function updateHospitalStatistics() {
            $.ajax({
                url: 'php/admin/hospital_list/statistics.php',
                type: 'GET',
                success: function(data) {
                    $('#hospital_statistics').html(data);
                }
            });
        }
        updateHospitalStatistics();
    });
</script>