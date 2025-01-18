<?php session_start(); 
if(!isset($_SESSION['email'])){
    header("Location: login.php");
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
                            <i class="fas fa-hospital fa-2x" style="color: white;"></i>
                        </div>
                        <div>
                            <h3 class="f_s_25 f_w_700 mb-0" style="background: linear-gradient(45deg, #6a11cb, #2575fc); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;">Book Hospital</h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 mt-1">
                                    <li class="breadcrumb-item"><a href="#" style="color: #2575fc; text-decoration: none;">Home</a></li>
                                    <li class="breadcrumb-item active" style="color: #6a11cb;">Book Hospital</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="white_card_header">
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="msg" style="display: none; background: linear-gradient(45deg, #11cb54, #25fc94); color: white; border: none; border-radius: 10px;">
                <i class="fas fa-check-circle me-2"></i>Hospital booked successfully!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>

        <!-- Hospital List -->
        <div class="row">
            <div class="col-12">
                <div class="card border-0 slide-left" style="background: rgba(255, 255, 255, 0.95); box-shadow: 0 4px 15px rgba(0,0,0,0.1); border-radius: 15px;">
                    <div class="card-header" style="background: linear-gradient(45deg, #6a11cb, #2575fc); border-radius: 15px 15px 0 0;">
                        <h5 class="card-title mb-0 text-white"><i class="fas fa-hospital-alt me-2"></i>Available Hospitals</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table table-hover" id="data_table">
                                <thead>
                                    <tr>
                                        <th style="color: #6a11cb;">Hospital ID</th>
                                        <th style="color: #6a11cb;">Hospital Name</th>
                                        <th style="color: #6a11cb;">Location</th>
                                        <th style="color: #6a11cb;">Rating</th>
                                        <th style="color: #6a11cb;">Actions</th>
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

<!-- View Hospital Modal -->
<div class="modal fade" id="viewHospitalModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content fade-up" id="view_hospital" style="border-radius: 15px;">
        </div>
    </div>
</div>

<!-- Book Appointment Modal -->
<div class="modal fade" id="bookAppointmentModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content fade-up" id="book_hospital" style="border-radius: 15px;">
        </div>
    </div>
</div>

<!-- footer  -->
<?php include 'layout/footer.php'; ?>
<!-- footer END -->
</section>

<script>
    $(document).ready(function(){
        var table;

        function loaddata(){
            $.ajax({
                url: 'php/parent/booking/list.php',
                type: 'GET',
                success: function(data){
                    $('#table_data').html(data);
                    
                    if ($.fn.DataTable.isDataTable('#data_table')) {
                        $('#data_table').DataTable().destroy();
                    }

                    table = $('#data_table').DataTable({
                        responsive: true,
                        lengthMenu: [[8, 10, 25, 50, -1], [8, 10, 25, 50, "All"]],
                        pageLength: 8,
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

        $(document).on('click', '.View', function() {
            $('#viewHospitalModal').modal('show');
            var hospitalId = $(this).attr('id');
            $.ajax({
                url: 'php/parent/booking/view.php',
                type: 'GET',
                data: { hospitalId: hospitalId },
                success: function(data) {
                    $('#view_hospital').html(data);
                }
            });
        });

        $(document).on('click', '.Book', function() {
            $('#bookAppointmentModal').modal('show');
            var hospitalId = $(this).attr('id');
            $.ajax({
                url: 'php/parent/booking/book.php',
                type: 'GET',
                data: { hospitalId: hospitalId, user_id: <?php echo $_SESSION['user_id']; ?> },
                success: function(data) {
                    $('#book_hospital').html(data);
                }
            });
        });

        $(document).on('click', '#confirmBooking', function() {
            $.ajax({
                url: 'php/parent/booking/booking_submit.php',
                type: 'GET',
                data: $('#bookingForm').serialize(),
                success: function(data) {
                    if(data == "success"){
                        $('#bookAppointmentModal').modal('hide');
                        loaddata();
                        $('#msg').fadeIn();
                        setTimeout(function() {
                            $('#msg').fadeOut();
                        }, 3000);
                    }else{
                        alert("Appointment booking failed");
                    }
                }
            });
        });
    });
</script>