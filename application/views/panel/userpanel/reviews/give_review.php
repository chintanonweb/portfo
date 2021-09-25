<?php
defined('BASEPATH') or exit('No direct script access allowed');
$value['give_review'] = 'active';
$value['reviews'] = 'opened';
$value['heading'] = 'Give Review';
$re = $this->db->get_where('p_review', array('pu_accno' => $this->session->userdata('pu_accno'),'pr_status'=>0));
?>
<!DOCTYPE html>
<html lang="en" class="no-js">

<!-- Head -->

<head>
    <?php $this->load->view('/panel/parts/headermeta', $value); ?>
</head>
<!-- End Head -->

<body>
    <!-- Header (Topbar) -->
    <?php $this->load->view('/panel/parts/header'); ?>
    <!-- End Header (Topbar) -->

    <main class="u-main" role="main">
        <!-- Sidebar -->
        <?php $this->load->view('/panel/userpanel/sidebar', $value); ?>
        <!-- End Sidebar -->

        <div class="u-content">
            <div class="u-body">
                <!-- Review -->
                <div class="container-fluid bg-white h-100 pt-3 pb-3">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            
                            <?php 
                             if($this->session->flashdata('text')) 
                                {
                                    echo '<div class="alert alert-'.$this->session->flashdata('alert').'">';
                                    echo $this->session->flashdata('text');
                                    echo '</div>';
                                }
                            ?>
                            <form class="mb-3" enctype="multipart/form-data" action="/user/reviews/give_review/reviewadd"
                                method="post">
                                <div class="form-group">
                                    <label for="sel1">Link:</label>
                                    <select name="cid" class="form-control" id="sel1">
                                        <?php
                                            foreach ($re->result() as $row) {
                                                $mm = $this->db->get_where('p_company_detail', array('pcd_accno' => $row->pcd_accno))->row();
                                        ?>
                                        <option value="<?php echo $row->pr_id; ?>">
                                            <?php echo $mm->pcd_company_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="msg">Message :</label>
                                    <textarea class="form-control" rows="3" id="msg" placeholder="Your Message to Us"
                                        name="msg" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="rating">Rating :</label>
                                    <input type="number" class="form-control" id="rating" placeholder="Enter Rating "
                                        name="rating" required>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-primary btn-block" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </div>
                <!-- End Review -->
            </div>

            <!-- Footer -->
            <?php $this->load->view('/panel/parts/footer'); ?>
            <!-- End Footer -->
        </div>
    </main>


    <?php $this->load->view('/panel/parts/footermeta'); ?>

</body>

</html>