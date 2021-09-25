<?php
defined('BASEPATH') or exit('No direct script access allowed');
$value['transactions'] = 'active';
$value['heading']   = 'Transactions';
$tt = $this->db->get_where('p_transaction');
?>
<!DOCTYPE html>
<html lang="en" class="no-js">

<!-- Head -->

<head>
    <?php $this->load->view('/panel/parts/headermeta',$value); ?>
</head>
<!-- End Head -->

<body>

    <!-- Header (Topbar) -->
    <?php $this->load->view('/panel/parts/header'); ?>
    <!-- End Header (Topbar) -->
    <main class="u-main" role="main">
        <!-- Sidebar -->
        <?php $this->load->view('/panel/adminpanel/sidebar',$value); ?>
        <!-- End Sidebar -->

        <div class="u-content">
            <div class="u-body">
                <!-- Transactions -->
                <div class="container-fluid h-100 pt-3 pb-3 bg-white">
                    <!-- Data Table -->
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Package Name</th>
                                <th>Transaction Reference ID</th>
                                <th>Transaction Amount</th>
                                <th>Transaction Date And Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $t = 1;
                            foreach($tt->result() as $row){ 
                                $ps = $this->db->get_where('p_subscription',array('pt_id'=>$row->pt_id))->row();
                                $p = $ps->pp_id;
                                $pp = $this->db->get_where('p_package',array('pp_id'=>$p))->row();
                            ?>
                            <tr>
                                <td><?php echo $t; ?></td>
                                <td><?php echo $pp->pp_name; ?></td>
                                <td><?php echo $row->pt_refid; ?></td>
                                <td><?php echo $row->pt_amount; ?></td>
                                <td><?php echo $row->pt_timestamp; ?></td>
                            </tr>
                            <?php $t++; } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Package Name</th>
                                <th>Transaction Reference ID</th>
                                <th>Transaction Amount</th>
                                <th>Transaction Date And Time</th>
                            </tr>
                        </tfoot>
                    </table>
                    <!-- End Data Table -->
                </div>
                <!-- End Transactions -->

            </div>

            <!-- Footer -->
            <?php $this->load->view('/panel/parts/footer'); ?>
            <!-- End Footer -->
        </div>
    </main>


    <?php $this->load->view('/panel/parts/footermeta'); ?>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
    </script>
</body>

</html>