<?php
defined('BASEPATH') or exit('No direct script access allowed');
$value['dashboard'] = 'active';
$value['heading']   = 'Dashboard';
?>
<!DOCTYPE html>
<html lang="en" class="no-js">

<!-- Head -->

<head>
    <?php $this->load->view('/panel/parts/headermeta',$value); ?>
</head>
<!-- End Head -->

<body>

    <!-- Header (Topbar) -->
    <?php $this->load->view('/panel/parts/header'); ?>
    <!-- End Header (Topbar) -->
    <main class="u-main" role="main">
        <!-- Sidebar -->
        <?php $this->load->view('/panel/userpanel/sidebar',$value); ?>
        <!-- End Sidebar -->

        <div class="u-content">
            <div class="u-body">
                <!-- Dashboard -->
                <div class="container-fluid bg-white h-100 pt-3 pb-3">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-body media align-items-center px-xl-3">
                                                    <div class="media-body">
                                                        <h5 class="h6 text-muted text-uppercase mb-2">
                                                            Number Of Themes
                                                        </h5>
                                                        <?php $pt = $this->db->query('SELECT * FROM pu_theme'); ?>
                                                        <span class="h2 mb-0"><?php echo $pt->num_rows(); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-body media align-items-center px-xl-3">
                                                    <div class="media-body">
                                                        <h5 class="h6 text-muted text-uppercase mb-2">
                                                            Visitors
                                                        </h5>
                                                        <span class="h2 mb-0">400</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">

                                    <a role="button" href="/user/search_by/services/"
                                        class="btn btn-soft-primary btn-block text-center"
                                        style="margin:0px 0px 20px 0px;">
                                        Search Service
                                    </a>
                                    <a role="button" href="/user/search_by/merchants/"
                                        class="btn btn-soft-primary btn-block text-center"
                                        style="margin:0px 0px 20px 0px;">
                                        Search Merchant
                                    </a>
                                    <a role="button" href="/user/review/"
                                        class="btn btn-soft-primary btn-block text-center"
                                        style="margin:0px 0px 20px 0px;">
                                        Give Review
                                    </a>
                                    <a role="button" href="/user/review/"
                                        class="btn btn-soft-primary btn-block text-center"
                                        style="margin:0px 0px 20px 0px;">
                                        View Review
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Dashboard -->
            </div>

            <!-- Footer -->
            <?php $this->load->view('/panel/parts/footer'); ?>
            <!-- End Footer -->
        </div>
    </main>


    <?php $this->load->view('/panel/parts/footermeta'); ?>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
    </script>
</body>

</html>