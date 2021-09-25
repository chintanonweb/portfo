<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['heading']='Publish offers';
$data['publishoffers']='active';
$pc = $this->db->get_where('p_company_detail',array('pu_accno'=>$this->session->userdata('pu_accno')))->row();
$acc = $pc->pcd_accno;
$po = $this->db->get_where('pc_publish_offer',array('pcd_accno'=>$acc));
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<!-- Head -->

<head>
    <?php $this->load->view('/panel/parts/headermeta',$data); ?>
</head>
<!-- End Head -->

<body>
    <!-- Header (Topbar) -->
    <?php $this->load->view('/panel/parts/header'); ?>
    <!-- End Header (Topbar) -->
    <main class="u-main" role="main">
        <!-- Sidebar -->
        <?php $this->load->view('/panel/merchantpanel/sidebar',$data); ?>
        <!-- End Sidebar -->
        <div class="u-content">
            <div class="u-body">
                <div class="container-fluid bg-white h-100 pt-3 pb-3">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <?php 
                             if($this->session->flashdata('text')) 
                                {
                                    echo '<div class="alert alert-'.$this->session->flashdata('alert').'">';
                                    echo $this->session->flashdata('text');
                                    echo '</div>';
                                }
                        ?>
                        </div>
                        <div class="col-md-4">
                            <!-- Modal1-->
                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal"
                                data-target="#addoffer">
                                Add New</button><br>
                            <!-- End Modal1-->
                        </div>
                    </div>
                    <!-- Data Table -->
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Offer Name</th>
                                <th>Offer Description</th>
                                <th>Offer Image</th>
                                <th>Offer Start Date</th>
                                <th>Offer End Date</th>
                                <th>Visibility</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $p = 1;
                            foreach($po->result() as $row){
                            ?>
                            <tr>
                                <td><?php echo $p; ?></td>
                                <td><?php echo $row->ppo_name; ?></td>
                                <td><?php echo $row->ppo_desc; ?></td>
                                <td><img class="img-fluid"
                                        src="data:image/png;base64,<?php echo base64_encode($row->ppo_image); ?>"
                                        alt="" width="100px"></td>
                                <td><?php echo $row->ppo_start_date; ?></td>
                                <td><?php echo $row->ppo_end_date; ?></td>
                                <?php
                                if($row->ppo_flag == 0)
                                {
                                    $flag = '';
                                }
                                elseif($row->ppo_flag == 1){
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
                                    <a class="u-link mr-2" data-toggle="modal" href="#editoffer<?php echo $p; ?>">
                                        <i class="fas fa-edit"></i> </a>
                                    <a class="u-link mr-2" href="#"
                                        onclick="itemdelete(<?php echo $row->ppo_id; ?>,'pc_publish_offer','ppo_id');">
                                        <i class="fas fa-trash"></i> </a>
                                </td>
                            </tr>
                            <?php $p++;   } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Offer Name</th>
                                <th>Offer Description</th>
                                <th>Offer Image</th>
                                <th>Offer Start Date</th>
                                <th>Offer End Date</th>
                                <th>Visibility</th>
                                <th>Action</th>
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
    <!-- Modal1-->
    <div class="modal" id="addoffer">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h3 class="modal-title">Add Publish Offers</h3>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="/merchant/publish_offers/addoffers" enctype="multipart/form-data" method="post">
                        <div class="form-group">
                            <label for="pname">Offer Name :</label>
                            <input type="text" class="form-control" id="pname" placeholder="Enter Publish offer Name"
                                name="pname" required>
                        </div>
                        <div class="form-group">
                            <label for="desc">Offer Description :</label>
                            <textarea class="form-control" rows="3" id="desc"
                                placeholder="Enter Publish offer Description" name="desc" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="oimage">Offer Image (500x350) :</label>
                            <input type="file" id="oimage" class="form-control" name="oimage">
                        </div>
                        <div class="form-group">
                            <label for="sdate">Offer Start Date :</label>
                            <input type="date" class="form-control" id="sdate"
                                placeholder="Enter Publish offer Start Date" name="sdate" required>
                        </div>
                        <div class="form-group">
                            <label for="edate">Offer End Date :</label>
                            <input type="date" class="form-control" id="edate"
                                placeholder="Enter Publish offer End Date" name="edate" required>
                        </div>
                        <div class="form-group">
                            <label class="d-flex align-items-center justify-content-between">
                                <span class="form-label-text">Visibility : </span>
                                <div class="form-toggle">
                                    <input name="flag" type="checkbox" value="1" checked>
                                    <div class="form-toggle__item">
                                        <i class="fa" data-check-icon="&#xf00c" data-uncheck-icon="&#xf00d"></i>
                                    </div>
                                </div>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- End Modal1-->
    <!-- Modal2-->
    <?php $p = 1;
    foreach($po->result() as $row){ ?>
    <div class="modal" id="editoffer<?php echo $p; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h3 class="modal-title">Edit Publish Offers</h3>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="/merchant/publish_offers/editoffers" enctype="multipart/form-data" method="post">
                        <div class="form-group">
                            <label for="id">Id :</label>
                            <input type="text" class="form-control" id="id" placeholder="Enter Id" name="id"
                                value="<?php echo $row->ppo_id; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="pname">Name :</label>
                            <input type="text" class="form-control" id="pname" placeholder="Enter Publish offer Name"
                                name="pname" value="<?php echo $row->ppo_name; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="desc">Description :</label>
                            <textarea class="form-control" rows="3" id="desc"
                                placeholder="Enter Publish offer Description" name="desc"
                                required><?php echo $row->ppo_desc; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="oimage">Image (500x350) :</label>
                            <input type="file" id="oimage" class="form-control" name="oimage">
                        </div>
                        <div class="form-group">
                            <label for="sdate">Start Date :</label>
                            <input type="date" class="form-control" id="sdate"
                                placeholder="Enter Publish offer Start Date" name="sdate"
                                value="<?php echo $row->ppo_start_date; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="edate">End Date :</label>
                            <input type="date" class="form-control" id="edate"
                                placeholder="Enter Publish offer End Date" name="edate"
                                value="<?php echo $row->ppo_end_date; ?>" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <?php $p++; } ?>
    <!-- End Modal2-->
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