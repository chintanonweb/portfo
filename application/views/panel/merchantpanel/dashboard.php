<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['heading']='Dashboard';
$data['dashboard']='active';
$query1=$this->db->get_where('p_subscription',array('pu_accno'=>$this->session->userdata('pu_accno')));
$pr = $this->db->get_where('p_review',array('pr_status'=>1));
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<!-- Head -->

<head>
    <?php $this->load->view('/panel/parts/headermeta',$data); ?>
</head>
<!-- End Head -->

<body>
    <!-- Header (Topbar) -->
    <?php $this->load->view('/panel/parts/header'); ?>
    <!-- End Header (Topbar) -->
    <main class="u-main" role="main">
        <!-- Sidebar -->
        <?php $this->load->view('/panel/merchantpanel/sidebar',$data); ?>
        <!-- End Sidebar -->
        <div class="u-content">
            <div class="u-body">
                <div class="container-fluid bg-white h-100 pt-3 pb-3">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body media align-items-center px-xl-3">
                                            <div class="media-body">
                                                <h5 class="h6 text-muted text-uppercase mb-2">
                                                    Active Offers
                                                </h5>
                                                <span class="h2 mb-0">400</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body media align-items-center px-xl-3">
                                            <div class="media-body">
                                                <h5 class="h6 text-muted text-uppercase mb-2">
                                                    Visitors
                                                </h5>
                                                <span class="h2 mb-0">400</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body media align-items-center px-xl-3">
                                            <div class="media-body">
                                                <h5 class="h6 text-muted text-uppercase mb-2">
                                                    Followers
                                                </h5>
                                                <span class="h2 mb-0">400</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body media align-items-center px-xl-3">
                                            <div class="media-body">
                                                <h5 class="h6 text-muted text-uppercase mb-2">
                                                    Following
                                                </h5>
                                                <span class="h2 mb-0">400</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="card">
                                <div class="card-body">
                                    <!-- Data Table -->
                                    <table id="example" class="display" style="width:100%">
                                        <thead>

                                            <tr>
                                                <th>#</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Days Remaining</th>
                                                <th>Subscription Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        $i=1;
                                        foreach($query1->result() as $row) 
                                        {
                                            $q2=$this->db->get_where('p_package',array('pp_id'=>$row->pp_id))->row();
                                    ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $row->ps_package_startdate; ?></td>
                                                <td><?php echo $row->ps_package_enddate; ?></td>
                                                <td></td>
                                                <td><?php echo $q2->pp_flag; ?></td>
                                            </tr>
                                            <?php $i++; } ?>
                                        </tbody>

                                    </table>
                                    <!-- End Data Table -->
                                </div>
                            </div>


                        </div>
                        <div class="col-md-3">

                            <div class="card">
                                <div class="card-body">

                                    <!-- Button get a link -->
                                    <a role="button" href="/merchant/reviews/get_a_link/"
                                        class="btn btn-soft-primary btn-block text-center"
                                        style="margin:0px 0px 20px 0px;">
                                        Get Review Link
                                    </a>
                                    <!-- End button get a link -->
                                    <!-- Button Upgrade Package -->
                                    <a role="button" href="/merchant/subscription/purchase/"
                                        class="btn btn-soft-primary btn-block text-center"
                                        style="margin:0px 0px 20px 0px;">
                                        Upgrade package
                                    </a>
                                    <!-- End Button Upgrade Package -->
                                    <!-- Button Search Merchant -->
                                    <a role="button" href="/merchant/search_by/merchant/"
                                        class="btn btn-soft-primary btn-block text-center"
                                        style="margin:0px 0px 20px 0px;">
                                        Search Merchant
                                    </a>
                                    <!-- End Button Search merchant -->
                                    <!--  Button Search User -->
                                    <a role="button" href="/merchant/search_by/user/"
                                        class="btn btn-soft-primary btn-block text-center"
                                        style="margin:0px 0px 20px 0px;">
                                        Search User
                                    </a>
                                    <!-- End Button Search User -->
                                </div>
                            </div>


                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h2 class="h3 card-header-title">Reviews</h2>
                                </div>
                                <div class="card-body">
                                    <?php $p =1;
                                    foreach($pr->result() as $row){ 
                                        $pu = $this->db->get_where('p_user_detail',array('pu_accno'=>$row->pu_accno))->row();
                            ?>
                                    <!-- Comment -->
                                    <a class="list-group-item list-group-item-action" href="#">
                                        <div class="media">
                                            <img class="u-avatar rounded-circle mr-3"
                                                src="data:image/png;base64,<?php echo base64_encode($pu->pud_image)?>"
                                                alt="Image description">

                                            <div class="media-body">
                                                <div class="d-md-flex align-items-center">
                                                    <h4 class="mb-1">
                                                        <?php echo $pu->pud_name; ?><span
                                                            class="badge badge-soft-secondary mx-1"></span>
                                                    </h4>
                                                    <small
                                                        class="text-muted ml-md-auto"><?php echo $row->pr_created_stamp; ?></small>
                                                </div>

                                                <p class="mb-0"><?php echo $row->pr_feedback; ?></p>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- End Comment -->
                                    <?php $p++; } ?>
                                </div>
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

    <!-- Footer meta -->
    <?php $this->load->view('/panel/parts/footermeta'); ?>
    <!-- Footer meta -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
    </script>
</body>

</html>