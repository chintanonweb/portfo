<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['heading'] = 'transaction';
$data['purchase'] = 'active';
$data['subscription'] = 'u-sidebar-nav--opened';
$var = $this->db->get_where('p_package',array('pp_id'=>$id))->row();

?>
<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <!-- Head -->
    <?php $this->load->view('/panel/parts/headermeta', $data); ?>
    <!-- End Head -->
</head>

<body>

    <!-- Header (Topbar) -->
    <?php $this->load->view('/panel/parts/header'); ?>
    <!-- End Header (Topbar) -->
    <main class="u-main" role="main">
        <!-- Sidebar -->
        <?php $this->load->view('/panel/merchantpanel/sidebar', $data); ?>
        <!-- End Sidebar -->
        <div class="u-content">
            <div class="u-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- Our Pricing -->
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-4"></div>

                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <!-- Pricing -->
                                                    <article class="u-pricing u-box-shadow-sm text-center rounded">
                                                        <!-- Header -->
                                                        <header
                                                            class="u-pricing__header bg-primary text-white rounded-top">
                                                            <strong
                                                                class="u-pricing__header-price display-4 font-weight-bold mb-2">


                                                                <span class="h1 text-center"> ₹
                                                                    <?php echo $var->pp_price; ?>
                                                                </span><span class="h4 text-center">/ month</span>
                                                            </strong>
                                                            <h3
                                                                class="u-pricing__header-title small text-uppercase u-letter-spacing-sm mb-4">
                                                                <?php echo $var->pp_name; ?>
                                                            </h3>
                                                            <svg class="u-pricing__header-decoration" version="1.1"
                                                                preserveAspectRatio="none"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="100%"
                                                                height="70px" viewBox="0 0 300 70">
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
                                                        <!-- End header -->

                                                        <!-- Content -->

                                                        <div class="u-pricing__content">
                                                            <div class="mb-2">
                                                                <?php echo $var->pp_desc; ?>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <a class="btn btn-primary"
                                                            href="/merchant/subscription/transaction/confirm/<?php echo $var->pp_id; ?>">Confirm</a>

                                                        <!-- End Content -->
                                                    </article>
                                                    <!-- End Pricing -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <!-- End Our Pricing -->
                            </div>
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
    <!-- End Footer Meta -->
</body>

</html>