<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['heading']='Get a link';
$data['getalink']='active';
$data['reviews']='u-sidebar-nav--opened';
?>
<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <!-- Head -->
    <?php $this->load->view('/panel/parts/headermeta',$data); ?>
    <!-- End Head -->
</head>

<body>
    <!-- Header (Topbar) -->
    <?php $this->load->view('/panel/parts/header'); ?>
    <!-- End Header (Topbar) -->
    
    <main class="u-main" role="main">
        <!-- Sidebar -->
        <?php $this->load->view('/panel/merchantpanel/sidebar',$data);?>
        <!-- End Sidebar -->
        <div class="u-content">
            <div class="u-body">
                <div class="container-fluid bg-white h-100 pt-3 pb-3">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <form action="/merchant/reviews/get_a_link/addlink" method="post">
                                <div class="form-group">
                                    <label for="email">Email :</label>
                                    <input type="text" class="form-control" id="email" placeholder="Enter Email Id"
                                        name="email" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </form>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </div>

            </div>
            <!-- Footer -->
            <?php $this->load->view('/panel/parts/footer'); ?>
            <!-- End Footer -->

        </div>
    </main>

    <!-- Footer Meta -->
    <?php $this->load->view('/panel/parts/footermeta'); ?>
    <!-- Footer Meta -->

</body>

</html>