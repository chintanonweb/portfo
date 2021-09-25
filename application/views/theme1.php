<?php
$query = $this->db->get_where('p_user_detail', array('pu_accno' => $accno))->row();
$query1 = $this->db->get_where('pu_socialmedia', array('pu_accno' => $accno));
$query2 = $this->db->get_where('pu_education', array('pu_accno' => $accno));
$query3 = $this->db->get_where('pu_work_experience', array('pu_accno' => $accno));
$query4 = $this->db->get_where('pu_achievement', array('pu_accno' => $accno));
$query5 = $this->db->get_where('pu_skill', array('pu_accno' => $accno));
$query6 = $this->db->get_where('pu_language', array('pu_accno' => $accno));
$query7 = $this->db->get_where('pu_gallery', array('pu_accno' => $accno));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo strtoupper($query->pud_name) . " - " . $query->pud_profession; ?></title>
    <!-- Favicons -->
    <link rel="shortcut icon" href="/themeassets/theme1/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/themeassets/theme1/img/favicon.ico" type="image/x-icon">
    <!-- /Favicons-->
    <!-- CSS -->
    <link href="/themeassets/theme1/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Web Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" rel="stylesheet">
    <!-- Nivo Lightbox -->
    <link href="/themeassets/theme1/vendor/nivo-lightbox/nivo-lightbox.css" rel="stylesheet">
    <link rel="stylesheet" href="/themeassets/theme1/vendor/nivo-lightbox/themes/default/default.css" type="text/css" />
    <!-- /Nivo Lightbox -->
    <!-- Perfect ScrollBar -->
    <link href="/themeassets/theme1/vendor/perfect-scrollbar/css/perfect-scrollbar.min.css" rel="stylesheet">
    <!-- owl carousel -->
    <link href="/themeassets/theme1/vendor/owl.carousel/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="/themeassets/theme1/vendor/owl.carousel/owl-carousel/owl.theme.css" rel="stylesheet">
    <!-- Main Styles -->
    <link href="/themeassets/theme1/css/styles.css" rel="stylesheet">
    <!--/CSS -->
</head>

