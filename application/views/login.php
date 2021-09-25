<?php
$data['heading'] = 'Login';
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
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <h2 class="font-weight-bold text-center">Login</h2>
                        <?php 
                             if($this->session->flashdata('text')) 
                                {
                                     echo '<div class="alert alert-'.$this->session->flashdata('alert').'">';
                                    echo $this->session->flashdata('text');
                                    echo '</div>';
                                }
                        ?> 
                        <form action="/auth/lprocess" method="post">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="pwd">Password:</label>
                                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
                                <br><a href="/auth/registration">New to Portfo? Create an account</a>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                    <div class="col-md-4"></div>
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