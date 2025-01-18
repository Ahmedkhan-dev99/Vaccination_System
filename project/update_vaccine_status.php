<?php session_start(); 
if(!isset($_SESSION['email'])){
    header("Location: login.php");
    exit(); // Add exit after redirect
}
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
                            <i class="fas fa-syringe fa-2x" style="color: white;"></i>
                        </div>
                        <div>
                            <h3 class="f_s_25 f_w_700 mb-0" style="background: linear-gradient(45deg, #6a11cb, #2575fc); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;">Update Vaccine Status</h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 mt-1">
                                    <li class="breadcrumb-item"><a href="#" style="color: #2575fc; text-decoration: none;">Home</a></li>
                                    <li class="breadcrumb-item active" style="color: #6a11cb;">Update Status</li>
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

        <!-- Appointment List -->
        <div class="row">
            <div class="col-12">
                <div class="card border-0 fade-up" style="background: rgba(255, 255, 255, 0.95); box-shadow: 0 4px 15px rgba(0,0,0,0.1); border-radius: 15px;">
                    <div class="card-header" style="background: linear-gradient(45deg, #6a11cb, #2575fc); border-radius: 15px 15px 0 0;">
                        <h5 class="card-title mb-0 text-white"><i class="fas fa-calendar-check me-2"></i>Today's Appointments</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table table-hover" id="childTable">
                                <thead>
                                    <tr>
                                        <th style="color: #6a11cb; font-weight: 600;">Appointment ID</th>
                                        <th style="color: #2575fc; font-weight: 600;">Child Name</th>
                                        <th style="color: #6a11cb; font-weight: 600;">Parent Name</th>
                                        <th style="color: #2575fc; font-weight: 600;">Vaccine Name</th>
                                        <th style="color: #6a11cb; font-weight: 600;">Time Slot</th>
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

<!-- Update Status Modal -->
<div class="modal fade" id="updateStatusModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content fade-up" id="updateStatusForm" style="border-radius: 15px; overflow: hidden;">
            
        </div>
    </div>
</div>

<!-- Cancel Appointment Modal -->
<div class="modal fade" id="cancelModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content fade-up" id="cancelForm" style="border-radius: 15px; overflow: hidden;">
            
        </div>
    </div>
</div>

<!-- View Report Modal -->
<div class="modal fade" id="viewReportModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content fade-up" id="viewReportForm" style="border-radius: 15px; overflow: hidden;">
            
        </div>
    </div>
</div>

<!-- cancel Report Modal -->
<div class="modal fade" id="cancelReportModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content fade-up" id="cancelReportForm" style="border-radius: 15px; overflow: hidden;">
            
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
                url: 'php/hospital/tables.php', 
                type: 'GET',
                success: function(data){
                    try {
                        $('#table_data').html(data);
                        if($.fn.DataTable.isDataTable('#childTable')) {
                            $('#childTable').DataTable().destroy();
                        }
                        $('#childTable').DataTable({
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

        // udpate Vaccine Status
        $('#childTable').on('click', '.Update', function() {
            $('#updateStatusModal').modal('show');
            var childId = $(this).attr('id');
            $.ajax({
                url: 'php/hospital/update.php',
                type: 'POST',
                data: {childId: childId},
                success: function(data){
                    $('#updateStatusForm').html(data);
                }
            });
        });

        // Store vaccine status
        $(document).on('submit', '#updateStatus', function(e){
            e.preventDefault();
            $.ajax({
                url: 'php/hospital/store.php',
                type: 'POST',
                data: $('#updateStatus').serialize(),
                success: function(response){
                    if(response == 'success'){
                        $('#updateStatusModal').modal('hide');
                        location.reload();
                    }else{
                        alert('Status update failed');
                    }
                }
            });
        });

        // Cancel Appointment
        $(document).on('click', '.Cancel', function() {
            $('#cancelModal').modal('show');
            var childId = $(this).attr('id');
            $.ajax({
                url: 'php/hospital/cancel.php',
                type: 'GET',
                data: {childId: childId},
                success: function(data){
                    $('#cancelForm').html(data);
                }
            });
        });

        // Confirm Cancel
        $(document).on('submit', '#cancelAppointmentForm', function(e) {
            e.preventDefault();
            $.ajax({
                url: 'php/hospital/delete.php',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response){
                    if(response.includes('success')){
                        $('#cancelModal').modal('hide');
                        location.reload();
                    }else{
                        alert('Appointment cancellation failed');
                    }
                }
            });
        });

        // View Report
        $(document).on('click', '.ViewReport', function() {
            $('#viewReportModal').modal('show');
            var childId = $(this).attr('id');
            $.ajax({
                url: 'php/hospital/report.php',
                type: 'GET',
                data: {childId: childId},
                success: function(data){
                    $('#viewReportForm').html(data);
                }
            });
        });

        // Cancel Report
        $(document).on('click', '.Cancelled', function() {
            $('#cancelReportModal').modal('show');
            var childId = $(this).attr('id');
            $.ajax({
                url: 'php/hospital/cancel_report.php',
                type: 'GET',
                data: {childId: childId},
                success: function(data){
                    $('#cancelReportForm').html(data);
                }
            });
        });

         // Update Vaccination Statistics
         function updateVaccinationStatistics() {
            $.ajax({
                url: 'php/hospital/statistics.php',
                type: 'GET',
                success: function(data) {
                    $('#vaccination_statistics').html(data);
                }
            });
        }
        updateVaccinationStatistics();        
    });
</script>
