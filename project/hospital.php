<?php include 'layout/cdn.php'; ?>
<?php session_start(); 
if(!isset($_SESSION['email'])){
    header("Location: login.php");
}
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
                            <i class="fas fa-hospital fa-2x" style="color: white;"></i>
                        </div>
                        <div>
                            <h3 class="f_s_25 f_w_700 mb-0" style="background: linear-gradient(45deg, #6a11cb, #2575fc); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;">Hospital Dashboard</h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 mt-1">
                                    <li class="breadcrumb-item"><a href="#" style="color: #2575fc; text-decoration: none;">Home</a></li>
                                    <li class="breadcrumb-item active" style="color: #6a11cb;">Hospital Dashboard</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row mb-4">
            <div class="col-xl-6 fade-up" id="appointments">
               
            </div>

            <div class="col-xl-6 fade-up" id="vaccine_stock">
                
            </div>
        </div>

        <!-- Today's Appointments Table -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card border-0 fade-up" style="background: rgba(255, 255, 255, 0.95); box-shadow: 0 4px 15px rgba(0,0,0,0.1); border-radius: 15px;">
                    <div class="card-header" style="background: linear-gradient(45deg, #6a11cb, #2575fc); border-radius: 15px 15px 0 0;">
                        <h3 class="card-title text-white mb-0"><i class="fas fa-list me-2"></i>Today's Appointments</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="data_table">
                                <thead>
                                    <tr style="background: linear-gradient(45deg, rgba(106,17,203,0.1), rgba(37,117,252,0.1));">
                                        <th style="color: #6a11cb;">Time</th>
                                        <th style="color: #2575fc;">Child Name</th>
                                        <th style="color: #6a11cb;">Parent Name</th>
                                        <th style="color: #2575fc;">Vaccine</th>
                                        <th style="color: #6a11cb;">Doctor</th>
                                        <th style="color: #2575fc;">Status</th>
                                        <th style="color: #6a11cb;">Action</th>
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
        <div class="modal-content" id="updateStatusForm" style="border-radius: 15px; overflow: hidden;">
            
        </div>
    </div>
</div>

<!-- Cancel Appointment Modal -->
<div class="modal fade" id="cancelModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content" id="cancelForm" style="border-radius: 15px; overflow: hidden;">
            
        </div>
    </div>
</div>

<!-- View Report Modal -->
<div class="modal fade" id="viewReportModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="viewReportForm" style="border-radius: 15px; overflow: hidden;">
            
        </div>
    </div>
</div>

<!-- cancel Report Modal -->
<div class="modal fade" id="cancelReportModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="cancelReportForm" style="border-radius: 15px; overflow: hidden;">
            
        </div>
    </div>
</div>






<!-- footer  -->
    <?php include 'layout/footer.php'; ?>
<!-- footer END -->
</section>
<script>
    function loaddata(){
            $.ajax({
                url: 'php/hospital/dashboard/tables.php',
                type: 'GET',
                data: {
                    user_id: <?php echo $_SESSION['user_id']; ?>
                },
                success: function(data){
                    $('#table_data').html(data);
                    if ($.fn.DataTable.isDataTable('#data_table')) {
                        $('#data_table').DataTable().destroy();
                    }

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

    $(document).ready(function(){
        $.ajax({
            url: 'php/hospital/dashboard/appointment.php',
            type: 'GET',
            data: {
                user_id: <?php echo $_SESSION['user_id']; ?>
            },
            success: function(data){
                $('#appointments').html(data);
            }
        });
    });

    $(document).ready(function(){
        $.ajax({
            url: 'php/hospital/dashboard/vaccine_stock.php',
            type: 'GET',
            data: {
                user_id: <?php echo $_SESSION['user_id']; ?>
            },
            success: function(data){
                $('#vaccine_stock').html(data);
            }
        });
    });

            // udpate Vaccine Status
            $('#data_table').on('click', '.Update', function() {
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



</script>