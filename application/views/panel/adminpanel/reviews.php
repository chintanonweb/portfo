<?php
defined('BASEPATH') or exit('No direct script access allowed');
$value['reviews'] = 'active';
$value['heading']   = 'Reviews';
$pr = $this->db->get('p_review',array('pr_status'=>1));
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
                <!-- Reviews -->
                <div class="container-fluid h-100 pt-3 pb-3 bg-white">
                    <!-- Data Table -->
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User Name</th>
                                <th>Company Name</th>
                                <th>Feedbak</th>
                                <th>Rating</th>
                                <th>Status</th>
                                <th>Visibility</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $r = 1;
                            foreach($pr->result() as $row){ 
                                $pr1 = $this->db->get_where('p_user_detail',array('pu_accno'=>$row->pu_accno))->row();
                                $pr2 = $this->db->get_where('p_company_detail',array('pcd_accno'=>$row->pcd_accno))->row();
                            ?>
                            <tr>
                                <td><?php echo $r; ?></td>
                                <td><?php echo $pr1->pud_name; ?></td>
                                <td><?php echo $pr2->pcd_company_name; ?></td>
                                <td><?php echo $row->pr_feedback; ?></td>
                                <td><?php echo $row->pr_rating; ?></td>
                                <td><?php echo $row->pr_status; ?></td>
                                <?php
                                    if ($row->pr_flag == 0) {
                                        $flag = '';
                                    } elseif ($row->pr_flag == 1) {
                                        $flag = 'checked';
                                    }
                                    ?>
                                <td>
                                    <label class="align-items-center justify-content-between">
                                        <div class="form-toggle">
                                            <input name="flag"
                                                onchange="itemflag(<?php echo $row->pr_id; ?>,'p_review','pr_id','pr_flag');"
                                                type="checkbox" <?php echo $flag; ?>>
                                            <div class="form-toggle__item">
                                                <i class="fa" data-check-icon="&#xf00c" data-uncheck-icon="&#xf00d"></i>
                                            </div>
                                        </div>
                                    </label>
                                </td>
                                <td>
                                    <a class="u-link mr-2" href="#"
                                        onclick="itemdelete(<?php echo $row->pr_id; ?>,'p_review','pr_id');">
                                        <i class="fas fa-trash"></i> </a>
                                </td>
                            </tr>
                            <?php
                            $r++; }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>User Name</th>
                                <th>Company Name</th>
                                <th>Feedbak</th>
                                <th>Rating</th>
                                <th>Status</th>
                                <th>Visibility</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                    <!-- End Data Table -->
                </div>
                <!-- End Reviews -->

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