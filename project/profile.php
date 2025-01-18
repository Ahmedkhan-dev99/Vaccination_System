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
                            <i class="fas fa-user-circle fa-2x" style="color: white;"></i>
                        </div>
                        <div>
                            <h3 class="f_s_25 f_w_700 mb-0" style="background: linear-gradient(45deg, #6a11cb, #2575fc); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;">My Profile</h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 mt-1">
                                    <li class="breadcrumb-item"><a href="#" style="color: #2575fc; text-decoration: none;">Home</a></li>
                                    <li class="breadcrumb-item active" style="color: #6a11cb;">Profile</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card border-0 slide-left" style="background: rgba(255, 255, 255, 0.95); box-shadow: 0 4px 15px rgba(0,0,0,0.1); border-radius: 15px;">
                    <div class="card-header" style="background: linear-gradient(45deg, #6a11cb, #2575fc); border-radius: 15px 15px 0 0;">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="card-title mb-0 text-white"><i class="fas fa-user me-2"></i>Profile Details</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4" id="profile_data">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Change Password Modal -->
<div class="modal fade" id="changePasswordModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content fade-up" style="border-radius: 15px; overflow: hidden;">
            <div class="modal-header" style="background: linear-gradient(45deg, #6a11cb, #2575fc);">
                <h5 class="modal-title text-white"><i class="fas fa-key me-2"></i>Change Password</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <form id="changePasswordForm" method="POST" action="php/change_password.php">
                    <div class="mb-3">
                        <label class="form-label fw-bold" style="color: #6a11cb;">Current Password</label>
                        <input type="password" name="current_password" class="form-control" required style="border: 2px solid #6a11cb; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold" style="color: #2575fc;">New Password</label>
                        <input type="password" name="new_password" class="form-control" required style="border: 2px solid #2575fc; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold" style="color: #6a11cb;">Confirm New Password</label>
                        <input type="password" name="confirm_password" class="form-control" required style="border: 2px solid #6a11cb; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="changePasswordForm" class="btn pulse" style="background: linear-gradient(45deg, #6a11cb, #2575fc); color: white; border-radius: 25px; padding: 8px 25px;">
                    <i class="fas fa-save me-2"></i>Update Password
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Update Profile Picture Modal -->
<div class="modal fade" id="updateProfilePicModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content fade-up" style="border-radius: 15px; overflow: hidden;">
            <div class="modal-header" style="background: linear-gradient(45deg, #6a11cb, #2575fc);">
                <h5 class="modal-title text-white"><i class="fas fa-camera me-2"></i>Update Profile Picture</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <form id="updatePictureForm" method="POST"  enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label fw-bold" style="color: #6a11cb;">Select New Picture</label>
                        <input type="file" name="profile_picture" class="form-control" accept="image/*" required style="border: 2px solid #6a11cb; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                        <small class="text-muted">Recommended size: 200x200 pixels</small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="updatePictureForm" class="btn pulse" style="background: linear-gradient(45deg, #6a11cb, #2575fc); color: white; border-radius: 25px; padding: 8px 25px;">
                    <i class="fas fa-upload me-2"></i>Upload Picture
                </button>
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
        $.ajax({
            url: 'php/profile/data.php',
            method: 'POST',
            success: function(response){
                $('#profile_data').html(response);
            }
        });
    });
</script>