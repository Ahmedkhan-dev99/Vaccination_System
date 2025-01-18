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
                            <h3 class="f_s_25 f_w_700 mb-0" style="background: linear-gradient(45deg, #6a11cb, #2575fc); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;">Add Hospital</h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 mt-1">
                                    <li class="breadcrumb-item"><a href="#" style="color: #2575fc; text-decoration: none;">Home</a></li>
                                    <li class="breadcrumb-item active" style="color: #6a11cb;">Hospitals</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="white_card_header" <?php if(isset($_GET['msg']) && $_GET['msg'] == 'success'){ echo 'style="display: block;"'; }else{ echo 'style="display: none;"'; } ?>>
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="msg" style="background: linear-gradient(45deg, #2ecc71, #27ae60); color: white; border: none;">
                <i class="fas fa-check-circle me-2"></i>Hospital account created successfully!
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        
        <!-- Add Hospital Form -->
        <div class="row">
            <div class="col-12">
                <div class="card border-0 slide-left" style="background: rgba(255, 255, 255, 0.95); box-shadow: 0 4px 15px rgba(0,0,0,0.1); border-radius: 15px;">
                    <div class="card-header" style="background: linear-gradient(45deg, #6a11cb, #2575fc); border-radius: 15px 15px 0 0;">
                        <h5 class="card-title mb-0 text-white"><i class="fas fa-plus-circle me-2"></i>Hospital Registration Form</h5>
                    </div>
                    <div class="card-body p-4">
                        <form class="row g-4 fade-up" action="php/admin/add_hospital/add.php" method="post">
                            <div class="col-md-6">
                                <label class="form-label fw-bold"><i class="fas fa-hospital me-2" style="color: #6a11cb;"></i>Hospital Name</label>
                                <input type="text" class="form-control" placeholder="Enter hospital name" name="name" required style="border: 2px solid #6a11cb; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold"><i class="fas fa-id-card me-2" style="color: #2575fc;"></i>Registration Number</label>
                                <input type="text" class="form-control" placeholder="Enter registration number" name="registration" required style="border: 2px solid #2575fc; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold"><i class="fas fa-envelope me-2" style="color: #6a11cb;"></i>Email</label>
                                <input type="email" class="form-control" placeholder="Enter email address" name="email" required style="border: 2px solid #6a11cb; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold"><i class="fas fa-phone me-2" style="color: #2575fc;"></i>Phone Number</label>
                                <input type="tel" class="form-control" placeholder="Enter phone number" name="phone" required style="border: 2px solid #2575fc; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold"><i class="fas fa-map-marker-alt me-2" style="color: #6a11cb;"></i>Address</label>
                                <textarea class="form-control" rows="3" placeholder="Enter complete address" name="address" required style="border: 2px solid #6a11cb; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold"><i class="fas fa-city me-2" style="color: #2575fc;"></i>City</label>
                                <input type="text" class="form-control" placeholder="Enter city" name="city" required style="border: 2px solid #2575fc; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold"><i class="fas fa-toggle-on me-2" style="color: #6a11cb;"></i>Status</label>
                                <select class="form-select" name="status" required style="border: 2px solid #6a11cb; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                            
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-lg px-5 pulse" style="background: linear-gradient(45deg, #6a11cb, #2575fc); color: white; border-radius: 25px; box-shadow: 0 4px 15px rgba(0,0,0,0.2);">
                                    <i class="fas fa-plus-circle me-2"></i>Add Hospital
                                </button>
                            </div>
                        </form>
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

<script>
    $(document).ready(function(){
        // Message fade animation
        $('#msg').fadeIn();
        setTimeout(function() {
            $('#msg').fadeOut();
        }, 3000);

        // Child info animation
        $.ajax({
            url: 'php/admin/add_hospital/child_info.php',
            type: 'GET',
            data: {
                user_id: <?php echo $_SESSION['user_id']; ?>
            },
            success: function(data){
                $('#child_info').html(data);
            }
        });

        // Upcoming appointments animation
        $.ajax({
            url: 'php/admin/add_hospital/upcoming.php', 
            type: 'GET',
            data: {
                user_id: <?php echo $_SESSION['user_id']; ?>
            },
            success: function(data){
                $('#upcoming_appointments').html(data);
            }
        });

        // DataTable initialization and styling
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
    });
</script>
