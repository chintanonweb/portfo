<?php
$data['home'] = 'active';
$data['heading'] = 'Home';
defined('BASEPATH') or exit('No direct script access allowed');
$query = $this->db->get_where('p_company_detail',array('pcd_flag'=>1));
$sd = $this->db->get('p_slider');
$ts = $this->db->get('pu_testimonial');
$pa = $this->db->get('p_package');
?>

<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <!-- Head -->
    <?php $this->load->view('parts/headermeta', $data); ?>
    <style>
    .cnt {
        margin-top: -215px;
        position: absolute;
    }
    </style>
    <!-- End Head -->
</head>

<body>
    <!-- Header -->
    <?php $this->load->view('parts/header', $data); ?>
    <!-- End Header -->

    <main role="main">
        <div class="container-fluid p-0">
            <div id="carouselExampleIndicators" class="carousel slide bg-light u-box-shadow-lg" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php
                    $i = 0;
                    foreach ($sd->result() as $row) {
                    ?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>"
                        class="rounded <?php if ($i == 0) {
                                                                                                                            echo 'active';
                                                                                                                        } ?>"></li>
                    <?php $i++;
                    } ?>
                </ol>
                <div class="carousel-inner">
                    <?php
                    $i = 0;
                    foreach ($sd->result() as $row) {
                    ?>
                    <div class="carousel-item <?php if ($i == 0) {
                                                        echo 'active';
                                                    } ?>">
                        <img class="d-block w-100 rounded"
                            src="data:image/png;base64,<?php echo base64_encode($row->psd_image); ?>"
                            alt="<?php echo $row->psd_title; ?>">
                    </div>
                    <?php $i++;
                    } ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="text-dark" aria-hidden="true">
                        <i class="fas fa-angle-left carousel-control-size"></i>
                    </span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="text-dark" aria-hidden="true">
                        <i class="fas fa-angle-right carousel-control-size"></i>
                    </span>
                    <span class="sr-only">Next</span>
                </a>
                <!-- search bar with icon -->
            </div>
            <!-- End Carousel -->
        </div>
        <!-- End Search bar with icon -->
        <div class="container-fluid cnt w-100">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="input-group">
                        <input class="form-control py-2" type="search" placeholder="search here">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
        <!-- Clients Section -->
        <div class="bg-light u-content-space">
            <div class="text-center">
                <h1 class="">
                    Most Visited Company
                </h1>
                <p class="">Discover top-rated company</p>
            </div>
            <div class="owl-carousel owl-theme">
                <?php foreach ($query->result() as $row) { ?>
                <?php $company = $this->db->get_where('p_user', array('pu_accno' => $row->pu_accno))->row(); ?>
                <div class="card" style="min-height:455px">
                    <?php
                        if ($row->pcd_logo == '') {
                        ?>
                    <img class="card-img-top" src="/assets/img/company.png" alt="<?php echo $row->pcd_company_name; ?>">
                    <?php
                        } else {
                        ?>
                    <img class="card-img-top " src="data:image/png;base64,<?php echo base64_encode($row->pcd_logo) ?>"
                        alt="<?php echo $row->pcd_company_name; ?>">
                    <?php
                        }
                        ?>
                    <div class="card-body mt-2">
                        <a href="<?php echo base_url(); ?><?php echo urlencode($company->pu_link); ?>">
                            <h5 class="card-title font-weight-bold"><?php echo $row->pcd_company_name; ?></h5>
                        </a>
                        <div class="mb-2">
                            <span class="badge badge-pill badge-danger"><?php echo $row->pcd_service; ?></span>
                        </div>
                        <ul class="fa-ul">
                            <li>
                                <span class="fa-li"><i class="fas fa-map-marker-alt"></i></span>
                                <?php echo $row->pcd_address . " " . $row->pcd_city . " " . $row->pcd_pincode; ?>
                            </li>
                            <li>
                                <span class="fa-li"><i class="fas fa-phone"></i></span>
                                <?php echo $row->pcd_contact_no; ?>
                            </li>
                            <li>
                                <a class="txt-srs-s" target="_blank" href="<?php echo $row->pcd_website; ?>">
                                    <span class="fa-li"><i class="fas fa-globe"></i></span>
                                    <?php echo $row->pcd_website; ?>
                                </a>
                            </li>
                            <li>
                                <a class="txt-srs-s" href="mailto:<?php echo $row->pcd_email; ?>">
                                    <span class="fa-li"><i class="fas fa-envelope"></i></span>
                                    <?php echo $row->pcd_email; ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer bg-transparent">
                        <a href="<?php echo base_url(); ?><?php echo urlencode($company->pu_link); ?>"
                            class="btn btn-outline-primary btn-block">View More</a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <!-- End Clients Section -->

        <!-- Why We? -->
        <!-- Features -->
        <section class="u-content-space">
            <div class="container">
                <header class="text-center pt-4 pb-4">
                    <h2 class="h1">Features</h2>
                    <h5 class="h5">we’re excited to tell you about Portfo, a new tool that can help you instantly build
                        a <strong>Creative</strong> portfolio according to your profile creative</h5>
                </header>
                <!-- Row -->
                <div class="row text-center">
                    <div class="col-lg-4 mb-lg-0">
                        <div class="display-4 text-primary mb-2">
                            <i class="fas fa-users"></i>
                        </div>
                        <h4 class="h5">Free Portfolio Themes</h4>
                        <p>We provide your profession related templates.</p>
                    </div>

                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <div class="display-4 text-primary mb-2">
                            <i class="fas fa-boxes"></i>
                        </div>
                        <h4 class="h5">Subscribing Packages</h4>
                        <p> Packages that gives advancement according to your need.</p>
                    </div>

                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <div class="display-4 text-primary mb-2">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <h4 class="h5">Responsive layout</h4>
                        <p>Find what you need in one template and combine features at will.</p>
                    </div>
                </div>
                <!-- End Row -->
            </div>
        </section>
        <!-- End Why We? -->
        <!-- Our Product -->
        <section class="u-content-space">
            <div class="container">
                <div class="row">
                    <!-- Article Content -->
                    <div class="col-lg-9 align-self-center mb-5 mb-lg-0 pr-lg-5">
                        <header class="mb-5">
                            <h2 class="h1">Our Services</h2>
                            <p class="h5">Convert more visitors, and win more business strive.<br> To give real service
                                we must add something which cannot be bought or measured with money, and that is
                                sincerity and integrity."</p>
                        </header>

                        <p class="mb-5">Easy and fast adjustments of elements are possible with Front portfolio
                            template. <br>Find our more about our all-in-one programmatic template.<br> We help to take
                            of all the paperwork.</p>
                    </div>
                    <!-- End Article Content -->
                    <!-- Article Image -->
                    <div class="col-lg-3 align-self-center">
                        <img class="img-fluid rounded" src="/assets/img/service.jpeg" alt="Iamge Description">
                    </div>
                    <!-- End Article Image -->
                </div>
            </div>
        </section>
        <!-- End Our Product -->
        <br>
        <!-- Our Pricing -->
        <section class="u-content-space bg-light">
            <div class="container">
                <!-- Our Pricing: Header -->
                <div class="text-center">
                    <h1 class="">
                        Our Packages
                    </h1>
                    <p class="">No additional costs. Pay only fixed annual fee and the rest we will handle for you!</p>
                </div>
                <!-- End Our Pricing: Header -->

                <div class="row align-items-lg-center">
                    <?php
                    foreach ($pa->result() as $row) {
                    ?>
                    <div class="col-lg-4 col-md-5">
                        <!-- Pricing -->
                        <article class="u-pricing u-box-shadow-sm text-center rounded">
                            <!-- Header -->
                            <header class="u-pricing__header bg-primary text-white rounded-top">

                                <strong class="u-pricing__header-price display-4 font-weight-bold mb-2">

                                    <span class="h6 align-top"> ₹ </span><?php echo $row->pp_price; ?><span class="h6">/
                                        <?php echo $row->pp_month; ?></span>
                                </strong>

                                <h3 class="u-pricing__header-title small text-uppercase u-letter-spacing-sm mb-4">
                                    <?php echo $row->pp_name; ?>
                                </h3>

                                <svg class="u-pricing__header-decoration" version="1.1" preserveAspectRatio="none"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="100%" height="70px" viewBox="0 0 300 70">
                                    <path
                                        d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z"
                                        opacity="0.6" fill="#fff"></path>
                                    <path
                                        d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z"
                                        opacity="0.6" fill="#fff"></path>
                                    <path
                                        d="M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716H42.401L43.415,98.342z"
                                        opacity="0.7" fill="#fff"></path>
                                    <path
                                        d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z"
                                        fill="#fff"></path>
                                </svg>
                            </header>
                            <!-- End Header -->

                            <!-- Content -->
                            <div class="u-pricing__content">
                                <ul class="list-unstyled mb-5">
                                    <?php echo $row->pp_desc; ?>
                                    <a href="auth/registration">Get Free 7 Days Trial</a>
                                </ul>

                                <a class="btn btn-primary py-3 px-4" href="auth/registration">Subscribe Now</a>
                            </div>
                            <!-- End Content -->
                        </article>
                        <!-- End Pricing -->
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        <!-- End Our Pricing -->

        <!-- Testimonials -->
        <section class="u-content-space">
            <div class="container-fluid">
                <!-- Testimonials: Header -->
                <header class="text-center w-md-50 mx-auto mb-8">
                    <h2 class="h1">Testimonials</h2>
                    <p class="h5">To prove the value of what we have to offer, why not let our happy customers do the
                        talking?!!</p>
                </header>
                <!-- End Testimonials: Header -->
                <div class="owl-carousel owl-theme">
                    <?php foreach ($ts->result() as $row) {
                        $pt = $this->db->get_where('p_user_detail', array('pu_accno' => $row->pu_accno))->row();
                    ?>
                    <!-- Testimonial -->
                    <blockquote class="u-blockquote-v2 rounded mb-5">
                        <strong class="d-block"><?php echo $pt->pud_name; ?></strong>
                        <p><?php echo $pt->pud_profession; ?></p>
                        <?php echo $row->put_desc; ?>
                    </blockquote>
                    <!-- End Testimonial -->
                    <?php } ?>
                </div>
            </div>
        </section>

        <!-- End Testimonials -->
    </main>




    <!-- Footer -->
    <?php
    $this->load->view('parts/footer');
    ?>
    <!-- End Footer -->

    <!-- Call Us Modal Window -->
    <div class="modal fade" id="callUsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="#">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">We'll call you</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-4">
                            <input type="text" class="form-control" id="modalName" placeholder="Your Name">
                        </div>
                        <div class="form-group mb-4">
                            <input type="tel" class="form-control" id="modalPhone" placeholder="Your Phone Number">
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Call Us Modal Window -->
    <?php
    $this->load->view('parts/footermeta');
    ?>
    <script>
    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 20,
            nav: true,
            center: true,
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
<!-- End Body -->

</html>