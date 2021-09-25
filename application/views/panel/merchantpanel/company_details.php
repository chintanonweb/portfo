<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['heading']='Company Details';
$data['company_detail']='active';
$c = $this->db->get_where('p_company_detail',array('pu_accno'=>$this->session->userdata('pu_accno')));
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
                        <div class="col-md-3">
                        </div>

                        <div class="col-md-6">
                            <?php 
                             if($this->session->flashdata('text')) 
                                {
                                    echo '<div class="alert alert-'.$this->session->flashdata('alert').'">';
                                    echo $this->session->flashdata('text');
                                    echo '</div>';
                                }
                        ?>
                            <form class="mb-3" action="/merchant/company_details/companydetail"
                                enctype="multipart/form-data" method="post">
                                <?php
                                foreach($c->result() as $row){
                                ?>
                                <?php
                                if($row->pcd_logo == ''){
                                ?> <div class="image-upload text-center">
                                    <label for="file-input">
                                        <div class="img-text">
                                            <img src="/assets/img/company.png" alt="Avatar"
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
                                            <img src="data:image/png;base64,<?php echo base64_encode($row->pcd_logo)?>"
                                                alt="Company Logo" class="img-fluid rounded-circle mb-3" width="100">
                                            <div class="middle">
                                                <div class="text">Upload Image</div>
                                            </div>

                                        </div>
                                    </label>
                                    <input id="file-input" name="clogo" type="file" />
                                </div>
                                <?php
                                }
                                ?>
                                <div class="form-group">
                                    <label for="cname">Company Name :</label>
                                    <input type="text" class="form-control" id="cname" placeholder="Enter Company Name"
                                        name="cname" value="<?php echo $row->pcd_company_name; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="desc">Description :</label>
                                    <textarea class="form-control" rows="4" id="desc"
                                        placeholder="Enter Company Description" name="desc"
                                        required><?php echo $row->pcd_desc; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="sname">Service name :</label>
                                    <input type="text" class="form-control" id="sname"
                                        placeholder="Enter Company Service Name" name="sname"
                                        value="<?php echo $row->pcd_service; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="contact">Contact Number :</label>
                                    <input type="text" class="form-control" id="contact"
                                        placeholder="Enter Contact Number" name="contact"
                                        value="<?php echo $row->pcd_contact_no; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email ID :</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter Email Id"
                                        name="email" value="<?php echo $row->pcd_email; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="cwebsite">Website :</label>
                                    <input type="text" class="form-control" id="cwebsite"
                                        placeholder="Enter Company Website" name="cwebsite"
                                        value="<?php echo $row->pcd_website; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address :</label>
                                    <textarea class="form-control" rows="4" id="address"
                                        placeholder="Enter Company Address" name="address"
                                        required><?php echo $row->pcd_address; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="city">City :</label>
                                    <input type="text" class="form-control" id="city" placeholder="Enter City Name"
                                        name="city" value="<?php echo $row->pcd_city; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="pincode">Pincode :</label>
                                    <input type="text" class="form-control" id="pincode"
                                        placeholder="Enter Area Pincode" name="pincode"
                                        value="<?php echo $row->pcd_pincode; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="state">State :</label>
                                    <input type="text" class="form-control" id="state" placeholder="Enter State Name"
                                        name="state" value="<?php echo $row->pcd_state; ?>" required>
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
                                <?php } ?>
                            </form>

                        </div>

                        <div class="col-md-3">
                        </div>
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