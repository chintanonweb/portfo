<?php
$query = $this->db->get_where('p_user_detail', array('pu_accno' => $accno))->row();
$query1 = $this->db->get_where('pu_socialmedia', array('pu_accno' => $accno));
$query2 = $this->db->get_where('pu_education', array('pu_accno' => $accno));
$query3 = $this->db->get_where('pu_work_experience', array('pu_accno' => $accno));
$query4 = $this->db->get_where('pu_achievement', array('pu_accno' => $accno));
$query5 = $this->db->get_where('pu_skill', array('pu_accno' => $accno));
$query6 = $this->db->get_where('pu_language', array('pu_accno' => $accno));
$query7 = $this->db->get_where('pu_gallery', array('pu_accno' => $accno));
$query8 = $this->db->get_where('p_user', array('pu_accno' => $accno))->row();
$query9 = $this->db->get_where('pu_hobbies', array('pu_accno' => $accno));

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo strtoupper($query->pud_name) . " - " . $query->pud_profession; ?></title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="/themeassets/theme2/css/bootstrap.min.css">
    <!-- Material Design Icons -->
    <link href="/themeassets/theme2/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css"
        rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" rel="stylesheet">
    <!-- Ionicons -->
    <link href="/themeassets/theme2/fonts/ionicons/css/ionicons.min.css" rel="stylesheet">
    <!-- Owl Carousel -->
    <link href="/themeassets/theme2/css/owl.carousel.css" rel="stylesheet">
    <link href="/themeassets/theme2/css/owl.theme.default.css" rel="stylesheet">
    <!-- Style.css -->
    <link href="/themeassets/theme2/css/style.css" rel="stylesheet">
    <style>
    .zoom {
        transition: transform 0.2s;
        margin: 0 auto;
    }

    .zoom:hover {
        -ms-transform: scale(2);
        /* IE 9 */
        -webkit-transform: scale(2);
        /* Safari 3-8 */
        transform: scale(2);
    }
    </style>

</head>

