<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['heading']='Merchant';
$data['merchant']='active';
$data['searchby']='u-sidebar-nav--opened';
$use= $this->db->get_where('p_company_detail',array('pcd_flag'=>1));
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
                    <table id="searchmerchant" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Company Name</th>
                                <th>Service</th>
                                <th>E-mail</th>
                                <th>Contact Number</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $s = 1;
                                foreach($use->result() as $row)
                                {
                            ?>
                            <?php $company = $this->db->get_where('p_user', array('pu_accno' => $row->pu_accno))->row(); ?>
                            <tr>
                                <td><?php echo $s; ?></td>
                                <td><?php echo $row->pcd_company_name; ?></td>
                                <td><?php echo $row->pcd_service; ?></td>
                                <td><?php echo $row->pcd_email; ?></td>
                                <td><?php echo $row->pcd_contact_no; ?></td>
                                <td><?php echo $row->pcd_city; ?></td>
                                <td><?php echo $row->pcd_state; ?></td>
                                <td><a href="<?php echo base_url(); ?><?php echo urlencode($company->pu_link); ?>"
                                        class="btn p-1 btn-outline-primary" target="_blank">View</a></td>

                            </tr>
                            <?php
                                            $s++;
                                             }
                                        ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Company Name</th>
                                <th>Service</th>
                                <th>E-mail</th>
                                <th>Contact Number</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
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
    <!-- End Footer Meta -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#searchmerchant').DataTable();
    });
    </script>
</body>

</html>