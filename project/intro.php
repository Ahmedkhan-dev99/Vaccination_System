<?php include 'layout/cdn.php'; ?>
<body class="crm_body_bg d-flex flex-column min-vh-100" style="background: linear-gradient(135deg, #2D1950 0%, #1A0F2E 100%);">

<div class="container min-vh-100 d-flex align-items-center justify-content-center">
    <div class="row justify-content-center w-100">
        <div class="col-12 text-center mb-5">
            <img src="img/logo.png" alt="Logo" height="120" class="mb-4 animate__animated animate__bounceIn">
            <h2 class="text-white mb-4 animate__animated animate__fadeInDown" style="font-weight: 600; letter-spacing: 1px;">Welcome to E-Vaccination System</h2>
        </div>
        
        <div class="col-md-8 col-lg-6">
            <div class="d-grid gap-4">
                <a href="login.php?role=admin" class="btn btn-lg position-relative overflow-hidden animate__animated animate__fadeInLeft" style="background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); color: white; border: 1px solid rgba(255,255,255,0.2); padding: 20px; font-size: 18px; transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-3px)'; this.style.background='rgba(255,255,255,0.2)';" onmouseout="this.style.transform='translateY(0)'; this.style.background='rgba(255,255,255,0.1)';">
                    <i class="fas fa-user-shield me-2 animate__animated animate__swing animate__delay-1s"></i>Login as Admin
                </a>
                
                <a href="login.php?role=parent" class="btn btn-lg position-relative overflow-hidden animate__animated animate__fadeInLeft animate__delay-1s" style="background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); color: white; border: 1px solid rgba(255,255,255,0.2); padding: 20px; font-size: 18px; transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-3px)'; this.style.background='rgba(255,255,255,0.2)';" onmouseout="this.style.transform='translateY(0)'; this.style.background='rgba(255,255,255,0.1)';">
                    <i class="fas fa-users me-2 animate__animated animate__swing animate__delay-2s"></i>Login as Parent
                </a>
                
                <a href="login.php?role=hospital" class="btn btn-lg position-relative overflow-hidden animate__animated animate__fadeInLeft animate__delay-2s" style="background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); color: white; border: 1px solid rgba(255,255,255,0.2); padding: 20px; font-size: 18px; transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-3px)'; this.style.background='rgba(255,255,255,0.2)';" onmouseout="this.style.transform='translateY(0)'; this.style.background='rgba(255,255,255,0.1)';">
                    <i class="fas fa-hospital me-2 animate__animated animate__swing animate__delay-3s"></i>Login as Hospital
                </a>
            </div>
        </div>
    </div>
</div>

<!-- footer  -->
<div class="container fixed-bottom mb-4">
    <div class="row justify-content-center">
        <div class="col-lg-12 p-0">
            <div class="d-flex justify-content-center align-items-center">
                <div class="text-center animate__animated animate__fadeInUp animate__delay-3s">
                    <p class="text-white-50 mb-0">2024 © E-Vaccination - Crafted with <i class="fas fa-heart text-danger animate__animated animate__heartBeat animate__infinite"></i> by <a href="index.php" class="text-white text-decoration-none">Mr.Khan</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- footer END -->