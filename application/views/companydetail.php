<?php
$query = $this->db->get_where('p_company_detail', array('pu_accno' => $accno))->row();
$data['heading'] = $query->pcd_company_name;
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Head -->
<?php
$this->load->view('parts/headermeta', $data);
?>
<!-- End Head -->

<body>
    <!-- Header -->
    <?php $this->load->view('parts/header', $data);
    ?>
    <!-- End Header -->
    <main role="main">
        <div id="comapnyslider" class="owl-carousel owl-theme mb-3">
            <?php
            $query1 = $this->db->get_where('pc_publish_offer', array('pcd_accno' => $query->pcd_accno, 'ppo_flag' => 1));
            foreach ($query1->result() as $row) {
            ?>
                <img class="img-fluid" src="data:image/png;base64,<?php echo base64_encode($row->ppo_image); ?>" alt="<?php echo $row->ppo_name; ?>">
            <?php
            }
            ?>
        </div>
        <div class="u-content-space">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-4">
                                    <?php
                                    if ($query->pcd_logo == '') {
                                    ?>
                                        <img class="card-img-top" src="/assets/img/company.png" alt="<?php echo $query->pcd_company_name; ?>">
                                    <?php
                                    } else {
                                    ?>
                                        <img class="card-img-top" src="data:image/png;base64,<?php echo base64_encode($query->pcd_logo) ?>" alt="<?php echo $query->pcd_company_name; ?>">
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-md-8">
                                    <h3 class="font-weight-bold"><?php echo $query->pcd_company_name; ?></h3>
                                    <p>
                                        <?php echo $query->pcd_address . " " . $query->pcd_city . ", " . $query->pcd_state . " " . $query->pcd_pincode; ?>
                                    </p>
                                    <span class="badge badge-pill badge-danger p-1">
                                        <?php echo $query->pcd_service; ?>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <ul class="nav nav-pills nav-fill mt-3 mb-3" role="tablist">
                            <li class="nav-item m-2 mb-2 nav-shadow">
                                <a class="nav-link txt-srs-s border border-info active" data-toggle="pill" href="#about"><i class="fas fa-info-circle"></i>
                                    About</a>
                            </li>
                            <li class="nav-item m-2 mb-2 nav-shadow">
                                <a class="nav-link txt-srs-s border border-info" data-toggle="pill" href="#offers"><i class="fas fa-tag"></i>
                                    Offers</a>
                            </li>

                            <li class="nav-item m-2 mb-2 nav-shadow">
                                <a class="nav-link txt-srs-s border border-info" data-toggle="pill" href="#reviews"><i class="fas fa-star"></i>
                                    Reviews</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="card-shadow mb-3">
                            <div class="card-body border border-info">
                                <div class="tab-content">
                                    <div id="about" class="container tab-pane active"><br>
                                        <p class="text-justify"><?php echo $query->pcd_desc; ?></p>
                                        <h5><b>Contact Information</b></h5>
                                        <div class="row mb-1 pt-1">
                                            <div class="col-md-4">
                                                <h6><i class="fas fa-phone"></i> Support</h6>
                                                <p><?php echo $query->pcd_contact_no; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="offers" class="container tab-pane fade"><br>
                                        <?php
                                        $query1 = $this->db->get_where('pc_publish_offer', array('pcd_accno' => $query->pcd_accno, 'ppo_flag' => 1));
                                        foreach ($query1->result() as $row) {
                                        ?>
                                            <div class="row">
                                                <div class="col-md-1 pr-0"><h3><i class="fas fa-tag"></i></h3></div>
                                                <div class="col-md-11 pl-0">
                                                    <h3 class="text-danger font-weight-bold">
                                                        <?php echo $row->ppo_name; ?></h3>
                                                        <p><b>Offer valid till <?php echo date("d-m-Y", strtotime($row->ppo_end_date)); ?></b> </p>
                                                    <p><?php echo $row->ppo_desc; ?></p>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>

                                    </div>
                                    <div id="reviews" class="container tab-pane fade mb-3"><br>
                                        <?php
                                        $rev = $this->db->get_where('p_review', array('pcd_accno' => $query->pcd_accno,'pr_status'=>1));
                                        foreach ($rev->result() as $row) {
                                            $user = $this->db->get_where('p_user_detail', array('pu_accno' => $row->pu_accno))->row();
                                        ?>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <?php
                                                    if ($user->pud_image == '') {
                                                    ?>
                                                        <img class="rounded-circle shadow" src="/assets/img/img1.jpg" alt="" width="70" height="70">
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <img class="rounded-circle shadow" src="data:image/png;base64,<?php echo base64_encode($user->pud_image) ?>" alt="<?php echo $user->pud_name; ?>" width="70" height="70">
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <h5 class="text-info"><?php echo $user->pud_name; ?></h5>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <?php for ($i = 0; $i < $row->pr_rating; $i++) { ?>
                                                                <span class="fa fa-star" style="color:gold"></span>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <p><?php echo $row->pr_updated_stamp; ?></p>
                                                    <p><?php echo $row->pr_feedback; ?></p>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="container border border-info shadow text-center mb-3 pt-3 pb-3">
                            <h5><b>Key Person</b></h5>
                            <?php
                            $query1 = $this->db->get_where('p_company_representative', array('pcd_accno' => $query->pcd_accno))->row();
                            if ($query1->pcr_name == '') {
                            } else {
                            ?>
                                <?php
                                if ($query1->pcr_image == '') {
                                ?> <img class="rounded-circle shadow m-3" src="/assets/img/user.png" alt="<?php echo $query1->pcr_name; ?>" width="150" height="150">
                                <?php
                                } else {
                                ?>
                                    <img class="rounded-circle shadow m-3" src="data:image/png;base64,<?php echo base64_encode($query1->pcr_image) ?>" alt="<?php echo $query1->pcr_name; ?>" width="150" height="150">
                                <?php
                                }
                                ?>
                                <h5 class="font-weight-bold"><?php echo $query1->pcr_name; ?></h5>
                                <?php if ($query1->pcr_mobile_no == '') {
                                } else {
                                ?>
                                    <span><i class="fas fa-phone"></i> <?php echo $query1->pcr_mobile_no; ?></span>
                                <?php
                                }
                                if ($query1->pcr_mobile_no == '') {
                                } else {
                                ?>
                                    <br>
                                    <span><i class="fas fa-envelope"></i> <?php echo $query1->pcr_email; ?></span>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <?php
    $this->load->view('parts/footer');
    ?>
    <!-- End Footer -->

    <?php
    $this->load->view('parts/footermeta');
    ?>
    <script>
        $(document).ready(function() {
            $('#comapnyslider').owlCarousel({
                loop: true,
                margin: 0,
                nav: true,
                center: true,
                dots: false,
                autoplay: true,
                autoplayTimeout: 2000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 4
                    }
                }
            });
        });
    </script>
</body>

</html>