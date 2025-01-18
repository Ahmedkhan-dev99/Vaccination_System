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
                            <i class="fas fa-file-medical fa-2x" style="color: white;"></i>
                        </div>
                        <div>
                            <h3 class="f_s_25 f_w_700 mb-0" style="background: linear-gradient(45deg, #6a11cb, #2575fc); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;">Vaccination Reports</h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 mt-1">
                                    <li class="breadcrumb-item"><a href="#" style="color: #2575fc; text-decoration: none;">Home</a></li>
                                    <li class="breadcrumb-item active" style="color: #6a11cb;">Reports</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Report Statistics -->
        <div class="row mb-4 slide-left" id="vaccination_statistics">
                
        </div>

        <!-- Detailed Report Table -->
        <div class="row">
            <div class="col-12">
                <div class="card border-0 fade-up" style="background: rgba(255, 255, 255, 0.95); box-shadow: 0 4px 15px rgba(0,0,0,0.1); border-radius: 15px;">
                    <div class="card-header" style="background: linear-gradient(45deg, #6a11cb, #2575fc); border-radius: 15px 15px 0 0;">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="card-title mb-0 text-white"><i class="fas fa-list me-2"></i>Detailed Vaccination Report</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table table-hover" id="childTable">
                                <thead>
                                    <tr>
                                        <th style="color: #6a11cb; font-weight: 600;">Child ID</th>
                                        <th style="color: #2575fc; font-weight: 600;">Child Name</th>
                                        <th style="color: #6a11cb; font-weight: 600;">Vaccine Type</th>
                                        <th style="color: #2575fc; font-weight: 600;">Hospital</th>
                                        <th style="color: #6a11cb; font-weight: 600;">Date</th>
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

<!-- View Report Modal -->
<div class="modal fade" id="viewModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content fade-up" style="border-radius: 15px; overflow: hidden;">
            <div class="modal-header" style="background: linear-gradient(45deg, #6a11cb, #2575fc);">
                <h5 class="modal-title text-white"><i class="fas fa-eye me-2"></i>Report Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4" id="childDetails">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn pulse" style="background: linear-gradient(45deg, #6a11cb, #2575fc); color: white; border-radius: 25px; padding: 8px 25px;" data-bs-dismiss="modal">
                    <i class="fas fa-times-circle me-2"></i>Close
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        function loaddata(){
            $.ajax({
                url: 'php/admin/Vaccine_Report/table.php',
                type: 'GET',
                success: function(data){
                    $('#table_data').html(data);
                    $('#childTable').DataTable({
                        responsive: true,
                        lengthMenu: [[6,10, 25, 50, -1], [6,10, 25, 50, "All"]],
                        pageLength: 6,
                        order: [[0, 'asc']],
                        pagingType: 'simple',
                        language: {
                            paginate: {
                                previous: '<i class="fas fa-chevron-left" style="color: #6a11cb;"></i>',
                                next: '<i class="fas fa-chevron-right" style="color: #6a11cb;"></i>'
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

        // Single Child Details
        $('#childTable').on('click', '.view', function() {
            $('#viewModal').modal('show');
            var childId = $(this).attr('id');
            $.ajax({
                url: 'php/admin/Vaccine_Report/View.php',
                type: 'GET',
                data: { childId: childId },
                success: function(data) {
                    $('#childDetails').html(data);
                }
            });
        });
    
        // Update Vaccination Statistics
        function updateVaccinationStatistics() {
            $.ajax({
                url: 'php/admin/Vaccine_Report/statistics.php',
                type: 'GET',
                success: function(data) {
                    $('#vaccination_statistics').html(data);
                }
            });
        }
        updateVaccinationStatistics();
    });
</script>