<body>

    <!-- Header -->
    <header class="header">
        <div class="">
            <a href="#section8" class="available"><i class=""></i></a>
            <div class="right-icons">
                <a href="#" class="open-search header-open-search"></a>
                <a href="#" class="share"></a>
            </div>
        </div>
        <div class="bottom clearfix">
            <div class="title"><a
                    href="<?php echo "https://" . $_SERVER['HTTP_HOST'] . "/" . $query8->pu_link; ?>"><?php echo $query->pud_name; ?></a>
            </div>
            <a href="#" class="responsive-menu-open">Menu <i class="fa fa-bars"></i></a>
            <nav class="main-nav">
                <ul class="list-unstyled">
                    <li class="active"><a href="#section1">Home</a></li>
                    <li><a href="#section2">Education</a></li>
                    <li><a href="#section3">Experience</a></li>
                    <li><a href="#section4">Achievement</a></li>
                    <li><a href="#section5">Skill</a></li>
                    <li><a href="#section6">Gallery</a></li>
                    <li><a href="#section7">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- end .header -->
    <div class="responsive-menu">
        <a href="#" class="responsive-menu-close">Close <i class="ion-android-close"></i></a>
        <nav class="responsive-nav"></nav>
    </div>

    <!-- Sections -->
    <div class="sections">
        <div class="sections-wrapper clearfix">
            <!-- Home -->
            <section id="section1" class="no-padding-bottom active">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="text-center">
                                <?php
                                if ($query->pud_image == '') {
                                ?>
                                <img class="rounded-circle" src="/themeassets/theme2/images/avatar.png" alt=""
                                    width="250" height="250">
                                <?php
                                } else {
                                ?>
                                <img class="rounded-circle"
                                    src="data:image/jpg;base64,<?php echo base64_encode($query->pud_image); ?>" alt=""
                                    width="250" height="250">
                                <?php
                                }
                                ?>
                                <h2 class="text-center mt-1 mb-0"><?php echo $query->pud_name; ?></h2>
                                <h6 class="text-center mt-1 mb-0"><?php echo $query->pud_profession; ?></h6>
                                <div class="social-icons p-3">
                                    <?php foreach ($query1->result() as $row) { ?>
                                    <a href="<?php echo $row->pusm_link; ?>" class="social-icon" target="_blank">
                                        <i class="<?php echo $row->pusm_icon; ?>"></i></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h1><?php echo $query->pud_name; ?></h1>
                            <p class="text-justify"><?php echo $query->pud_detail; ?></p>
                            <ul class="fa-ul">
                                <?php if ($query->pud_dob) { ?>
                                <li class="mb-2">
                                    <span class="fa-li"><i class="fa fa-calendar"></i></span>Date Of Birth :
                                    <?php echo date("d-m-Y", strtotime($query->pud_dob)); ?>
                                </li>
                                <?php } ?>
                                <?php if ($query->pud_email) { ?>
                                <li class="mb-2">
                                    <span class="fa-li"><i class="fa fa-envelope"></i></span>Email:
                                    <a class="txt-srs-s" href="mailto:<?php echo $query->pud_email; ?>">
                                        <?php echo $query->pud_email; ?>
                                    </a>
                                </li>

                                <?php } ?>
                                <?php if ($query->pud_contact_no) { ?>
                                <li class="mb-2">
                                    <span class="fa-li"><i class="fa fa-phone"></i></span>Phone: + 91
                                    <?php echo $query->pud_contact_no; ?>
                                </li>
                                <?php } ?>
                                <?php if ($query->pud_website) { ?>
                                <li class="mb-2">
                                    <span class="fa-li"><i class="fa fa-globe"></i></span>Website:
                                    <a target="_blank" href="<?php echo $query->pud_website; ?>">
                                        <?php echo $query->pud_website; ?>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                            <div class="row text-center">
                                <div class="mr-3">
                                    <a href="#" class="btn btn-outline-primary">
                                        <i class="fa fa-download"></i> My resume
                                    </a>
                                </div>
                                <div class="">
                                    <a href="#section7" target="_blank" class="btn btn-outline-primary">
                                        <i class="fa fa-envelope"></i> Get in Touch
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--End Home -->

            <!-- Education -->
            <section id="section2">
                <div class="container">
                    <h2>Educational</h2>
                    <div class="experience-timeline mb-4">
                        <?php foreach ($query2->result() as $row) { ?>
                        <div class="experience-block clearfix">
                            <div class="meta">
                                <span class="year"><?php echo $row->pue_completion; ?></span>
                                <span class="company"><?php echo $row->pue_course; ?></span>
                            </div>
                            <div class="content">
                                <h6 class="text-muted"><?php echo $row->pue_university; ?> |
                                    <?php echo $row->pue_college; ?></h6>
                                <p><?php echo $row->pue_detail; ?></p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-briefcase"></i>
                            </div>
                            <div class="line"></div>
                        </div>
                        <?php } ?>
                    </div>
                    <h2>Hobbies & Interest</h2>
                    <div class="row">
                        <?php foreach ($query9->result() as $row) { ?>
                        <div class="col-sm-2 col-sm-offset-1 col-xs-6">
                            <div class="icon-box">
                                <div class="icon"><i class="<?php echo $row->puh_icon; ?>"></i></div>
                                <h6><?php echo $row->puh_name; ?></h6>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
            <!-- end Education -->

            <!-- Experience -->
            <section id="section3">
                <div class="container">
                    <h2>Work Experience</h2>
                    <div class="experience-timeline">
                        <?php foreach ($query3->result() as $row) { ?>
                        <div class="experience-block clearfix">
                            <div class="meta">
                                <span class="year"><?php echo $row->puwe_startdate; ?> -
                                    <?php echo $row->puwe_enddate; ?></span>
                                <span class="company"><?php echo $row->puwe_company_name; ?></span>
                            </div>
                            <div class="content">
                                <h5><?php echo $row->puwe_position; ?></h5>
                                <p><?php echo $row->puwe_summary; ?></p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-briefcase"></i>
                            </div>
                            <div class="line"></div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
            <!-- end Experience -->
            <!-- Achievement -->
            <section id="section4">
                <div class="container">
                    <h2>Achievement</h2>
                    <div class="experience-timeline">
                        <?php
                        $i = 1;
                        $n = $query4->num_rows();
                        foreach ($query4->result() as $row) { ?>
                        <div class="experience-block clearfix">
                            <div class="meta">
                                <span class="year"><?php echo $row->pua_date; ?></span>
                                <span class="company"><?php echo $row->pua_title; ?></span>
                            </div>
                            <div class="content">
                                <h5><?php echo $row->pua_place; ?></h5>
                                <p><?php echo $row->pua_summary; ?></p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-trophy"></i>
                            </div>
                            <?php if ($i < $n) { ?>
                            <div class="line"></div>
                            <?php } ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
            <!-- End Achievement -->

            <!-- Skill -->
            <section id="section5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="container">
                                <h2>Skills</h2>
                                <?php foreach ($query5->result() as $row) { ?>
                                <label class="progress-bar-label"><?php echo $row->pus_name; ?></label>
                                <div class="progress" style="height: 20px;">
                                    <div class="progress-bar bg-info" role="progressbar"
                                        style="width: <?php echo $row->pus_percentage . "%"; ?>;"
                                        aria-valuenow="<?php echo $row->pus_percentage; ?>" aria-valuemin="0"
                                        aria-valuemax="100"><?php echo $row->pus_percentage; ?>%</div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="container">
                                <h2>Language</h2>
                                <?php foreach ($query6->result() as $row) { ?>
                                <label class="progress-bar-label"><?php echo $row->pul_name; ?></label>
                                <div class="progress" style="height: 20px;">
                                    <div class="progress-bar bg-warning" role="progressbar"
                                        style="width: <?php echo $row->pul_level . "%"; ?>;"
                                        aria-valuenow="<?php echo $row->pul_level; ?>" aria-valuemin="0"
                                        aria-valuemax="100"><?php echo $row->pul_level . "%"; ?>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Skill -->
            <!-- Gallery -->
            <section id="section6">
                <div class="container">
                    <h2>Gallery</h2>
                    <div class="portfolio-wrapper">
                        <div id="portfolio" class="portfolio">
                            <?php foreach ($query7->result() as $row) { ?>
                            <div class="item print">
                                    <img src="data:image/jpg;base64,<?php echo base64_encode($row->pug_img); ?>"
                                        alt="alt text" class="img-responsive">
                                <div class="overlay">
                                    <div class="background"></div>
                                    <div class="meta">
                                        <span class="title"><?php echo $row->pug_title; ?></span>
                                        <span class="category"><?php echo $row->pug_desc; ?></span>
                                    </div>
                            </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end Gallery -->

            <!-- Contact -->
            <section id="section7">
                <div class="container">
                    <h2>Get In Touch With Me</h2>
                    <div class="row">
                        <div class="col-sm-5">
                            <h5>Contact Address</h5>
                            <ul class="list-icons list-unstyled">
                                <li>
                                    <i class="fas fa-map-marker-alt"></i>
                                    <?php echo $query->pud_address . ", " . $query->pud_city . "-" . $query->pud_pincode; ?>
                                </li>
                                <li>
                                    <i class="fas fa-phone"></i>
                                    Phone: +91 <?php echo $query->pud_contact_no; ?></li>
                                <li><i class="fas fa-envelope"></i>Email:
                                    <a href="mailto:<?php echo $query->pud_email; ?>">
                                        <?php echo $query->pud_email; ?>
                                    </a>
                                </li>
                                <li>
                                    <i class="fas fa-globe"></i>Website:
                                    <a href="<?php echo $query->pud_website; ?>">
                                        <?php echo $query->pud_website; ?>
                                    </a>
                                </li>
                            </ul>
                            <div class="spacer"></div>
                            <div class="social-icons">
                                <?php foreach ($query1->result() as $row) { ?>
                                <a href="<?php echo $row->pusm_link; ?>" class="social-icon" target="_blank">
                                    <i class="<?php echo $row->pusm_icon; ?>"></i></a>
                                <?php } ?>
                            </div>
                            <div class="spacer"></div>
                        </div>
                        <div class="col-sm-7">
                            <h5>Contact Form</h5>
                            <form action="" method="post" class="form-horizontal contact-form">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="contact-name" name="contact-name" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="contact-email" name="contact-email" />
                                    </div>
                                </div> <!-- end .form-group -->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Message</label>
                                    <div class="col-sm-10">
                                        <textarea name="contact-message" class="contact-message" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-10 col-sm-offset-2">
                                        <button type="submit" class="button solid-button purple">Send Message</button>
                                    </div> <!-- end .col-sm-10 -->
                                </div> <!-- end .form-group -->
                                <div class="contact-loading alert alert-info form-alert">
                                    <span class="message">Loading...</span>
                                    <button type="button" class="close" data-hide="alert" aria-label="Close"><i
                                            class="fa fa-times"></i></button>
                                </div>
                                <div class="contact-success alert alert-success form-alert">
                                    <span class="message">Success!</span>
                                    <button type="button" class="close" data-hide="alert" aria-label="Close"><i
                                            class="fa fa-times"></i></button>
                                </div>
                                <div class="contact-error alert alert-danger form-alert">
                                    <span class="message">Error!</span>
                                    <button type="button" class="close" data-hide="alert" aria-label="Close"><i
                                            class="fa fa-times"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end Contact -->
        </div>
    </div>
    <!-- jQuery -->
    <script src="/themeassets/theme2/js/jquery-1.11.2.min.js"></script>
    <!-- Bootstrap -->
    <script src="/themeassets/theme2/js/bootstrap.min.js"></script>
    <!-- Inview -->
    <script src="/themeassets/theme2/js/jquery.inview.min.js"></script>
    <!-- SmoothScroll -->
    <script src="/themeassets/theme2/js/smoothscroll.js"></script>
    <!-- jQuery Knob -->
    <script src="/themeassets/theme2/js/jquery.knob.min.js"></script>
    <!-- Owl Carousel -->
    <script src="/themeassets/theme2/js/owl.carousel.min.js"></script>
    <!-- Isotope -->
    <script src="/themeassets/theme2/js/isotope.pkgd.min.js"></script>
    <!-- Images Loaded -->
    <script src="/themeassets/theme2/js/imagesloaded.pkgd.min.js"></script>
    <!-- Images View -->
    <script src="/themeassets/theme2/js/scripts.js"></script>
</body>

</html>