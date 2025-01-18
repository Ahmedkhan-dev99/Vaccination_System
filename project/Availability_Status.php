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
                            <h3 class="f_s_25 f_w_700 mb-0" style="background: linear-gradient(45deg, #6a11cb, #2575fc); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;">Vaccine Availability Status</h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 mt-1">
                                    <li class="breadcrumb-item"><a href="#" style="color: #2575fc; text-decoration: none;">Home</a></li>
                                    <li class="breadcrumb-item active" style="color: #6a11cb;">Vaccine Status</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-lg px-4 add_vaccine" style="background: linear-gradient(45deg, #6a11cb, #2575fc); color: white; border-radius: 25px; box-shadow: 0 4px 15px rgba(0,0,0,0.2);">
                            <i class="fas fa-plus-circle me-2"></i>Add Vaccine to Hospital
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hospital Statistics -->
        <div class="row mb-4 slide-left" id="hospital_statistics">
            
        </div>

        <!-- Vaccine Status Table -->
        <div class="row">
            <div class="col-12">
                <div class="card border-0 fade-up" style="background: rgba(255, 255, 255, 0.95); box-shadow: 0 4px 15px rgba(0,0,0,0.1); border-radius: 15px;">
                    <div class="card-header" style="background: linear-gradient(45deg, #6a11cb, #2575fc); border-radius: 15px 15px 0 0;">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="card-title mb-0 text-white"><i class="fas fa-list me-2"></i>Vaccine Status</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table table-hover" id="data_table">
                                <thead>
                                    <tr>
                                        <th style="color: #6a11cb; font-weight: 600;">Vaccine ID</th>
                                        <th style="color: #2575fc; font-weight: 600;">Vaccine Name</th>
                                        <th style="color: #6a11cb; font-weight: 600;">Hospital Name</th>
                                        <th style="color: #2575fc; font-weight: 600;">Last Updated</th>
                                        <th style="color: #6a11cb; font-weight: 600;">Quantity</th>
                                        <th style="color: #2575fc; font-weight: 600;">Current Stock</th>
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

<!-- Update Stock Modal -->
<div class="modal fade" id="updateStockModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content" id="update_stock_modal" style="border-radius: 15px; overflow: hidden;">
            
        </div>
    </div>
</div>

<!-- Add Vaccine Modal -->
<div class="modal fade" id="addVaccineModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content" id="add_vaccine_modal" style="border-radius: 15px; overflow: hidden;">
            
        </div>
    </div>
</div>

<!-- footer  -->
<?php include 'layout/footer.php'; ?>
<!-- footer END -->
</section>

<script>
    $(document).ready(function() {
        // Table data
        function loaddata() {
            $.ajax({
                url: 'php/admin/avaliability_status/tables.php',
                type: 'GET',
                success: function(data) {
                    $('#table_data').html(data);     
                    // Agar table pehle se initialize hai to destroy kar dein
                    if ($.fn.DataTable.isDataTable('#data_table')) {
                        $('#data_table').DataTable().destroy();
                    }

                    // Phir naya DataTable initialize karein
                    table = $('#data_table').DataTable({
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
        
        // Edit Child Details
        $('#data_table').on('click', '.edit', function() {
            $('#updateStockModal').modal('show');
            var id = $(this).attr('id');
            $.ajax({
                url: 'php/admin/avaliability_status/edit.php',
                type: 'POST',
                data: { id: id },
                success: function(data) {
                    $('#update_stock_modal').html(data);
                }
            });
        });

        // Store child details
        $(document).on('click', '.save', function() {
            var childId = $(this).attr('id');
            $('#editModal').modal('hide');
            $.ajax({
                url: 'php/admin/avaliability_status/update.php',
                type: 'POST',
                data: $('#update_stock_form').serialize(),
                success: function(data) {
                    if(data == 'success'){
                        location.reload();
                    }else{
                        alert('Failed to update vaccine stock');
                    }
                }
            });
        });

        // Add Vaccine
        $(document).on('click', '.add_vaccine', function() {
            $('#addVaccineModal').modal('show');
            $.ajax({
                url: 'php/admin/avaliability_status/add_vaccine.php',
                type: 'POST',
                success: function(data) {
                    $('#add_vaccine_modal').html(data);
                }
            });
        });

        // store Vaccine
        $(document).on('click', '.add', function() {
            $('#addVaccineModal').modal('hide');
            $.ajax({
                url: 'php/admin/avaliability_status/store.php',
                type: 'POST',
                data: $('#add_vaccine_form').serialize(),
                success: function(data) {
                    if(data == 'success'){
                        location.reload();
                    }
                    else if(data == 'duplicate'){
                        alert('Vaccine already exists for this hospital');
                    }
                    else{
                        alert('Failed to add vaccine');
                    }
                }
            });
        });

        // Update Hospital Statistics
        function updateHospitalStatistics() {
            $.ajax({
                url: 'php/admin/avaliability_status/statistics.php',
                type: 'GET',
                success: function(data) {
                    $('#hospital_statistics').html(data);
                }
            });
        }

        updateHospitalStatistics();
    });
</script>