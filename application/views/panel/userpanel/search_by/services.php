<?php
defined('BASEPATH') or exit('No direct script access allowed');
$value['services'] = 'active';
$value['service'] = 'opened';
$value['heading'] = 'Services';
$sv = $this->db->get_where('p_company_detail',array('pcd_flag'=>1));
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
        <?php $this->load->view('/panel/userpanel/sidebar',$value); ?>
        <!-- End Sidebar -->

        <div class="u-content">
            <div class="u-body">
                <!-- Services -->
                <div class="container-fluid bg-white h-100 pt-3 pb-3">
                    <!-- Data Table -->
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Service Name</th>
                                <th>Company Name</th>
                                <th>Email</th>
                                <th>Contact Number</th>
                                <th>City Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $s = 1;
                                foreach($sv->result() as $row)
                                {
                            ?>
                            <?php $company = $this->db->get_where('p_user', array('pu_accno' => $row->pu_accno))->row(); ?>
                            <tr>
                                <td><?php echo $s; ?></td>
                                <td><?php echo $row->pcd_service; ?></td>
                                <td><?php echo $row->pcd_company_name; ?></td>
                                <td><?php echo $row->pcd_email; ?></td>
                                <td><?php echo $row->pcd_contact_no; ?></td>
                                <td><?php echo $row->pcd_city; ?></td>
                                <td><a href="<?php echo base_url(); ?><?php echo urlencode($company->pu_link); ?>"
                                        class="btn p-1 btn-outline-primary" target="_blank">View</a></td>
                            </tr>
                            <?php
                                        $s++;
                                        }
                                        ?>
                        </tbody>
                        <tfoot>
                            <th>#</th>
                            <th>Service Name</th>
                            <th>Company Name</th>
                            <th>Email</th>
                            <th>Contact Number</th>
                            <th>City Name</th>
                            <th>Action</th>
                        </tfoot>
                    </table>
                    <!-- Data Table -->
                </div>
                <!-- End Services -->

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