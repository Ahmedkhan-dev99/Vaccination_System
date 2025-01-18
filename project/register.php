<?php 
session_start();
if (isset($_SESSION['email'])) {
    header("Location: ../index.php");
    exit();
}
if(isset($_GET['role'])) {
    $_SESSION['role'] = $_GET['role'];
}
include 'layout/cdn.php';
?>

<body class="crm_body_bg d-flex flex-column min-vh-100" style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);">

<section class="large_header_bg flex-grow-1">
    <!-- Navbar  -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 p-0">
                <div class="header_iner d-flex justify-content-between align-items-center" style="background: rgba(255, 255, 255, 0.9); box-shadow: 0 4px 15px rgba(0,0,0,0.1); border-radius: 15px;">
                    <!-- Logo -->
                    <div class="d-flex align-items-center">
                        <img src="img/logo.png" alt="Logo" height="50">
                        <h4 class="mb-0 ms-2" style="background: linear-gradient(45deg, #6a11cb, #2575fc); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;">Vaccination System</h4>
                    </div>

                    <div class="header_right d-flex align-items-center">
                        <!-- Role Badge -->
                        <div class="me-3">
                            <span class="badge" style="background: linear-gradient(45deg, #6a11cb, #2575fc); color: white; font-size: 0.9rem; padding: 8px 15px; border-radius: 20px;">
                                <i class="fas fa-user-tag me-1"></i>
                                <?php echo ucfirst($_SESSION['role']); ?> Portal
                            </span>
                        </div>
                        <!-- Auth Buttons -->
                        <div class="auth_buttons">
                            <a href="login.php?role=<?php echo $_SESSION['role']; ?>" class="btn me-2" style="border: 2px solid #6a11cb; color: #6a11cb; border-radius: 25px; padding: 8px 20px;">
                                <i class="fas fa-sign-in-alt me-2"></i>Login
                            </a>
                            <a href="register.php?role=<?php echo $_SESSION['role']; ?>" class="btn pulse" style="background: linear-gradient(45deg, #6a11cb, #2575fc); color: white; border-radius: 25px; padding: 8px 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                                <i class="fas fa-user-plus me-2"></i>Register
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Navbar  -->

    <!-- Back Button -->
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <a href="intro.php" class="btn slide-left" style="border: 2px solid #6a11cb; color: #6a11cb; border-radius: 25px; padding: 8px 20px;">
                    <i class="fas fa-arrow-left me-2"></i>Back
                </a>
            </div>
        </div>
    </div>

    <div class="main_content_iner overly_inner pt-5">
        <div class="container">
            <?php
            if(isset($_GET['error'])){
                if($_GET['error'] == 'password_mismatch') {
                    echo '<div class="alert fade show mx-3 mt-3" role="alert" style="background: linear-gradient(45deg, #ff8d72, #ff6491); color: white; border: none; border-radius: 10px; box-shadow: 0 4px 15px rgba(255,100,145,0.2);">
                        <i class="fas fa-exclamation-circle me-2" style="font-size: 1.1em;"></i>
                        <strong>Oops!</strong> Password and Confirm Password do not match.
                    </div>';
                } else if($_GET['error'] == 'email_exists') {
                    echo '<div class="alert fade show mx-3 mt-3" role="alert" style="background: linear-gradient(45deg, #ff8d72, #ff6491); color: white; border: none; border-radius: 10px; box-shadow: 0 4px 15px rgba(255,100,145,0.2);">
                        <i class="fas fa-exclamation-circle me-2" style="font-size: 1.1em;"></i>
                        <strong>Oops!</strong> This email address is already registered. Please use a different email.
                    </div>';
                }
            }
            ?>
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <!-- page title  -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="page_title_box d-flex align-items-center justify-content-center fade-up">
                                <div class="page_title_left d-flex align-items-center">
                                    <div class="rounded-circle p-3 me-3" style="background: linear-gradient(45deg, #6a11cb, #2575fc);">
                                        <i class="fas fa-user-plus fa-2x" style="color: white;"></i>
                                    </div>
                                    <div class="text-center">
                                        <h3 class="f_s_25 f_w_700 mb-0" style="background: linear-gradient(45deg, #6a11cb, #2575fc); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;">Create Your Account</h3>
                                        <p class="text-muted mb-0">Join our vaccination management system</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Registration Form -->
                    <div class="card border-0 slide-left" style="background: rgba(255, 255, 255, 0.95); box-shadow: 0 4px 15px rgba(0,0,0,0.1); border-radius: 15px;">
                        <div class="card-body p-4">
                            <form class="row g-3" enctype="multipart/form-data" action="php/Local/user_add.php" method="post">
                                <!-- Profile Image -->
                                <div class="col-12 text-center mb-4">
                                    <div class="position-relative d-inline-block">
                                        <img id="profilePreview" src="img/default.png" class="rounded-circle img-thumbnail mb-3" style="width: 150px; height: 150px; object-fit: cover; border: 3px solid #6a11cb;">
                                        <label for="profileImage" class="btn btn-sm position-absolute bottom-0 end-0" style="background: linear-gradient(45deg, #6a11cb, #2575fc); color: white; border-radius: 50%; width: 35px; height: 35px; display: flex; align-items: center; justify-content: center;">
                                            <i class="fas fa-camera"></i>
                                        </label>
                                        <input type="file" id="profileImage" name="profile_image" class="d-none" accept="image/*">
                                    </div>
                                </div>

                                <!-- Personal Information -->
                                <div class="col-12 mb-3">
                                    <h5 class="border-bottom pb-2" style="background: linear-gradient(45deg, #6a11cb, #2575fc); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;">
                                        <i class="fas fa-user me-2"></i>Personal Information
                                    </h5>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" style="color: #444;">Full Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter your full name" required style="border: 2px solid #6a11cb; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                                    <input type="text" name="role" value="<?php echo $_SESSION['role']; ?>" hidden>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" style="color: #444;">Email Address</label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter email address" required style="border: 2px solid #2575fc; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" style="color: #444;">Phone Number</label>
                                    <input type="tel" name="phone" class="form-control" placeholder="Enter phone number" required style="border: 2px solid #6a11cb; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" style="color: #444;">Role</label>
                                    <select class="form-select" name="gender" required style="border: 2px solid #2575fc; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                            <option value="" disabled selected hidden>Select Role</option>
                            <option value="parent">parent</option>
                            <option value="hospital">hospital</option>
                        </select>
                                </div>

                                <!-- Address Information -->
                                <div class="col-12 mb-3 mt-4">
                                    <h5 class="border-bottom pb-2" style="background: linear-gradient(45deg, #6a11cb, #2575fc); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;">
                                        <i class="fas fa-map-marker-alt me-2"></i>Address Information
                                    </h5>
                                </div>

                                <div class="col-12">
                                    <label class="form-label" style="color: #444;">Complete Address</label>
                                    <input type="text" name="address" class="form-control" placeholder="Enter your address" required style="border: 2px solid #2575fc; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label" style="color: #444;">City</label>
                                    <input type="text" name="city" class="form-control" placeholder="Enter city" required style="border: 2px solid #6a11cb; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                                </div>

                                <!-- Account Security -->
                                <div class="col-12 mb-3 mt-4">
                                    <h5 class="border-bottom pb-2" style="background: linear-gradient(45deg, #6a11cb, #2575fc); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;">
                                        <i class="fas fa-lock me-2"></i>Account Security
                                    </h5>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" style="color: #444;">Create Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Enter password" required style="border: 2px solid #2575fc; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" style="color: #444;">Confirm Password</label>
                                    <input type="password" name="confirm_password" class="form-control" placeholder="Confirm password" required style="border: 2px solid #6a11cb; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                                </div>

                                <!-- Terms and Conditions -->
                                <div class="col-12 mt-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="terms" required style="border: 2px solid #6a11cb;">
                                        <label class="form-check-label" for="terms" style="color: #444;">
                                            I agree to the <a href="#" style="color: #6a11cb; text-decoration: none;">Terms and Conditions</a>
                                        </label>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn w-100 pulse" style="background: linear-gradient(45deg, #6a11cb, #2575fc); color: white; border-radius: 25px; padding: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                                        <i class="fas fa-user-plus me-2"></i>Create Account
                                    </button>
                                </div>

                                <!-- Login Link -->
                                <div class="col-12 text-center mt-3">
                                    <p class="mb-0" style="color: #444;">Already have an account? 
                                        <a href="login.php" style="background: linear-gradient(45deg, #6a11cb, #2575fc); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; text-decoration: none; font-weight: 600;">
                                            Login here
                                        </a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<!-- footer  -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 p-0">
            <div class="header_iner d-flex justify-content-center align-items-center">
                <div class="footer_iner text-center">
                    <p class="text-center" style="color: #444;">2024 © E-Vaccination - Designed with 
                        <i class="fas fa-heart" style="color: #ff4d4d;"></i> by 
                        <a href="index.php" style="background: linear-gradient(45deg, #6a11cb, #2575fc); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; text-decoration: none;">Mr.Khan</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- footer END -->

<script>
    // Profile image preview
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('profilePreview').src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('profileImage').addEventListener('change', function() {
            previewImage(this);
        });
    });
</script>
