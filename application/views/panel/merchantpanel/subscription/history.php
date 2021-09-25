<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['heading']='History';
$data['history']='active';
$data['subscription']='u-sidebar-nav--opened';
$query1=$this->db->get_where('p_subscription',array('pu_accno'=>$this->session->userdata('pu_accno')));
?>
<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <!-- Head -->
    <?php $this->load->view('/panel/parts/headermeta',$data); ?>
    <!-- End Head -->
</head>

<body>
    <!-- Header (Topbar) -->
    <?php $this->load->view('/panel/parts/header'); ?>
    <!-- End Header (Topbar) -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css" />

    <main class="u-main" role="main">
        <!-- Sidebar -->
        <?php $this->load->view('/panel/merchantpanel/sidebar',$data);?>
        <!-- End Sidebar -->
        <div class="u-content">
            <div class="u-body">
                <div class="container-fluid bg-white h-100 pt-3 pb-3">
                    <!-- Data Table-->
                    <table id="myTable" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Package Name</th>
                                <th>Package Price</th>
                                <th>Package Status</th>
                                <th>Package Start Date</th>
                                <th>Package Enddate</th>
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
                                <td><?php echo $q2->pp_name; ?></td>
                                <td><?php echo $q2->pp_price; ?></td>
                                <td><?php echo $q2->pp_flag; ?></td>
                                <td><?php echo $row->ps_package_startdate; ?></td>
                                <td><?php echo $row->ps_package_enddate; ?></td>
                            </tr>
                            <?php
                                $i++;
                                }
                            ?>

                        </tbody>
                    </table>
                    <!-- End Data Table-->
                </div>

            </div>
            <!-- Footer -->
            <?php $this->load->view('/panel/parts/footer'); ?>
            <!-- End Footer -->

        </div>
    </main>

    <!-- Footer Meta -->
    <?php $this->load->view('/panel/parts/footermeta'); ?>
    <!-- Footer Meta -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
    </script>
</body>

</html>