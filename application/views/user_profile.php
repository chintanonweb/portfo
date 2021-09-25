<?php
defined('BASEPATH') or exit('No direct script access allowed');


$data['heading'] = 'User_profile';

?>
<html>
<!-- Head -->
<?php
$this->load->view('parts/headermeta',$data);
?>
<!-- End Head -->
<!-- Body -->

<body>
    <!-- Header -->
    <?php $this->load->view('parts/header',$data);
    ?>
    <!-- End Header -->
    <main role="main">
        <div class="u-content-space1">
            <div class="container">

                <div class="card">
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <?php $up = $this->db->get_where('p_user_detail',array('pu_accno'=> $useraccno))->row(); 
                                $link = $this->db->get_where('p_user',array('pu_accno'=>$useraccno))->row();
                                ?>
                                <div class="col-md-3">
                                    <?php if($up->pud_image == ''){
                                            ?>
                                    <img src="assets/img/img2.png" alt="Avatar" class="img-fluid rounded-circle mb-3"
                                        width="400">
                                    <?php }else{?>
                                    <img src="data:image/png;base64,<?php echo base64_encode($up->pud_image)?>"
                                        alt="Avatar" class="img-fluid rounded-circle mb-3" width="400">
                                    <?php }?>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="font-weight-bold"><?php echo $up->pud_name; ?></h3>
                                    <p><?php echo $up->pud_profession; ?></p>
                                    <p><?php echo $up->pud_detail; ?></p>
                                    <i class="fas fa-envelope"></i> Email:
                                    <span><?php echo $up->pud_email; ?></span><br>
                                    <i class="fas fa-phone"></i> Phone:
                                    <span><?php echo $up->pud_contact_no; ?></span><br>
                                    <i class="fa fa-globe"></i> Website: <a href="<?php echo $up->pud_website; ?>"
                                        target="_blank">
                                        <?php echo $up->pud_website; ?></a>
                                </div>
                                <div class="col-md-3">
                                    <?php $u = $this->db->get('p_user',array('pu_accno'=>$up->pu_accno))->row(); ?>
                                    <a class="btn btn-outline-primary btn-block" target="_blank"
                                        href="<?php echo base_url(); ?><?php echo urlencode($link->pu_link); ?>">View
                                        Portfolio</a>
                                </div>
                            </div>
                        </form>
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
</body>
<!-- End Body -->

</html>