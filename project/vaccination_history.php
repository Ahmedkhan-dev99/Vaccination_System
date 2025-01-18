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
                            <i class="fas fa-history fa-2x" style="color: white;"></i>
                        </div>
                        <div>
                            <h3 class="f_s_25 f_w_700 mb-0" style="background: linear-gradient(45deg, #6a11cb, #2575fc); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;">Vaccination History</h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 mt-1">
                                    <li class="breadcrumb-item"><a href="#" style="color: #2575fc; text-decoration: none;">Home</a></li>
                                    <li class="breadcrumb-item active" style="color: #6a11cb;">Vaccination History</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Report Statistics -->
        <div class="row mb-4 slide-left" id="vaccination_statistics">
        </div>

        <!-- Hospital List -->
        <div class="row">
            <div class="col-12">
                <div class="card border-0 fade-up" style="background: rgba(255, 255, 255, 0.95); box-shadow: 0 4px 15px rgba(0,0,0,0.1); border-radius: 15px;">
                    <div class="card-header" style="background: linear-gradient(45deg, #6a11cb, #2575fc); border-radius: 15px 15px 0 0;">
                        <h5 class="card-title mb-0 text-white"><i class="fas fa-calendar-check me-2"></i>Today's Appointments</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="data_table">
                                <thead>
                                    <tr>
                                        <th style="color: #6a11cb;">Vaccine ID</th>
                                        <th style="color: #6a11cb;">Child Name</th>
                                        <th style="color: #6a11cb;">Vaccine Name</th>
                                        <th style="color: #6a11cb;">Hospital Name</th>
                                        <th style="color: #6a11cb;">Appointment Date</th>
                                        <th style="color: #6a11cb;">Appointment Time</th>
                                        <th style="color: #6a11cb;">Status</th>
                                        <th style="color: #6a11cb;">Report</th>
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

<!-- View Report Modal -->
<div class="modal fade" id="viewReportModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content fade-up" id="view_Report_Modal" style="border-radius: 15px;">
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
                url: 'php/parent/vaccine_history/tables.php',
                type: 'GET',
                success: function(data){
                    $('#table_data').html(data);
                    
                    if ($.fn.DataTable.isDataTable('#data_table')) {
                        $('#data_table').DataTable().destroy();
                    }

                    table = $('#data_table').DataTable({
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
        loaddata();

        $(document).on('click', '.report', function() {
            $('#viewReportModal').modal('show');
            var id = $(this).attr('id');
            $.ajax({
                url: 'php/parent/vaccine_history/view.php',
                type: 'GET',
                data: {id: id},
                success: function(data) {
                    $('#view_Report_Modal').html(data);
                }
            });
        });

        // Update Vaccination Statistics
        function updateVaccinationStatistics() {
            $.ajax({
                url: 'php/parent/vaccine_history/statistics.php',
                type: 'GET',
                success: function(data) {
                    $('#vaccination_statistics').html(data);
                }
            });
        }
        updateVaccinationStatistics();    
  
    });
</script>
