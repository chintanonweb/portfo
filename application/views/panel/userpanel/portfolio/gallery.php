<?php
defined('BASEPATH') or exit('No direct script access allowed');
$value['gallery'] = 'active';
$value['portfolio'] = 'opened';
$value['heading'] = 'Gallery';
$ga = $this->db->get_where('pu_gallery',array('pu_accno'=>$this->session->userdata('pu_accno')));
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
                <!-- Education -->
                <div class="container-fluid bg-white h-100 pt-3 pb-3">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <?php
                            if ($this->session->flashdata('text')) {
                                echo '<div class="alert alert-' . $this->session->flashdata('alert') . '">';
                                echo $this->session->flashdata('text');
                                echo '</div>';
                            }
                            ?>
                        </div>
                        <div class="col-md-4">
                            <!-- Modal1-->
                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal"
                                data-target="#addgallery">
                                Add New</button><br>
                            <!-- End Modal1-->
                        </div>
                    </div>
                    <!-- Data Table -->
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Gallery Image</th>
                                <th>Gallery Title</th>
                                <th>Gallery Description</th>
                                <th>Visibility</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $g = 1;
                            foreach($ga->result() as $row){
                            ?>
                            <tr>
                                <td><?php echo $g; ?></td>
                                <td><img class="img-fluid" width="100px" src="data:image/png;base64,<?php echo base64_encode($row->pug_img); ?>" alt="">
                                </td>
                                <td><?php echo $row->pug_title; ?></td>
                                <td><?php echo $row->pug_desc; ?></td>
                                <?php
                                    if ($row->pug_flag == 0) {
                                        $flag = '';
                                    } elseif ($row->pug_flag == 1) {
                                        $flag = 'checked';
                                    }
                                    ?>
                                <td>
                                    <label class="align-items-center justify-content-between">
                                        <div class="form-toggle">
                                            <input name="flag"
                                                onchange="itemflag(<?php echo $row->pug_id; ?>,'pu_gallery','pug_id','pug_flag');"
                                                type="checkbox" <?php echo $flag; ?>>
                                            <div class="form-toggle__item">
                                                <i class="fa" data-check-icon="&#xf00c" data-uncheck-icon="&#xf00d"></i>
                                            </div>
                                        </div>
                                    </label>
                                </td>
                                <td>
                                    <a class="u-link mr-2" data-toggle="modal" href="#editgallery<?php echo $g; ?>">
                                        <i class="fas fa-edit"></i> </a>
                                    <a class="u-link mr-2" href="#"
                                        onclick="itemdelete(<?php echo $row->pug_id; ?>,'pu_gallery','pug_id');">
                                        <i class="fas fa-trash"></i> </a>
                                </td>
                            </tr>
                            <?php $g++ ; } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Gallery Image</th>
                                <th>Gallery Title</th>
                                <th>Gallery Description</th>
                                <th>Visibility</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                    <!-- End Data Table -->
                </div>
                <!-- End Education -->
            </div>

            <!-- Footer -->
            <?php $this->load->view('/panel/parts/footer'); ?>
            <!-- End Footer -->
        </div>
    </main>
    <!-- Modal1-->
    <div class="modal" id="addgallery">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h3 class="modal-title">Add Gallery</h3>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="/user/portfolio/gallery/addgallery" enctype="multipart/form-data" method="post">
                        <div class="form-group">
                            <label for="gimage">Gallery Image (500x350) :</label>
                            <input type="file" id="gimage" class="form-control" name="gimage">
                        </div>
                        <div class="form-group">
                            <label for="gtitle">Gallery Title :</label>
                            <input type="text" class="form-control" id="gtitle" placeholder="Enter Gallery Title"
                                name="gtitle" required>
                        </div>
                        <div class="form-group">
                            <label for="gdesc">Gallery Description :</label>
                            <textarea class="form-control" rows="3" id="gdesc" placeholder="Enter Gallery Description"
                                name="gdesc" required></textarea>
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
    $g = 1;
    foreach ($ga->result() as $row) {
    ?>
    <div class="modal" id="editgallery<?php echo $g; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h3 class="modal-title">Edit Gallery</h3>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="/user/portfolio/gallery/editgallery" enctype="multipart/form-data" method="post">
                        <div class="form-group">
                            <label for="id">Id :</label>
                            <input type="text" class="form-control" id="id" placeholder="Enter Id" name="id"
                                value="<?php echo $row->pug_id; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="gimage">Gallery Image (500x350) :</label>
                            <input type="file" id="gimage" class="form-control" name="gimage">
                        </div>
                        <div class="form-group">
                            <label for="gtitle">Gallery Title :</label>
                            <input type="text" class="form-control" id="gtitle" placeholder="Enter Gallery Title"
                                name="gtitle" value="<?php echo $row->pug_title; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="gdesc">Gallery Description :</label>
                            <textarea class="form-control" rows="3" id="gdesc" placeholder="Enter Gallery Description"
                                name="gdesc" required><?php echo $row->pug_desc; ?></textarea>
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
    <?php $g++;
    } ?>
    <!-- End Modal2-->
    </div>
    <!-- Global Vendor -->
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

    <body>

</html>