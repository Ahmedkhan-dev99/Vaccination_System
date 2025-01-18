<?php session_start(); 
if(!isset($_SESSION['email'])){
    header("Location: intro.php");
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
                            <i class="fas fa-home fa-2x" style="color: white;"></i>
                        </div>
                        <div>
                            <h3 class="f_s_25 f_w_700 mb-0" style="background: linear-gradient(45deg, #6a11cb, #2575fc); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;">E-Vaccination Dashboard</h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 mt-1">
                                    <li class="breadcrumb-item"><a href="#" style="color: #2575fc; text-decoration: none;">Home</a></li>
                                    <li class="breadcrumb-item active" style="color: #6a11cb;">Dashboard</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Row -->
        <div class="row mb-4">
            <div class="col-xl-6">
                <div class="card border-0 shadow-sm mb_30 slide-left">
                    <div class="card-header bg-transparent border-0">
                        <h3 class="card-title text-primary mb-0"><i class="fas fa-chart-pie me-2"></i>Vaccination Distribution</h3>
                    </div>
                    <div class="card-body">
                        <canvas id="vaccinationPieChart" height="300"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card border-0 shadow-sm mb_30 slide-right">
                    <div class="card-header bg-transparent border-0">
                        <h3 class="card-title text-primary mb-0"><i class="fas fa-chart-line me-2"></i>Monthly Vaccinations</h3>
                    </div>
                    <div class="card-body">
                        <canvas id="monthlyLineChart" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <!-- Vaccination Status -->
            <div class="col-xl-4 fade-up" id="vaccinationStatus">
                
            </div>
            <!-- Hospital Status -->
            <div class="col-xl-4 fade-up" id="hospitalStatus">
                
            </div>
            <!-- Vaccine Availability -->
            <div class="col-xl-4 fade-up" id="vaccineAvailability">
                
            </div>
        </div>

        <!-- Recent Vaccination Requests -->
        <div class="row">
            <div class="col-12">
                <div class="card border-0 slide-left" style="background: rgba(255, 255, 255, 0.95); box-shadow: 0 4px 15px rgba(0,0,0,0.1); border-radius: 15px;">
                    <div class="card-header" style="background: linear-gradient(45deg, #6a11cb, #2575fc); border-radius: 15px 15px 0 0;">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="card-title mb-0 text-white"><i class="fas fa-list me-2"></i>Recent Vaccination Requests</h5>
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

<!-- footer  -->
<?php include 'layout/footer.php'; ?>
<!-- footer END -->
</section>

<script>
     // Pie Chart
     $.ajax({
        url: 'php/admin/dashboard/Pie.php',
        type: 'GET',
        success: function(response){
            // Parse the comma-separated response into array
            const chartData = response.split(',').map(Number);
            
            const vaccinationPieChart = new Chart(document.getElementById('vaccinationPieChart'), {
                type: 'pie',
                data: {
                    labels: ['Vaccinated', 'Pending', 'Cancelled'],
                    datasets: [{
                        data: chartData,
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.8)',  // Teal
                            'rgba(255, 159, 64, 0.8)',  // Orange
                            'rgba(255, 99, 132, 0.8)'   // Pink
                        ],
                        borderWidth: 2,
                        borderColor: '#fff',
                        hoverOffset: 15,
                        hoverBackgroundColor: [
                            'rgba(75, 192, 192, 1)',    // Solid teal
                            'rgba(255, 159, 64, 1)',    // Solid orange  
                            'rgba(255, 99, 132, 1)'     // Solid pink
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'right',
                            labels: {
                                padding: 20,
                                usePointStyle: true,
                                pointStyle: 'rectRounded',
                                font: {
                                    size: 14,
                                    family: "'Poppins', sans-serif",
                                    weight: '600'
                                },
                                generateLabels: function(chart) {
                                    const data = chart.data;
                                    if (data.labels.length && data.datasets.length) {
                                        return data.labels.map((label, i) => ({
                                            text: label,
                                            fillStyle: data.datasets[0].backgroundColor[i],
                                            strokeStyle: '#fff',
                                            lineWidth: 2,
                                            hidden: false,
                                            index: i
                                        }));
                                    }
                                    return [];
                                }
                            }
                        },
                        title: {
                            display: true,
                            text: 'Vaccination Distribution Overview',
                            font: {
                                size: 18,
                                family: "'Poppins', sans-serif",
                                weight: 'bold'
                            },
                            padding: {
                                top: 15,
                                bottom: 25
                            },
                            color: '#20B2AA'  // Light sea green
                        }
                    },
                    animation: {
                        animateScale: true,
                        animateRotate: true,
                        duration: 2000,
                        easing: 'easeInOutQuart'
                    },
                    layout: {
                        padding: 20
                    }
                }
            });
        }
    });

    // Line Chart
    const monthlyLineChart = new Chart(document.getElementById('monthlyLineChart'), {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Vaccinations',
                data: [250, 320, 280, 400, 350, 200],
                borderColor: '#6a11cb',
                backgroundColor: 'rgba(106, 17, 203, 0.2)',
                borderWidth: 3,
                tension: 0.3,
                fill: true,
                pointBackgroundColor: '#fff',
                pointBorderColor: '#2575fc',
                pointBorderWidth: 3,
                pointRadius: 6,
                pointHoverRadius: 8,
                pointHoverBackgroundColor: '#2575fc',
                pointHoverBorderColor: '#fff',
                pointHoverBorderWidth: 2
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: 'Monthly Vaccination Progress',
                    font: {
                        size: 16,
                        family: "'Poppins', sans-serif",
                        weight: 'bold'
                    },
                    padding: {
                        top: 10,
                        bottom: 20
                    },
                    color: '#6a11cb'
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(106, 17, 203, 0.05)',
                        drawBorder: false
                    },
                    ticks: {
                        font: {
                            family: "'Poppins', sans-serif"
                        },
                        color: '#6a11cb'
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        font: {
                            family: "'Poppins', sans-serif"
                        },
                        color: '#2575fc'
                    }
                }
            },
            interaction: {
                intersect: false,
                mode: 'index'
            },
            animation: {
                duration: 2000,
                easing: 'easeInOutQuart'
            }
        }
    });


    let table;
    
    function loaddata() {
        $.ajax({
            url: 'php/admin/dashboard/tables.php',
            type: 'POST',
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
                    }
                });
            }
        });
    }
    
    loaddata();

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

     // Vaccination Status
     function vaccinationStatus() {
            $.ajax({
                url: 'php/admin/dashboard/vaccine_status.php',
                type: 'GET',
                success: function(data){
                    $('#vaccinationStatus').html(data);
                }
            });
        }

        vaccinationStatus();

        // Hospital Status
        function hospitalStatus() {
            $.ajax({
                url: 'php/admin/dashboard/hospital_status.php',
                type: 'GET',
                success: function(data){
                    $('#hospitalStatus').html(data);
                }
            });
        }

        hospitalStatus();

        // Vaccine Availability
        function vaccineAvailability() {
            $.ajax({
                url: 'php/admin/dashboard/vaccine_type.php',
                type: 'GET',
                success: function(data){
                    $('#vaccineAvailability').html(data);
                }
            });
        }

        vaccineAvailability();
</script>