<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['heading']='User';
$data['user']='active';
$data['searchby']='u-sidebar-nav--opened';
$use= $this->db->get_where('p_user_detail',array('pud_flag'=>1));
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
                    <table id="searchuser" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User Name</th>
                                <th>Profession</th>
                                <th>Contact Number</th>
                                <th>E-mail</th>
                                <th>Date Of Birth</th>
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
                            <tr>
                                <td><?php echo $s; ?></td>
                                <td><?php echo $row->pud_name; ?></td>
                                <td><?php echo $row->pud_profession; ?></td>
                                <td><?php echo $row->pud_contact_no; ?></td>
                                <td><?php echo $row->pud_email; ?></td>
                                <td><?php echo $row->pud_dob; ?></td>
                                <td><?php echo $row->pud_city; ?></td>
                                <td><?php echo $row->pud_state; ?></td>
                                <td><a href="/user_profile/<?php echo urlencode($row->pu_accno); ?>/<?php echo urlencode($row->pud_name); ?>"
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
                                <th>User Name</th>
                                <th>Profession</th>
                                <th>Contact Number</th>
                                <th>E-mail</th>
                                <th>Date Of Birth</th>
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
    <!-- Footer Meta -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#searchuser').DataTable();
    });
    </script>
</body>

</html>