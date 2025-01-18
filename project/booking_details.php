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
                            <i class="fas fa-calendar-check fa-2x" style="color: white;"></i>
                        </div>
                        <div>
                            <h3 class="f_s_25 f_w_700 mb-0" style="background: linear-gradient(45deg, #6a11cb, #2575fc); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;">Booking Details</h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 mt-1">
                                    <li class="breadcrumb-item"><a href="#" style="color: #2575fc; text-decoration: none;">Home</a></li>
                                    <li class="breadcrumb-item active" style="color: #6a11cb;">Bookings</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Booking Statistics -->
        <div class="row mb-4 slide-left" id="vaccination_statistics">
            
        </div>

        <!-- Booking Details Table -->
        <div class="row">
            <div class="col-12">
                <div class="card border-0 fade-up" style="background: rgba(255, 255, 255, 0.95); box-shadow: 0 4px 15px rgba(0,0,0,0.1); border-radius: 15px;">
                    <div class="card-header" style="background: linear-gradient(45deg, #6a11cb, #2575fc); border-radius: 15px 15px 0 0;">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="card-title mb-0 text-white"><i class="fas fa-list me-2"></i>Vaccination Bookings</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table table-hover" id="childTable">
                                <thead>
                                    <tr>
                                        <th style="color: #6a11cb; font-weight: 600;">Booking ID</th>
                                        <th style="color: #2575fc; font-weight: 600;">Child Name</th>
                                        <th style="color: #6a11cb; font-weight: 600;">Hospital</th>
                                        <th style="color: #2575fc; font-weight: 600;">Vaccine</th>
                                        <th style="color: #6a11cb; font-weight: 600;">Appointment Date</th>
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

<!-- View Booking Modal -->
<div class="modal fade" id="viewBookingModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content fade-up" style="border-radius: 15px; overflow: hidden;">
            <div class="modal-header" style="background: linear-gradient(45deg, #6a11cb, #2575fc);">
                <h5 class="modal-title text-white"><i class="fas fa-eye me-2"></i>Booking Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4" id="viewBookingForm">
            </div>
        </div>
    </div>
</div>

<!-- cancel Report Modal -->
<div class="modal fade" id="cancelBookingModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content fade-up" style="border-radius: 15px; overflow: hidden;">
            <div class="modal-header" style="background: linear-gradient(45deg, #6a11cb, #2575fc);">
                <h5 class="modal-title text-white"><i class="fas fa-times-circle me-2"></i>Cancel Booking</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4" id="cancelBookingForm">
            </div>
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
                url: 'php/admin/book_details/tables.php',
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
        // Update Vaccination Statistics
        function updateVaccinationStatistics() {
            $.ajax({
                url: 'php/admin/book_details/statistics.php',
                type: 'GET',
                success: function(data) {
                    $('#vaccination_statistics').html(data);
                }
            });
        }
        loaddata();
        updateVaccinationStatistics();
    
        // Cancel Booking
        $(document).on('click', '.Cancel', function() {
            $('#cancelBookingModal').modal('show');
            var bookingId = $(this).attr('id');
            $.ajax({
                url: 'php/admin/book_details/cancel.php',
                type: 'GET',
                data: {bookingId: bookingId},
                success: function(data){
                    $('#cancelBookingForm').html(data);
                }
            });
        });

        // Confirm Cancel
        $(document).on('submit', '#cencelbook', function(e) {
            e.preventDefault();
            $.ajax({
                url: 'php/admin/book_details/delete.php',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response){
                    if(response.includes('success')){
                        $('#cancelBookingModal').modal('hide');
                        loaddata();
                        updateVaccinationStatistics();
                    } else {
                        alert('Booking cancellation failed');
                    }
                }
            });
        });

        // View Booking
        $(document).on('click', '.ViewReport', function() {
            $('#viewBookingModal').modal('show');
            var bookingId = $(this).attr('id');
            $.ajax({
                url: 'php/admin/book_details/view.php',
                type: 'GET',
                data: {bookingId: bookingId},
                success: function(data){
                    $('#viewBookingForm').html(data);
                }
            });
        });
    });
</script>
