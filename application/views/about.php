<?php
$data['about']='active';
$data['heading'] = 'About';
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Head -->
<?php $this->load->view('parts/headermeta',$data);
?>
<!-- End Head -->

<body>
    <!-- Header -->
    <?php 
    $this->load->view('parts/header',$data);
    ?>
    <!-- End Header -->

    <main role="main">
        <!-- Aboutus -->
        <section class="u-content-space1">
            <div class="container">
                <div class="row">
                    <!-- Article Content -->
                    <div class="col-lg-6 align-self-center mb-5 mb-lg-0 pr-lg-5">
                        <header class="mb-5">
                            <h2 class="h1">About Us</h2>
                            <p class="h5">"Quality is never an accident,It is always the result of an intelligent effort."</p>

                        </header>

                        <p class="mb-4">We are here to provide you a free templates according to your profession in bundle of varieties.Satisfaction of users are main moto for us and we give responsive layout of all portfolio creation.<br><br>
                            <b>Follow us:</b>   <a class="text-black" style="margin-left:20px;" target="_blank" href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a>
                                <a class="text-black" style="margin-left:20px;" target="_blank" href="https://www.instagram.com/">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a class="text-black" style="margin-left:20px;" target="_blank" href="https://twitter.com/">
                                    <i class="fab fa-twitter"></i>
                                </a>
                        </p>
                        <!--<a class="mr-4" href="https://play.google.com">
                            <i class="fab fa-google-play mr-1"></i> Google Play
                        </a>
                        <a href="https://www.apple.com">
                            <i class="fab fa-app-store-ios mr-1"></i> App Store
                        </a>-->
                    </div>
                    <!-- End Article Content -->

                    <!-- Article Image -->
                    <div class="col-lg-6 align-self-center">
                        <img class="img-fluid rounded" src="/assets/img/slider1.png" alt="Iamge Description">
                    </div>
                    <!-- End Article Image -->
                </div>
            </div>
        </section>
        <!-- End Aboutus -->

    </main>

    <!-- Footer -->
    <?php
    $this->load->view('parts/footer');
    ?>
    <!-- End Footer -->

    <?php
    $this->load->view('parts/footermeta');
    ?>
</body>
<!-- End Body -->
</html>