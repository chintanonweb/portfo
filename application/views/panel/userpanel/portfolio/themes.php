<?php
defined('BASEPATH') or exit('No direct script access allowed');
$value['themes'] = 'active';
$value['portfolio'] = 'opened';
$value['heading'] = 'Themes';
$accno = $this->session->userdata('pu_accno');
$query = $this->db->get_where('p_user', array('pu_accno' => $accno))->row();
$theme = $this->db->get('pu_theme');
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
                <!-- Themes -->
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
                            <form action="/user/portfolio/themes/selecttheme" method="post">
                                <div class="form-group">
                                    <label for="theme">Theme<span class="required">*</span></label>
                                    <select id="theme" name="theme" class="form-control">
                                        <option value="" selected disabled>Select Theme</option>
                                        <?php foreach ($theme->result() as $row) { ?>
                                        <option value="<?php echo $row->put_name; ?>" <?php if ($row->put_id == $query->pu_theme) {
                                                                                                            echo "selected";
                                                                                                        } ?>>
                                            <?php echo $row->put_name; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <input type="submit" class="btn btn-primary btn-block" value="submit">
                            </form>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="row">
                        <?php foreach ($theme->result() as $row) { ?>
                        <div class="col-md-4 mb-3 mt-3">
                            <img class="img-fluid d-block mb-3"
                                src="data:image/png;base64,<?php echo base64_encode($row->put_image) ?>"
                                alt="<?php echo $row->put_name; ?>">
                            <span class="font-weight-semibold"><?php echo $row->put_name; ?></span>
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <!-- End Themes -->
            </div>

            <!-- Footer -->
            <?php $this->load->view('/panel/parts/footer'); ?>
            <!-- End Footer -->
        </div>
    </main>

    <!-- Footer meta -->
    <?php $this->load->view('/panel/parts/footermeta'); ?>
    <!-- End Footer meta -->
</body>

</html>