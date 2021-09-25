<?php
defined('BASEPATH') or exit('No direct script access allowed');
$value['merchants'] = 'active';
$value['service'] = 'opened';
$value['heading'] = 'Merchants';

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
                <!-- Merchants -->
                <div class="container-fluid bg-white h-100 pt-3 pb-3">
                    <!-- Data Table -->
                    <table id="example" class="display" style="width:100%">
                        <thead>

                            <tr>
                                <th>#</th>
                                <th>Company Name</th>
                                <th>Service Name</th>
                                <th>Email Id</th>
                                <th>Contact Number</th>
                                <th>City Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $m = $this->db->get_where('p_user', array('pu_role' =>"merchant"));
                                    foreach ($m->result() as $com) {
                                        $m1 = $this->db->get_where('p_company_detail', array('pu_accno' => $com->pu_accno,'pcd_flag'=>1));
                                        foreach ($m1->result() as $row) {
                                            $i = 1;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row->pcd_company_name; ?></td>
                                <td><?php echo $row->pcd_service; ?></td>
                                <td><?php echo $row->pcd_email; ?></td>
                                <td><?php echo $row->pcd_contact_no; ?></td>
                                <td><?php echo $row->pcd_city; ?></td>
                                <td>
                                    <a href="<?php echo base_url(); ?><?php echo urlencode($com->pu_link); ?>"
                                        class="btn p-1 btn-outline-primary" target="_blank">View</a>
                                </td>
                            </tr>
                            <?php
                                                $i++;
                                            }
                                        }
                                        ?>
                        </tbody>
                        <tfoot>
                            <th>#</th>
                            <th>Company Name</th>
                            <th>Service Name</th>
                            <th>Email Id</th>
                            <th>Contact Number</th>
                            <th>City Name</th>
                            <th>Action</th>
                        </tfoot>
                    </table>
                    <!-- End Data Table -->
                </div>
                <!-- End Merchants -->
            </div>

            <!-- Footer -->
            <?php $this->load->view('/panel/parts/footer'); ?>
            <!-- End Footer -->
        </div>
    </main>

    <!-- Global Vendor -->
    <?php $this->load->view('/panel/parts/footermeta'); ?>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
    </script>
</body>

</html>