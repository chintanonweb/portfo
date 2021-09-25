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
        <?php $this->load->view('/panel/adminpanel/sidebar',$value); ?>
        <!-- End Sidebar -->

        <div class="u-content">
            <div class="u-body">
                <!-- Dashboard -->
                <div class="container-fluid bg-white h-100 pt-3 pb-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body media align-items-center px-xl-3">
                                            <div class="media-body">
                                                <h5 class="h6 text-muted text-uppercase mb-2">
                                                    Number Of Users
                                                </h5>
                                                <?php $u = $this->db->get_where('p_user', array('pu_role' =>"user")); ?>
                                                <span class="h2 mb-0"><?php echo $u->num_rows(); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body media align-items-center px-xl-3">
                                            <div class="media-body">
                                                <h5 class="h6 text-muted text-uppercase mb-2">
                                                    Number Of Merchants
                                                </h5>
                                                <?php $m = $this->db->get_where('p_user', array('pu_role' =>"merchant")); ?>
                                                <span class="h2 mb-0"><?php echo $m->num_rows(); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body media align-items-center px-xl-3">
                                            <div class="media-body">
                                                <h5 class="h6 text-muted text-uppercase mb-2">
                                                    Number Of Themes
                                                </h5>
                                                <?php $q = $this->db->query('SELECT * FROM pu_theme'); ?>
                                                <span class="h2 mb-0"><?php echo $q->num_rows(); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body media align-items-center px-xl-3">
                                            <div class="media-body">
                                                <h5 class="h6 text-muted text-uppercase mb-2">
                                                    Number Of Packages
                                                </h5>
                                                <?php $qp = $this->db->query('SELECT * FROM p_package'); ?>
                                                <span class="h2 mb-0"><?php echo $qp->num_rows(); ?></span>
                                            </div>
                                        </div>
                                    </div>
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
</body>

</html>