<body>
    <!-- Page Loader -->
    <div class="loader-container" id="page-loader">
        <div class="loading-wrapper">
            <div class="loader-animation" id="loader-animation">
                <span class="loader"><span class="loader-inner"></span></span>
            </div>
            <div class="loader-name" id="loader-name">
                <strong><?php echo $query->pud_name; ?></strong>
            </div>
            <p class="loader-job" id="loader-job"><?php echo $query->pud_profession; ?></p>
        </div>
    </div>
    <!-- /End of Page loader -->
    <!-- Main Content -->
    <section id="body" class="">
        <div class="container">
            <!-- MAIN MENU -->
            <div class="main-menu" id="main-menu">
                <ul class="main-menu-list">
                    <li><a href="#page-resume" class="link-home">Home</a></li>
                    <li><a href="#page-education" class="link-page">Education</a></li>
                    <li><a href="#page-work" class="link-page">Work</a></li>
                    <li><a href="#page-achievement" class="link-page">Achievement</a></li>
                    <li><a href="#page-skills" class="link-page">Skills</a></li>
                    <li><a href="#page-gallery" class="link-page">Gallery</a></li>
                    <li><a href="#page-contact" class="link-page">Contact</a></li>
                </ul>
            </div>
            <!-- /MAIN MENU -->
            <!-- SECTION: vCard Body  -->
            <div class="section-vcardbody section-home" id="section-home">
                <!-- Profile pic-->
                <div class="vcard-profile-pic">
                    <?php
                    if ($query->pud_image == '') {
                    ?>
                    <img src="/themeassets/theme1/img/avatar.png" id="profile2" alt="<?php echo ($query->pud_name); ?>">
                    <?php
                    } else {
                    ?>
                    <img src="data:image/jpg;base64,<?php echo base64_encode($query->pud_image); ?>" id="profile2"
                        alt="<?php echo ($query->pud_name); ?>">
                    <?php
                    }
                    if ($query->pud_image == '') {
                    ?>
                    <img src="/themeassets/theme1/img/avatar.png" id="profile1" class="profileActive"
                        alt="<?php echo ($query->pud_name); ?>">
                    <?php
                    } else {
                    ?>
                    <img src="data:image/jpg;base64,<?php echo base64_encode($query->pud_image); ?>" id="profile1"
                        class="profileActive" alt="<?php echo ($query->pud_name); ?>">
                    <?php } ?>
                </div>
                <!-- /Profile pic -->
                <!-- Description -->
                <div class="vcard-profile-description">
                    <h1 class="profile-title">Hi, I'm <span class="color1"><?php echo $query->pud_name; ?>!</span></h1>
                    <h2 class="profile-subtitle"><?php echo $query->pud_profession; ?></h2>
                    <hr class="hr1">
                    <?php if ($query->pud_detail) { ?>
                    <div class="vcard-profile-description-text">
                        <p><?php echo $query->pud_detail; ?></p>
                    </div>
                    <?php } ?>
                    <!-- Profile Detail -->
                    <div class="vcard-profile-description-feature">
                        <?php if ($query->pud_email) { ?>
                        <div class="vcard-profile-description-ft-item">
                            <p><span>Email:</span> <?php echo $query->pud_email; ?></p>
                        </div>
                        <?php } ?>
                        <?php if ($query->pud_contact_no) { ?>
                        <div class="vcard-profile-description-ft-item">
                            <p><span>Phone:</span> <?php echo $query->pud_contact_no; ?></p>
                        </div>
                        <?php } ?>
                    </div>
                    <!-- /Profile Detail -->
                </div>
                <!-- /Description -->
                <!-- Footer -->
                <div class="vcard-footer">
                    <!-- Social Icons -->
                    <div class="footer-social-icons">
                        <?php foreach ($query1->result() as $row) { ?>
                        <a href="<?php echo $row->pusm_link; ?>" target="_blank"><i
                                class="<?php echo $row->pusm_icon; ?>"></i></a>
                        <?php } ?>
                    </div>
                    <!-- /Social Icons -->
                </div>
            </div>
            <!-- /SECTION: vCard Body  -->

            <!-- PAGE: Education -->
            <div class="section-vcardbody section-page" id="page-education">
                <div class="section-education">
                    <h2 class="section-title">Education</h2>
                    <div class="resume-buttons header-page-buttons">
                        <a href="#" class="btn btn-default btn-default2">
                            <i class="fa fa-download"></i>&nbsp; Downloadmy resume
                        </a>
                        <a href="#page-contact" class="btn btn-default btn-default2 link-page">
                            <i class="fa fa-download"></i>&nbsp; Get in Touch
                        </a>
                    </div>
                    <h2 class="section-title2"><i class="fa fa-university"></i>&nbsp; Education</h2>
                    <!-- Education Item -->
                    <?php foreach ($query2->result() as $row) { ?>
                    <div class="resume-item">
                        <h3 class="section-item-title-1"><?php echo $row->pue_course; ?></h3>
                        <h4 class="graduation-time"><?php echo $row->pue_university; ?></h4>
                        <h4 class="graduation-time"><?php echo $row->pue_college; ?> -
                            <span class="graduation-date"><?php echo $row->pue_completion; ?></span>
                        </h4>
                        <div class="graduation-description">
                            <p><?php echo $row->pue_detail; ?></p>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- /Education Item -->
                </div>
            </div>
            <!-- /PAGE: Education  -->

            <!-- PAGE: Work -->
            <div class="section-vcardbody section-page" id="page-work">
                <div class="section-education">
                    <h2 class="section-title">Work Experience</h2>
                    <div class="resume-buttons header-page-buttons">
                        <a href="#" class="btn btn-default btn-default2">
                            <i class="fa fa-download"></i>&nbsp; Download my resume
                        </a>
                        <a href="#page-contact" class="btn btn-default btn-default2 link-page">
                            <i class="fa fa-download"></i>&nbsp; Get in Touch
                        </a>
                    </div>
                    <h2 class="section-title2"><i class="fa fa-flag"></i>&nbsp; Work Experience</h2>
                    <!-- WORK EXPERIENCE Item -->
                    <?php foreach ($query3->result() as $row) { ?>
                    <div class="resume-item">
                        <h3 class="section-item-title-1"><?php echo $row->puwe_company_name; ?></h3>
                        <h4 class="job"><?php echo $row->puwe_position; ?> -
                            <span class="job-date">
                                <?php echo $row->puwe_startdate; ?>-<?php echo $row->puwe_enddate; ?>
                            </span>
                        </h4>
                        <div class="graduation-description">
                            <p><?php echo $row->puwe_summary; ?></p>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- /WORK EXPERIENCE Item -->
                </div>
            </div>
            <!-- /PAGE: Work  -->

            <!-- PAGE: Achievement -->
            <div class="section-vcardbody section-page" id="page-achievement">
                <div class="section-education">
                    <h2 class="section-title">Achievement</h2>
                    <!-- Achievement Item -->
                    <?php foreach ($query4->result() as $row) { ?>
                    <div class="resume-item">
                        <h3 class="section-item-title-1"><?php echo $row->pua_title; ?></h3>
                        <h4 class="job"><?php echo $row->pua_place; ?> - <span
                                class="job-date"><?php echo $row->pua_date; ?></span></h4>
                        <div class="graduation-description">
                            <p><?php echo $row->pua_summary; ?></p>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- /Achievement Item -->
                </div>
            </div>
            <!-- /PAGE: Achievement  -->

            <!-- SECTION: SKILLS-->
            <div class="section-vcardbody section-page" id="page-skills">
                <div class="section-skills">
                    <h2 class="section-title">SKILLS</h2>
                    <h3 class="section-item-title-2"><i class="fa fa-users"></i> Skills</h3>
                    <!-- Skils List -->
                    <ul class="skills-list">
                        <!-- item-list -->
                        <?php foreach ($query5->result() as $row) { ?>
                        <li>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar"
                                    data-percent="<?php echo $row->pus_percentage."%"; ?>"
                                    style="width: <?php echo $row->pus_percentage."%"; ?>;">
                                    <span class="sr-only"><?php echo $row->pus_percentage."%"; ?> Complete</span>
                                </div>
                                <span class="progress-type"><?php echo $row->pus_name; ?></span>
                                <span class="progress-completed"><?php echo $row->pus_percentage."%"; ?></span>
                            </div>
                        </li>
                        <?php } ?>
                        <!-- /item list -->
                    </ul>
                    <!-- /Skils List -->

                    <h3 class="section-item-title-2"><i class="fa fa-code"></i> Language</h3>
                    <!-- Language List -->
                    <ul class="skills-list">
                        <!-- item-list -->
                        <?php foreach ($query6->result() as $row) { ?>
                        <li>
                            <div class="progress">
                                <div class="progress-bar progress-bar-3"
                                    data-percent="<?php echo $row->pul_level."%"; ?>" role="progressbar"
                                    style="width: <?php echo $row->pul_level."%"; ?>;">
                                    <span class="sr-only"><?php echo $row->pul_level."%"; ?> Complete</span>
                                </div>
                                <span class="progress-type"><?php echo $row->pul_name; ?></span>
                                <span class="progress-completed"><?php echo $row->pul_level."%"; ?></span>
                            </div>
                        </li>
                        <?php } ?>
                        <!-- /item list -->
                    </ul>
                    <!-- /Language List -->
                </div>
            </div>
            <!-- /SECTION: SKILLS  -->

            <!-- SECTION: PORTFOLIO-->
            <div class="section-vcardbody section-page" id="page-gallery">
                <div class="section-portfolio">
                    <h2 class="section-title">Gallery</h2>
                    <!-- Projects list -->
                    <div class="projects-list">
                        <!-- item -->
                        <?php foreach ($query7->result() as $row) { ?>
                        <div class="project-item">
                            <a href="#"
                                class="project-thumbnail nivobox" data-lightbox-gallery="portfolio"
                                style="background-image: url('data:image/jpg;base64,<?php echo base64_encode($row->pug_img); ?>');">
                                <div class="project-description-wrapper">
                                    <div class="project-description">
                                        <h2 class="project-title"><?php echo $row->pug_title; ?></h2>
                                        <span class="see-more"><?php echo $row->pug_desc; ?></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php } ?>
                        </div>
                    <!-- /projects list -->
                </div>
            </div>
            <!-- /SECTION: PORTFOLIO  -->

            <!-- SECTION: CONTACT-->
            <div class="section-vcardbody section-page" id="page-contact">
                <div class="section-contact">
                    <h2 class="section-title">Contact</h2>
                    <!-- Contact infos -->
                    <div class="contact-infos">
                        <h4 class="contact-subtitle-1">
                            <i class="fa fa-map"></i>&nbsp; Address
                        </h4>
                        <p><?php echo $query->pud_address . ", " . $query->pud_city . "-" . $query->pud_pincode; ?></p>
                        <h4 class="contact-subtitle-1">
                            <i class="fa fa-phone-square"></i>&nbsp; Phone
                        </h4>
                        <p><?php echo $query->pud_contact_no; ?></p>
                        <h4 class="contact-subtitle-1"><i class="fa fa-envelope"></i>&nbsp; Mail</h4>
                        <p><?php echo $query->pud_email; ?></p>
                    </div>
                    <!-- /Contact infos -->

                    <!-- Contact form -->
                    <h4 class="contact-subtitle-1"><i class="fa fa-paper-plane-o"></i>&nbsp; Send Me a Message</h4>
                    <form id="contactForm" method="post" class="form">
                        <div class="form-group">
                            <input class="form-control required" id="name" name="name" placeholder="Name" type="text"
                                required />
                        </div>
                        <div class="form-group">
                            <input class="form-control required" id="email" name="email" placeholder="Email"
                                type="email" required />
                        </div>
                        <div class="form-group">
                            <input class="form-control required" id="subject" type="text" name="subject"
                                placeholder="Subject" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control required" id="message" name="message" placeholder="Message"
                                rows="5" required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-default form-send" value="Send!">
                        </div>
                    </form>
                    <!-- /Contact Form -->
                </div>
            </div>
        </div>
    </section>
    <!-- /Main Content -->
    <!-- Contact Form - Ajax Messages -->
    <!-- Form Sucess -->
    <div class="form-result modal-wrap" id="contactSuccess">
        <div class="modal-bg"></div>
        <div class="modal-content">
            <h4 class="modal-title"><i class="fa fa-check-circle"></i> Success!</h4>
            <p>Your message has been sent to us.</p>
        </div>
    </div>
    <!-- /Form Sucess -->
    <!-- form-error -->
    <div class="form-result modal-wrap" id="contactError">
        <div class="modal-bg"></div>
        <div class="modal-content">
            <h4 class="modal-title"><i class="fa fa-times"></i> Error</h4>
            <p>There was an error sending your message.</p>
        </div>
    </div>
    <!-- /form-error -->

    <!-- Contact Form - Ajax Messages -->


    <!-- >> JS -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/themeassets/theme1/vendor/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/themeassets/theme1/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="/themeassets/theme1/vendor/validate.js"></script>
    <!-- Holder JS -->
    <script src="/themeassets/theme1/vendor/holder.js"></script>
    <!-- Modal box-->
    <script src="/themeassets/theme1/vendor/nivo-lightbox/nivo-lightbox.min.js"></script>
    <!-- /Modal Box -->
    <!-- Perfect ScrolBar -->
    <script src="/themeassets/theme1/vendor/perfect-scrollbar/js/min/perfect-scrollbar.jquery.min.js"></script>
    <!-- /Perfect ScrolBar -->
    <!-- Owl Caroulsel -->
    <script src="/themeassets/theme1/vendor/owl.carousel/owl-carousel/owl.carousel.js"></script>
    <!-- Google Maps -->
    <!-- Cross-browser -->
    <script src="/themeassets/theme1/vendor/cross-browser.js"></script>
    <!-- Main Scripts -->
    <script src="/themeassets/theme1/js/main.js"></script>
</body>

</html>