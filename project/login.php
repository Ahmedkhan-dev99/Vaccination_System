<?php 
session_start();
if(isset($_SESSION['email'])) {
    header("Location: index.php");
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
                        <a href="login.php?role=<?php echo $_SESSION['role']; ?>" class="btn me-2" style="background: linear-gradient(45deg, #6a11cb, #2575fc); color: white; border-radius: 25px; padding: 8px 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                            <i class="fas fa-sign-in-alt me-2"></i>Login
                        </a>
                        <a href="register.php?role=<?php echo $_SESSION['role']; ?>" class="btn" style="border: 2px solid #6a11cb; color: #6a11cb; border-radius: 25px; padding: 8px 20px;">
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
        <div class="row justify-content-center">
            <div class="col-12 col-md-5">
                <!-- page title  -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="page_title_box d-flex align-items-center justify-content-center fade-up">
                            <div class="page_title_left d-flex align-items-center">
                                <div class="rounded-circle p-3 me-3" style="background: linear-gradient(45deg, #6a11cb, #2575fc);">
                                    <i class="fas fa-sign-in-alt fa-2x" style="color: white;"></i>
                                </div>
                                <div class="text-center">
                                    <h3 class="f_s_25 f_w_700 mb-0" style="background: linear-gradient(45deg, #6a11cb, #2575fc); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;">Welcome Back!</h3>
                                    <p class="text-muted mb-0">Login as <?php echo ucfirst($_SESSION['role']); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                if(isset($_GET['login'])){
                    echo '<div class="alert alert-success alert-dismissible fade show mx-3 mt-3" role="alert" style="background: linear-gradient(45deg, #00f2c3, #0098f0); color: white; border-radius: 10px;">
                    <i class="fas fa-check-circle me-2"></i>
                    <strong>Success:</strong> Account Created Successfully.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                }
                ?>

                <!-- Login Form -->
                <div class="card border-0 slide-left" style="background: rgba(255, 255, 255, 0.95); box-shadow: 0 4px 15px rgba(0,0,0,0.1); border-radius: 15px;">
                    <div class="card-body p-4">
                        <?php if(isset($_GET['error']) && $_GET['error'] == 'Invalid'): ?>
                        <div class="alert alert-danger text-center mb-3 p-3" style="background: linear-gradient(45deg, #ff8d72, #ff6491); color: white; border: none; border-radius: 10px;">
                            <i class="fas fa-exclamation-triangle me-2 fa-lg"></i>
                            <span style="font-weight: 500;">Invalid credentials. Please try again.</span>
                        </div>
                        <?php endif; ?>
                        <form class="row g-3" action="php/local/Login_User.php" method="post">
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" name="role" value="<?php echo $_SESSION['role']; ?>" hidden>
                                    <input type="email" name="email" class="form-control" id="floatingEmail" placeholder="name@example.com" required style="border: 2px solid #6a11cb; border-radius: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                                    <label for="floatingEmail"><i class="fas fa-envelope me-2" style="color: #6a11cb;"></i>Email address</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required style="border: 2px solid #6a11cb; border-radius: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                                    <label for="password"><i class="fas fa-lock me-2" style="color: #6a11cb;"></i>Password</label>
                                    <button type="button" class="btn position-absolute end-0 top-50 translate-middle-y me-2" id="togglePassword" style="background: none; border: none; color: #6a11cb;">
                                        <i class="fas fa-eye" id="toggleIcon"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="col-12 mt-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="remember" style="border: 2px solid #6a11cb;">
                                        <label class="form-check-label" for="remember" style="color: #6a11cb;">
                                            Remember me
                                        </label>
                                    </div>
                                    <a href="#" style="color: #6a11cb; text-decoration: none; font-weight: 500;">Forgot Password?</a>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-12 mt-4">
                                <button type="submit" class="btn w-100 pulse" style="background: linear-gradient(45deg, #6a11cb, #2575fc); color: white; border: none; border-radius: 25px; padding: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                                    <i class="fas fa-sign-in-alt me-2"></i>Login as <?php echo ucfirst($_SESSION['role']); ?>
                                </button>
                            </div>

                            <!-- Register Link -->
                            <div class="col-12 text-center mt-3">
                                <p class="mb-0">Don't have an account? <a href="register.php" style="color: #6a11cb; text-decoration: none; font-weight: 500;">Register here</a></p>
                            </div>
                        </form>

                        <script>
                            const togglePassword = document.querySelector('#togglePassword');
                            const password = document.querySelector('#password');
                            const toggleIcon = document.querySelector('#toggleIcon');

                            togglePassword.addEventListener('click', function () {
                                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                                password.setAttribute('type', type);
                                
                                toggleIcon.classList.toggle('fa-eye');
                                toggleIcon.classList.toggle('fa-eye-slash');
                            });
                        </script>
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
            <div class="header_iner d-flex justify-content-center align-items-center" style="background: rgba(255, 255, 255, 0.9); border-radius: 15px;">
                <div class="footer_iner text-center py-3">
                    <p class="text-center mb-0">2024 © E-Vaccination - Designed with <i class="fas fa-heart" style="color: #ff6491;"></i> by <a href="index.php" style="background: linear-gradient(45deg, #6a11cb, #2575fc); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; text-decoration: none; font-weight: 500;">Mr.Khan</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- footer END -->