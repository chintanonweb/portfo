<?php
defined('BASEPATH') or exit('No direct script access allowed');
$value['manage_account'] = 'active';
$value['heading'] = 'Manage Account';
$um = $this->db->get_where('p_user',array('pu_accno'=>$this->session->userdata('pu_accno')))->row();
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
                <!-- Manage Account -->
                <div class="container-fluid bg-white h-100 pt-3 pb-3">
                    <div class="row">
                       
                        <div class="col-md-6">
                            <h2 class="h3">Edit Portfolio Link</h2>
                            <hr>
                            <?php 
                             if($this->session->flashdata('text')) 
                                {
                                    echo '<div class="alert alert-'.$this->session->flashdata('alert').'">';
                                    echo $this->session->flashdata('text');
                                    echo '</div>';
                                }
                            ?>
                            <form class="mb-3" enctype="multipart/form-data" action="/user/manage_account/editlink/"
                                method="post">
                                <div class="form-group">
                                    <label for="ulink">Link :</label>
                                    <input type="ulink" class="form-control" id="ulink" placeholder="Enter Portfolio Link"
                                        name="ulink" value="<?php echo $um->pu_link; ?>" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <h2 class="h3">Change Password</h2>
                            <hr>
                            <?php 
                             if($this->session->flashdata('text')) 
                                {
                                    echo '<div class="alert alert-'.$this->session->flashdata('alert').'">';
                                    echo $this->session->flashdata('text');
                                    echo '</div>';
                                }
                            ?>
                            <form class="mb-3" enctype="multipart/form-data" action="/user/manage_account/editpass/"
                                method="post">
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