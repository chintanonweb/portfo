<?php
defined('BASEPATH') or exit('No direct script access allowed');
$value['manage_merchant'] = 'active';
$value['merchant'] = 'opened';
$value['heading']   = 'Manage Merchant';
$mm = $this->db->get_where('p_company_detail',array('pcd_flag'=>1));
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
                <!-- Manage Merchant -->
                <div class="container-fluid bg-white h-100 pt-3 pb-3">
                    <!-- Data Table -->
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Company Name</th>
                                <th>Service Name</th>
                                <th>Email</th>
                                <th>Contact Number</th>
                                <th>City Name</th>
                                <th>Visibility</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $m = 1;
                                foreach($mm->result() as $row)
                                { 
                            ?>
                                <?php $company = $this->db->get_where('p_user', array('pu_accno' => $row->pu_accno))->row(); ?>
                                <td><?php echo $m; ?></td>
                                <td><?php echo $row->pcd_company_name; ?></td>
                                <td><?php echo $row->pcd_service; ?></td>
                                <td><?php echo $row->pcd_email; ?></td>
                                <td><?php echo $row->pcd_contact_no; ?></td>
                                <td><?php echo $row->pcd_city; ?></td>
                                <?php
                                                    if($row->pcd_flag == 0){
                                                        $flag = '';
                                                    }elseif($row->pcd_flag == 1){
                                                        $flag = 'checked';
                                                    }
                                                ?>
                                <td>
                                    <label class="align-items-center justify-content-between">
                                        <div class="form-toggle">
                                            <input name="flag"
                                                onchange="itemflag(<?php echo $row->pcd_id; ?>,'p_company_detail','pcd_id','pcd_flag');"
                                                type="checkbox" <?php echo $flag; ?>>
                                            <div class="form-toggle__item">
                                                <i class="fa" data-check-icon="&#xf00c" data-uncheck-icon="&#xf00d"></i>
                                            </div>
                                        </div>
                                    </label>
                                </td>
                                <td>
                                    <a class="u-link mr-1" href="#"
                                        onclick="itemdelete(<?php echo $row->pcd_id; ?>,'p_company_detail','pcd_id');">
                                        <i class="fas fa-trash"></i> </a>
                                    <a href="<?php echo base_url(); ?><?php echo urlencode($company->pu_link); ?>"
                                        class="btn p-1 btn-outline-primary" target="_blank">View</a>
                                </td>
                            </tr>
                            <?php 
                            $m++;
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <th>#</th>
                            <th>Company Name</th>
                            <th>Service Name</th>
                            <th>Email</th>
                            <th>Contact Number</th>
                            <th>City Name</th>
                            <th>Visibility</th>
                            <th>Action</th>
                        </tfoot>
                    </table>
                    <!-- End Data Table -->
                </div>
                <!-- End Manage Merchant -->

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
    <script type="text/javascript">
    function itemflag(o1, o2, o3, o4) {
        $.ajax({
            type: "POST",
            url: '/admin/dashboard/flagchangedata',
            data: {
                "id": o1,
                "table": o2,
                "column": o3,
                "flagcolumn": o4
            }
        });
    }

    function itemdelete(ob1, ob2, ob3) {
        var hash = window.location.hash;
        var result = confirm("Want to delete?");

        if (result) {
            $.ajax({
                type: "POST",
                url: '/admin/dashboard/deletedata',
                data: {
                    "id": ob1,
                    "table": ob2,
                    "column": ob3
                },
                success: function(response) {
                    if (response > 0) {
                        window.location.href += hash.replace('#', '');
                        location.reload(true);
                    } else {
                        window.location.href += hash.replace('#', '');
                        location.reload(true);
                    }
                }
            });
        }
    }
    </script>
</body>

</html>