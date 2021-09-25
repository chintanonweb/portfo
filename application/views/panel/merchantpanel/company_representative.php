<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['heading']='Company Representative';
$data['company_representative']='active';
$r = $this->db->get_where('p_company_detail',array('pu_accno'=>$this->session->userdata('pu_accno')))->row();
$cr = $r->pcd_accno;
$r2 = $this->db->get_where('p_company_representative',array('pcd_accno'=>$cr))->row();
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
    <?php $this->load->view('/panel/parts/header',$data); ?>
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
                            <?php 
                             if($this->session->flashdata('text')) 
                                {
                                    echo '<div class="alert alert-'.$this->session->flashdata('alert').'">';
                                    echo $this->session->flashdata('text');
                                    echo '</div>';
                                }
                        ?>
                            <form class="mb-3" action="/merchant/company_representative/companyrep"
                                enctype="multipart/form-data" method="post">
                                <?php
                                if($r2->pcr_image == ''){
                                ?> <div class="image-upload text-center">
                                    <label for="file-input">
                                        <div class="img-text">
                                            <img src="/panelassets/img/user.png" alt="Avatar"
                                                class="img-fluid rounded-circle mb-3" width="100">
                                            <div class="middle">
                                                <div class="text">Upload Image</div>
                                            </div>

                                        </div>
                                    </label>
                                    <input id="file-input" name="avtar" type="file" />
                                </div>
                                <?php
                                }
                                else{
                                ?>
                                <div class="image-upload text-center">
                                    <label for="file-input">
                                        <div class="img-text">
                                            <img src="data:image/png;base64,<?php echo base64_encode($r2->pcr_image)?>"
                                                alt="Avatar" class="img-fluid rounded-circle mb-3" width="100">
                                            <div class="middle">
                                                <div class="text">Upload Image</div>
                                            </div>

                                        </div>
                                    </label>
                                    <input id="file-input" name="avtar" type="file" />
                                </div>
                                <?php
                                }
                                ?>
                                <div class="form-group">
                                    <label for="rname">Name :</label>
                                    <input type="text" class="form-control" id="rname"
                                        placeholder="Enter Representative Name" name="rname"
                                        value="<?php echo $r2->pcr_name; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email Id :</label>
                                    <input type="email" class="form-control" id="email"
                                        placeholder="Enter Representative Email Id" name="email"
                                        value="<?php echo $r2->pcr_email; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="contact">Mobile Number :</label>
                                    <input type="text" class="form-control" id="contact"
                                        placeholder="Enter Representative Mobile Number" name="contact"
                                        value="<?php echo $r2->pcr_mobile_no; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="d-flex align-items-center justify-content-between">
                                        <span class="form-label-text">Visibility : </span>
                                        <div class="form-toggle">
                                            <input name="flag" type="checkbox" value="1" checked required>
                                            <div class=" form-toggle__item">
                                                <i class="fa" data-check-icon="&#xf00c" data-uncheck-icon="&#xf00d"></i>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-primary btn-block" type="submit">Submit</button>
                                </div>
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