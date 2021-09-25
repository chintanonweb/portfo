<?php
$data['contact'] = 'active';
$data['heading'] = 'Contact Us';
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Head -->
<?php
$this->load->view('parts/headermeta',$data);
?>
<!-- End Head -->

<body>
    <!-- Header -->
    <?php $this->load->view('parts/header',$data);
    ?>
    <!-- End Header -->
    <main role="main">
        <!-- Icon Block -->
        <section class="container-fluid">
        <header class="text-center w-md-50 mx-auto mb-8">
                    <h3 class="h1">Contact Information</h3>
                    </header>
            <div class="row text-center u-icon-block">
                <!-- Icon Block Column -->
                <div class="col-lg-4 u-icon-block__col">
                    <span class="u-icon u-icon-primary u-icon--size--xl rounded-circle mb-4">
                        <span class="fas fa-map u-icon__inner text-white"></span>
                    </span>
                    <h3 class="h5">Address</h3>
                    <p class="mb-0">Portfo INDIA<br>B-222, First Floor,<br>Okhala Industrial Area, Phase-1<br>New Delhi IN - 110020</p>
                </div>
                <!-- End Icon Block Column -->

                <!-- Icon Block Column -->
                <div class="col-lg-4 u-icon-block__col u-icon-block__col--left-brd">
                    <span class="u-icon u-icon-primary u-icon--size--xl rounded-circle mb-4">
                        <span class="fas fa-mobile u-icon__inner text-white"></span>
                    </span>
                    <h3 class="h5">Phone Number</h3>
                    <p class="mb-0">+917878456723</p>
                </div>
                <!-- End Icon Block Column -->

                <!-- Icon Block Column -->
                <div class="col-lg-4 u-icon-block__col u-icon-block__col--left-brd">
                    <span class="u-icon u-icon-primary u-icon--size--xl rounded-circle mb-4">
                        <span class="fas fa-envelope-open u-icon__inner text-white"></span>
                    </span>
                    <h3 class="h5">Email</h3>
                    <p class="mb-0">portfo@gmail.com</p>
                </div>
                <!-- End Icon Block Column -->
            </div>
        </section>
        <!-- End Icon Block -->

        <!-- Contact Form -->
        <section class="u-content-space">
            <div class="container">
                <header class="text-center w-md-50 mx-auto mb-8">
                    <h3 class="h1">Fill out this form and tell us a little about you.</h3>
                    </header>

                <form class="text-center w-md-75 mx-auto" action="/contact/contactinfo" method="post">
                    <div class="row">
                        <div class="col-lg-6 form-group mb-4">
                            <input class="form-control form-control-lg" placeholder="Full Name" type="text" name="name" required>
                        </div>

                        <div class="col-lg-6 form-group mb-4">
                            <input class="form-control form-control-lg" placeholder="Email Address" type="email" name="email" required>
                        </div>

                        <div class="col-lg-6 form-group mb-4">
                            <input class="form-control form-control-lg" placeholder="Subject" type="text" name="subject" required>
                        </div>

                        <div class="col-lg-6 form-group mb-4">
                            <input class="form-control form-control-lg" placeholder="Phone Nmber" type="tel" name="phone" pattern="[0-9]{10}" required>
                        </div>

                        <div class="col-lg-12 form-group mb-6">
                            <textarea class="form-control form-control-lg" rows="7" placeholder="Message" name="message" required></textarea>
                        </div>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-lg btn-primary py-3 px-4" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </section>
        <!-- End Contact Form -->
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