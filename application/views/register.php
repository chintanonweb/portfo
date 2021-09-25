<?php
$data['heading'] = 'Register';
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
        <section class="u-content-space">
            <div class="container">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <h2 class="font-weight-bold text-center">Register</h2>
                        <?php 
                            if($this->session->flashdata('text')) 
                            {
                                 echo '<div class="alert alert-'.$this->session->flashdata('alert').'">';
                                 echo $this->session->flashdata('text');
                                echo '</div>';
                            }       
                        ?>
                        <form action="/auth/rprocess" method="post">
                            <div class="form-group">
                                <label for="role">Register as</label>
                                <select class="form-control" id="role" name="role">
                                    <option value="user">User</option>
                                    <option value="merchant">Merchant</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email"
                                    name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="pwd">Password:</label>
                                <input type="password" class="form-control" id="pwd" placeholder="Enter password"
                                    name="password" required>
                                <br><a href="/auth/login">Existing User? Log in</a>
                            </div>
                            <button type="submit" class="btn btn-primary">Register</button>
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