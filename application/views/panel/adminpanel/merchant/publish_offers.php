<?php
defined('BASEPATH') or exit('No direct script access allowed');
$value['publish_offers'] = 'active';
$value['merchant'] = 'opened';
$value['heading']   = 'Publish Offers';
$q = $this->db->get('pc_publish_offer');

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
        <?php $this->load->view('/panel/adminpanel/sidebar', $value); ?>
        <!-- End Sidebar -->

        <div class="u-content">
            <div class="u-body">
                <!-- Publish Offers -->
                <div class="container-fluid h-100 pt-3 pb-3 bg-white">
                    <!-- Data Table -->
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Company Name</th>
                                <th>Offers Name</th>
                                <th>Offers Description</th>
                                <th>Offers Image</th>
                                <th>Offers Start Date</th>
                                <th>Offers End Date</th>
                                <th>Visibility</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $p = 1;
                            foreach ($q->result() as $row) {
                                $q2 = $this->db->get_where('p_company_detail',array('pcd_accno'=>$row->pcd_accno,'pcd_flag'=>1))->row();
                            ?>
                            <?php $company = $this->db->get_where('p_user', array('pu_accno' => $q2->pu_accno))->row(); ?>
                            <tr>
                                <td><?php echo $p; ?></td>
                                <td><?php echo $q2->pcd_company_name; ?></td>
                                <td><?php echo $row->ppo_name; ?></td>
                                <td><?php echo $row->ppo_desc; ?></td>
                                <td><img class="img-fluid"
                                        src="data:image/png;base64,<?php echo base64_encode($row->ppo_image); ?>"
                                        alt="" width="100px"></td>
                                <td><?php echo $row->ppo_start_date; ?></td>
                                <td><?php echo $row->ppo_end_date; ?></td>
                                <?php
                                    if ($row->ppo_flag == 0) {
                                        $flag = '';
                                    } elseif ($row->ppo_flag == 1) {
                                        $flag = 'checked';
                                    }
                                    ?>
                                <td>
                                    <label class="align-items-center justify-content-between">
                                        <div class="form-toggle">
                                            <input name="flag"
                                                onchange="itemflag(<?php echo $row->ppo_id; ?>,'pc_publish_offer','ppo_id','ppo_flag');"
                                                type="checkbox" <?php echo $flag; ?>>
                                            <div class="form-toggle__item">
                                                <i class="fa" data-check-icon="&#xf00c" data-uncheck-icon="&#xf00d"></i>
                                            </div>
                                        </div>
                                    </label>
                                </td>
                                <td>
                                    <a class="u-link mr-2" href="#"
                                        onclick="itemdelete(<?php echo $row->ppo_id; ?>,'pc_publish_offer','ppo_id');">
                                        <i class="fas fa-trash"></i> </a>
                                    <a href="<?php echo base_url(); ?><?php echo urlencode($company->pu_link); ?>"
                                        class="btn p-1 btn-outline-primary" target="_blank">View</a>
                                </td>
                            </tr>
                            <?php
                                $p++;
                            }
                            ?>
                        </tbody>
                        <tfoot>
                        <tr>
                                <th>#</th>
                                <th>Company Name</th>
                                <th>Offers Name</th>
                                <th>Offers Description</th>
                                <th>Offers Image</th>
                                <th>Offers Start Date</th>
                                <th>Offers End Date</th>
                                <th>Visibility</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                    <!-- End Data Table -->
                </div>
                <!-- End Publish Offers -->

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