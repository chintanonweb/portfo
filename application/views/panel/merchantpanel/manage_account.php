<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['manage_account'] = 'active';
$data['heading'] = 'Manage Account';
$um = $this->db->get_where('p_user', array('pu_accno' => $this->session->userdata('pu_accno')))->row();
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<!-- Head -->

<head>
    <?php $this->load->view('/panel/parts/headermeta', $data); ?>
</head>
<!-- End Head -->

<body>
    <!-- Header (Topbar) -->
    <?php $this->load->view('/panel/parts/header'); ?>
    <!-- End Header (Topbar) -->

    <main class="u-main" role="main">
        <!-- Sidebar -->
        <?php $this->load->view('/panel/merchantpanel/sidebar', $data); ?>
        <!-- End Sidebar -->

        <div class="u-content">
            <div class="u-body">
                <!-- Manage Account -->
                <div class="container-fluid bg-white h-100 pt-3 pb-3">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <?php
                            if ($this->session->flashdata('text')) {
                                echo '<div class="alert alert-' . $this->session->flashdata('alert') . '">';
                                echo $this->session->flashdata('text');
                                echo '</div>';
                            }
                            ?>
                        </div>
                        <div class="col-md-3"></div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="h3">Edit Portfolio Link</h2>
                            <hr>
                            <form class="mb-3" enctype="multipart/form-data" action="/merchant/manage_account/editlink/" method="post">
                                <div class="form-group">
                                    <label for="ulink">Link :</label>
                                    <input type="ulink" class="form-control" id="ulink" placeholder="Enter Portfolio Link" name="ulink" value="<?php echo $um->pu_link; ?>" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </form>
                            <h2 class="h3">Edit Merchant Email</h2>
                            <hr>
                            <form class="mb-3" enctype="multipart/form-data" action="/merchant/manage_account/editemail/" method="post">
                                <div class="form-group">
                                    <label for="email">Email :</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter Email Id" name="email" value="<?php echo $um->pu_email; ?>" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <h2 class="h3">Change Password</h2>
                            <hr>
                            <form class="mb-3" enctype="multipart/form-data" action="/merchant/manage_account/editpass/" method="post">
                                <div class="form-group">
                                    <label for="pwd">Password:</label>
                                    <input type="password" class="form-control" id="pwd" name="password" required>
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Confirm Password:</label>
                                    <input type="password" class="form-control" id="pwd" name="cpassword" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Manage Account -->

            </div>

            <!-- Footer -->
            <?php $this->load->view('/panel/parts/footer'); ?>
            <!-- End Footer -->
        </div>
    </main>

    <!-- Global Vendor -->
    <?php $this->load->view('/panel/parts/footermeta'); ?>
</body>

</html>