<?php
defined('BASEPATH') or exit('No direct script access allowed');
$value['package'] = 'active';
$value['heading']   = 'Package';
$pg = $this->db->get('p_package');
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

                <!-- Package -->
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
                                data-target="#addpackage">
                                Add New</button><br>
                            <!-- End Modal1-->
                        </div>
                    </div>
                    <!-- Data Table -->
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Package Name</th>
                                <th>Package Description</th>
                                <th>Package Month</th>
                                <th>Package Price</th>
                                <th>Visibility</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                        $p =1;
                                        foreach($pg->result() as $row)
                                        { 
                                        ?>
                            <tr>
                                <td><?php echo $p;?></td>
                                <td><?php echo $row->pp_name; ?></td>
                                <td><?php echo $row->pp_desc; ?></td>
                                <td><?php echo $row->pp_month; ?></td>
                                <td><?php echo $row->pp_price; ?></td>
                                <?php
                                                    if($row->pp_flag == 0){
                                                        $flag = '';
                                                    }elseif($row->pp_flag == 1){
                                                        $flag = 'checked';
                                                    }
                                                ?>
                                <td>
                                    <label class="align-items-center justify-content-between">
                                        <div class="form-toggle">
                                            <input name="flag"
                                                onchange="itemflag(<?php echo $row->pp_id; ?>,'p_package','pp_id','pp_flag');"
                                                type="checkbox" <?php echo $flag; ?>>
                                            <div class="form-toggle__item">
                                                <i class="fa" data-check-icon="&#xf00c" data-uncheck-icon="&#xf00d"></i>
                                            </div>
                                        </div>
                                    </label>
                                </td>
                                <td>
                                    <a class="u-link mr-2" data-toggle="modal" href="#editpackage<?php echo $p; ?>">
                                        <i class="fas fa-edit"></i> </a>
                                    <a class="u-link mr-2" href="#"
                                        onclick="itemdelete(<?php echo $row->pp_id; ?>,'p_package','pp_id');">
                                        <i class="fas fa-trash"></i> </a>
                                </td>
                            </tr>
                            <?php 
                                        $p++;
                                        }
                                        ?>
                        </tbody>
                        <tfoot>
                            <th>#</th>
                            <th>Package Name</th>
                            <th>Package Description</th>
                            <th>Package Month</th>
                            <th>Package Price</th>
                            <th>Visibility</th>
                            <th>Action</th>
                        </tfoot>
                    </table>
                    <!-- End Data Table -->
                </div>
                <!-- End Package -->

            </div>

            <!-- Footer -->
            <?php $this->load->view('/panel/parts/footer'); ?>
            <!-- End Footer -->
        </div>
    </main>
    <!-- Modal1-->
    <div class="modal" id="addpackage">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h3 class="modal-title">Add Package</h3>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="/admin/package/addpackage" method="post">
                        <div class="form-group">
                            <label for="name">Package Name :</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Package Name"
                                name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="desc">Package Description :</label>
                            <textarea class="form-control" rows="3" id="desc" placeholder="Enter Package Description"
                                name="desc" required></textarea></div>
                        <div class="form-group">
                            <label for="month">Package Month :</label>
                            <input type="text" class="form-control" id="month" placeholder="Enter Package Month"
                                name="month" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Package Price :</label>
                            <input type="text" class="form-control" id="price" placeholder="Enter Package Price"
                                name="price" required>
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
    <?php
    $p = 1;
    foreach($pg->result() as $row)
    { 
    ?>
    <div class="modal" id="editpackage<?php echo $p; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h3 class="modal-title">Edit Package</h3>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="/admin/package/editpackage" method="post">
                        <div class="form-group">
                            <label for="id">ID:</label>
                            <input type="id" class="form-control" id="id" name="id" value="<?php echo $row->pp_id; ?>"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">Package Name :</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Package Name"
                                name="name" value="<?php echo $row->pp_name; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="desc">Package Description :</label>
                            <textarea class="form-control" rows="3" id="desc" placeholder="Enter Package Description"
                                name="desc" required><?php echo $row->pp_desc; ?></textarea></div>
                        <div class="form-group">
                            <label for="month">Package Month :</label>
                            <input type="text" class="form-control" id="month" placeholder="Enter Package Month"
                                name="month" value="<?php echo $row->pp_month; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Package Price :</label>
                            <input type="text" class="form-control" id="price" placeholder="Enter Package Price"
                                name="price" value="<?php echo $row->pp_price; ?>" required>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <?php
        $p++;
        }
    ?>
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