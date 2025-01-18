<?php include_once 'cdn.php'; ?>
<nav class="sidebar">
    <div class="logo d-flex justify-content-between">
        <a class="large_logo" href="index.html"><img src="img/logo.png" alt="" style="width: 180px; height: auto;"></a>
    </div>
    
    <style>
        .sidebar li a.active {
            background: linear-gradient(45deg, #6a11cb, #2575fc)!important;
            color: white !important;
        }
        .sidebar li a.active i,
        .sidebar li a.active span {
            color: white !important;
        }
        .sidebar li a.active:hover {
            background: linear-gradient(45deg, #6a11cb, #2575fc)!important;
            color: white !important;
        }
    </style>

    <ul id="sidebar_menu">
        <li>
            <a href="<?php echo $_SESSION['role'] == 'admin' ? 'index.php' : ($_SESSION['role'] == 'parent' ? 'parent.php' : 'hospital.php'); ?>" aria-expanded="false" style="color: #6a11cb;">
                <div class="nav_icon_small">
                    <i class="fas fa-tachometer-alt"></i>
                </div>
                <div class="nav_title">
                    <span>Dashboard</span>
                </div>
            </a>
        </li>

        <?php if($_SESSION['role'] == 'admin'){ ?>

        <h4 class="menu-text"><span style="color: #6a11cb;">ADMIN</span> <i class="fas fa-ellipsis-h" style="color: #6a11cb;"></i> </h4>
        <li class="">
            <a href="#" aria-expanded="false" style="color: #6a11cb;">
                <div class="nav_icon_small">
                    <i class="fas fa-child"></i>
                </div>
                <div class="nav_title">
                    <span>Child Management</span>
                </div>
            </a>
            <ul>
                <li><a href="All_Child_Details.php" style="color: #6a11cb;">All Child Details</a></li>
                <li><a href="Vaccination_Reports.php" style="color: #6a11cb;">Vaccination Reports</a></li>
            </ul>
        </li>

        <li class="">
            <a href="#" aria-expanded="false" style="color: #6a11cb;">
                <div class="nav_icon_small">
                    <i class="fas fa-hospital"></i>
                </div>
                <div class="nav_title">
                    <span>Hospital Management</span>
                </div>
            </a>
            <ul>
                <li><a href="Add_Hospital.php" style="color: #6a11cb;">Add Hospital</a></li>
                <li><a href="Hospital_List.php" style="color: #6a11cb;">Hospital List</a></li>
            </ul>
        </li>

        <li class="">
            <a href="#" aria-expanded="false" style="color: #6a11cb;">
                <div class="nav_icon_small">
                    <i class="fas fa-syringe"></i>
                </div>
                <div class="nav_title">
                    <span>Vaccine Management</span>
                </div>
            </a>
            <ul>
                <li><a href="Vaccine_List.php" style="color: #6a11cb;">Vaccine List</a></li>
                <li><a href="Availability_Status.php" style="color: #6a11cb;">Availability Status</a></li>
            </ul>
        </li>
        <li>
            <a href="booking_details.php" aria-expanded="false" style="color: #6a11cb;">
                <div class="nav_icon_small">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <div class="nav_title">
                    <span>Booking Details</span>
                </div>
            </a>
        </li>
        <?php } ?>
        <?php if($_SESSION['role'] == 'parent' || $_SESSION['role'] == 'admin'){ ?>
            <h4 class="menu-text"><span style="color: #6a11cb;">PARENT</span> <i class="fas fa-ellipsis-h" style="color: #6a11cb;"></i> </h4>
        <li>
            <a href="child_details.php" aria-expanded="false" style="color: #6a11cb;">
                <div class="nav_icon_small">
                    <i class="fas fa-baby"></i>
                </div>
                <div class="nav_title">
                    <span>Child Details</span>
                </div>
            </a>
        </li>

        <li>
            <a href="book_hospital.php" aria-expanded="false" style="color: #6a11cb;">
                <div class="nav_icon_small">
                    <i class="fas fa-calendar-plus"></i>
                </div>
                <div class="nav_title">
                    <span>Book Hospital</span>
                </div>
            </a>
        </li>

        <li>
            <a href="vaccination_history.php" aria-expanded="false" style="color: #6a11cb;">
                <div class="nav_icon_small">
                    <i class="fas fa-history"></i>
                </div>
                <div class="nav_title">
                    <span>Vaccination History</span>
                </div>
            </a>
        </li>
        <?php } ?>
        <?php if($_SESSION['role'] == 'hospital'|| $_SESSION['role'] == 'admin'){ ?>

        <h4 class="menu-text"><span style="color: #6a11cb;">HOSPITAL</span> <i class="fas fa-ellipsis-h" style="color: #6a11cb;"></i> </h4>
        <li>
            <a href="update_vaccine_status.php" aria-expanded="false" style="color: #6a11cb;">
                <div class="nav_icon_small">
                    <i class="fas fa-sync-alt"></i>
                </div>
                <div class="nav_title">
                    <span>Update Vaccine Status</span>
                </div>
            </a>
        </li>
        <?php if($_SESSION['role'] == 'hospital'){ ?>
        <li>
            <a href="Vaccine_List.php" aria-expanded="false" style="color: #6a11cb;">
                <div class="nav_icon_small">
                    <i class="fas fa-list"></i>
                </div>
                <div class="nav_title">
                    <span>Vaccine List</span>
                </div>
            </a>
        </li>
        <?php } ?>
        <?php } ?>
        <li>
            <a href="profile.php" aria-expanded="false" style="color: #6a11cb;">
                <div class="nav_icon_small">
                    <i class="fas fa-user"></i>
                </div>
                <div class="nav_title">
                    <span>My Profile</span>
                </div>
            </a>
        </li>
        
    </ul>
</nav>