<?php 
include_once 'cdn.php'; 
?>

<div class="container-fluid g-0">
    <div class="row">
        <div class="col-lg-12 p-0">
            <div class="header_iner d-flex justify-content-between align-items-center" style="background: rgba(255, 255, 255, 0.9); box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                <div class="sidebar_icon d-lg-none">
                    <i class="ti-menu"></i>
                </div>
                <label class="form-label switch_toggle d-none d-lg-block" for="checkbox">
                    <input type="checkbox" id="checkbox">
                    <div class="slider round open_miniSide"></div>
                </label>
                <div class="user_name me-3">
                    <h5 class="mb-0 fw-bold" style="font-size: 1.2rem; letter-spacing: 0.5px; color: #6a11cb;">
                        Welcome, <span style="color: #2575fc;"><?php echo isset($_SESSION['name']) ? $_SESSION['name'] : 'Guest'; ?></span>
                    </h5>
                </div>

                <div class="header_right d-flex justify-content-between align-items-center">
                    <div class="header_notification_warp d-flex align-items-center">
                        <li>
                            <div class="serach_button" style="background: linear-gradient(45deg, #6a11cb, #2575fc); border-radius: 10px;">
                                <i class="fas fa-search" style="color: white; "></i>
                                <div class="serach_field-area d-flex align-items-center">
                                    <div class="search_inner">
                                        <form action="#">
                                            <div class="search_field">
                                                <input type="text" placeholder="Search here..." class="form-control" style="border: 1px solid #6a11cb; background: rgba(255, 255, 255, 0.95);">
                                            </div>
                                            <button type="submit" class="btn close_search" style="background: linear-gradient(45deg, #6a11cb, #2575fc); color: white;">
                                                <i class="fas fa-search" style="color: white;"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </div>
                    <div class="profile_info">
                        <?php
                        if(isset($_SESSION['profile'])){
                            echo '<img src="img/profile/'.$_SESSION['profile'].'" alt="#">';
                        }else{
                            echo '<img src="img/default.png" alt="#">';
                        }
                        ?>
                        <div class="profile_info_iner" style="background: rgba(255, 255, 255, 0.95); box-shadow: 0 4px 15px rgba(0,0,0,0.1); border-radius: 10px;">
                            <div class="profile_author_name border-bottom pb-2" style="background: linear-gradient(45deg, #6a11cb, #2575fc); border-radius: 10px;">
                                <p class="text-muted mb-1"><?php echo isset($_SESSION['role']) ? ucfirst($_SESSION['role']) : ''; ?> </p>
                                <h5 class="fw-bold mb-0" style="color: white;"><?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?></h5>
                            </div>
                            <div class="profile_info_details pt-2">
                                <a href="profile.php" class="d-block py-2 text-decoration-none" style="color: #6a11cb; transition: all 0.3s ease;" onmouseover="this.style.color='#2575fc'" onmouseout="this.style.color='#6a11cb'">
                                    <i class="fas fa-user me-2"></i>My Profile
                                </a>
                                <a href="php/local/session_delete.php" class="d-block py-2 text-decoration-none" style="color: #ff6491; transition: all 0.3s ease;" onmouseover="this.style.color='#ff8d72'" onmouseout="this.style.color='#ff6491'">
                                    <i class="fas fa-sign-out-alt me-2"></i>Log Out
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>