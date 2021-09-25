<?php
defined('BASEPATH') or exit('No direct script access allowed');
$value['user'] = 'active';
$value['heading']   = 'User';
$us = $this->db->get('p_user_detail');
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

                <!-- User -->
                <div class="container-fluid bg-white h-100 pt-3 pb-3">
                    <!-- Data Table -->
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User Name</th>
                                <th>User Email Id</th>
                                <th>User Mobile Number</th>
                                <th>Visibility</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $u = 1;
                                foreach($us->result() as $row)
                                { 
                            ?>
                            <tr>
                                <td><?php $u; ?></td>
                                <td><?php echo $row->pud_name; ?></td>
                                <td><?php echo $row->pud_email; ?></td>
                                <td><?php echo $row->pud_contact_no; ?></td>
                                <?php
                                                    if($row->pud_flag == 0){
                                                        $flag = '';
                                                    }elseif($row->pud_flag == 1){
                                                        $flag = 'checked';
                                                    }
                                                ?>
                                <td>
                                    <label class="align-items-center justify-content-between">
                                        <div class="form-toggle">
                                            <input name="flag"
                                                onchange="itemflag(<?php echo $row->pud_id; ?>,'p_user_detail','pud_id','pud_flag');"
                                                type="checkbox" <?php echo $flag; ?>>
                                            <div class="form-toggle__item">
                                                <i class="fa" data-check-icon="&#xf00c" data-uncheck-icon="&#xf00d"></i>
                                            </div>
                                        </div>
                                    </label>
                                </td>
                                <td>
                                    <a class="u-link mr-2" href="#"
                                        onclick="itemdelete(<?php echo $row->pud_id; ?>,'p_user_detail','pud_id');">
                                        <i class="fas fa-trash"></i> </a>
                                    <a href="/user_profile/<?php echo urlencode($row->pu_accno); ?>/<?php echo urlencode($row->pud_name); ?>"
                                        class="btn p-1 btn-outline-primary" target="_blank">View</a>
                                </td>
                            </tr>
                            <?php 
                            $u++;
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <th>#</th>
                            <th>User Name</th>
                            <th>User Email Id</th>
                            <th>User Mobile Number</th>
                            <th>Visibility</th>
                            <th>Action</th>
                        </tfoot>
                    </table>
                    <!-- End Data Table -->
                </div>
                <!-- End User -->

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