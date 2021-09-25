<?php
defined('BASEPATH') or exit('No direct script access allowed');
$value['view_reviews'] = 'active';
$value['reviews'] = 'opened';
$value['heading'] = 'View Reviews';
$re = $this->db->get_where('p_review', array('pu_accno' => $this->session->userdata('pu_accno'),'pr_status'=>1));
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<!-- Head -->

<head>
    <?php $this->load->view('/panel/parts/headermeta', $value); ?>
</head>
<!-- End Head -->

<body>
    <!-- Header (Topbar) -->
    <?php $this->load->view('/panel/parts/header'); ?>
    <!-- End Header (Topbar) -->
    <main class="u-main" role="main">
        <!-- Sidebar -->
        <?php $this->load->view('/panel/userpanel/sidebar', $value); ?>
        <!-- End Sidebar -->
        <div class="u-content">
            <div class="u-body">
                <div class="container-fluid bg-white h-100 pt-3 pb-3">
                    <!-- Data Table -->
                    <table id="example" class="display" style="width:100%">
                        <thead>

                            <tr>
                                <th>#</th>
                                <th>Feedback</th>
                                <th>Rating</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $r = 1;
                            foreach ($re->result() as $row) { ?>
                            <tr>
                                <td><?php echo $r; ?></td>
                                <td><?php echo $row->pr_feedback; ?></td>
                                <td><?php echo $row->pr_rating; ?></td>
                                <td><?php echo $row->pr_status; ?></td>
                            </tr>
                            <?php $r++; } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Feedback</th>
                                <th>Rating</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>
                    </table>
                    <!-- End Data Table -->
                </div>
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