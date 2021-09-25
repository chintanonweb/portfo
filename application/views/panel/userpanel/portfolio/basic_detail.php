<?php
defined('BASEPATH') or exit('No direct script access allowed');
$value['basic_detail'] = 'active';
$value['portfolio'] = 'opened';
$value['heading'] = 'Basic Detail';
$b = $this->db->get_where('p_user_detail',array('pu_accno'=>$this->session->userdata('pu_accno')))->row();
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
    <?php $this->load->view('/panel/parts/header',$value); ?>
    <!-- End Header (Topbar) -->

    <main class="u-main" role="main">
        <!-- Sidebar -->
        <?php $this->load->view('/panel/userpanel/sidebar',$value); ?>
        <!-- End Sidebar -->

        <div class="u-content">
            <div class="u-body">
                <!-- Form Control -->
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
                            <form class="mb-3" enctype="multipart/form-data"
                                action="/user/portfolio/basic_detail/basicdetail" method="post">
                                <?php
                                if($b->pud_image == ''){
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
                                            <img src="data:image/png;base64,<?php echo base64_encode($b->pud_image)?>"
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
                                    <label for="name">Name :</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter Full Name"
                                        name="name" value="<?php echo $b->pud_name; ?>" required></div>
                                <div class="form-group">
                                    <label for="profession">Profession :</label>
                                    <input type="text" class="form-control" id="profession"
                                        placeholder="Enter Profession Name" name="profession"
                                        value="<?php echo $b->pud_profession; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="mobile">Contact Number :</label>
                                    <input id="mobile" type="text" name="mobile" class="form-control"
                                        placeholder="Enter Contact Number" value="<?php echo $b->pud_contact_no; ?>"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email ID :</label>
                                    <input id="email" type="email" name="email" class="form-control"
                                        placeholder="Enter Email Id" value="<?php echo $b->pud_email; ?>"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="website">Website :</label>
                                    <input id="website" type="text" name="website" class="form-control"
                                        placeholder="Enter User Website" value="<?php echo $b->pud_website; ?>"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="gender">Gender : </label><br>
                                    <div class="form-check-inline">
                                        <label class="form-check-label" for="radio1">
                                            <input type="radio" class="form-check-input" id="radio1" name="optradio"
                                                value="male"
                                                <?php if($b->pud_gender == 'male'){ $m = "checked"; echo $m; }?>>Male
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label" for="radio2">
                                            <input type="radio" class="form-check-input" id="radio2" name="optradio"
                                                value="female"
                                                <?php if($b->pud_gender == 'female'){ $f = "checked"; echo $f; }?>>Female
                                        </label>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="date">Date Of Birth :</label>
                                    <input type="date" class="form-control" id="date" placeholder="Enter DOB"
                                        name="date" value="<?php echo $b->pud_dob; ?>" required></div>
                                <div class="form-group">
                                    <label for="address">Address :</label>
                                    <textarea class="form-control" rows="5" id="address" placeholder="Enter Address"
                                        name="address" required><?php echo $b->pud_address; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="city">City :</label>
                                    <input type="text" class="form-control" id="city" placeholder="Enter City Name"
                                        name="city" value="<?php echo $b->pud_city; ?>" required></div>
                                <div class="form-group">
                                    <label for="pincode">Pincode :</label>
                                    <input type="text" class="form-control" id="pincode" placeholder="Enter Pincode"
                                        name="pincode" value="<?php echo $b->pud_pincode; ?>" required></div>
                                <div class="form-group">
                                    <label for="state">State :</label>
                                    <input type="text" class="form-control" id="state" placeholder="Enter State Name"
                                        name="state" value="<?php echo $b->pud_state; ?>" required></div>
                                <div class="form-group">
                                    <label for="about">About US :</label>
                                    <textarea class="form-control" rows="5" id="about" placeholder="Enter About us"
                                        name="about" required><?php echo $b->pud_detail; ?></textarea></div>
                                <div class="text-center">
                                    <button class="btn btn-primary btn-block" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </div>
                <!-- End Form Control -->
            </div>
            <!-- Footer -->
            <?php $this->load->view('/panel/parts/footer'); ?>
            <!-- End Footer -->
        </div>
    </main>

    <?php $this->load->view('/panel/parts/footermeta'); ?>
</body>

</html>