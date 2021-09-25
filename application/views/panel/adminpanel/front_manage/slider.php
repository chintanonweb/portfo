<?php
defined('BASEPATH') or exit('No direct script access allowed');
$value['slider'] = 'active';
$value['manage'] = 'opened';
$value['heading']   = 'Slider';
$sd = $this->db->get('p_slider');
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
                <!-- Slider -->
                <div class="container-fluid h-100 pt-3 pb-3 bg-white">
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
                                data-target="#addslider">
                                Add New</button><br>
                            <!-- End Modal1-->
                        </div>
                    </div>
                    <!-- Data Table -->
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Slider Title</th>
                                <th>Slider Image</th>
                                <th>Visibility</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $s = 1;
                            foreach($sd->result() as $row){ 
                            ?>
                            <tr>
                                <td><?php echo $s; ?></td>
                                <td><?php echo $row->psd_title; ?></td>
                                <td><img class ="img-fluid" src="data:image/png;base64,<?php echo base64_encode($row->psd_image); ?>"
                                        alt="" width="100px"></td>
                                <?php
                                if($row->psd_flag == 0)
                                {
                                    $flag = '';
                                }
                                elseif($row->psd_flag == 1){
                                    $flag = 'checked';
                                }
                                ?>
                                <td>
                                    <label class="align-items-center justify-content-between">
                                        <div class="form-toggle">
                                            <input name="flag"
                                                onchange="itemflag(<?php echo $row->psd_id; ?>,'p_slider','psd_id','psd_flag');"
                                                type="checkbox" <?php echo $flag; ?>>
                                            <div class="form-toggle__item">
                                                <i class="fa" data-check-icon="&#xf00c" data-uncheck-icon="&#xf00d"></i>
                                            </div>
                                        </div>
                                    </label>
                                </td>
                                <td>
                                    <a class="u-link mr-2" data-toggle="modal" href="#editslider<?php echo $s; ?>">
                                        <i class="fas fa-edit"></i> </a>
                                    <a class="u-link mr-2" href="#"
                                        onclick="itemdelete(<?php echo $row->psd_id; ?>,'p_slider','psd_id');">
                                        <i class="fas fa-trash"></i> </a>
                                </td>
                            </tr>
                            <?php 
                            $s++; }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Slider Title</th>
                                <th>Slider Image</th>
                                <th>Visibility</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                    <!-- End Data Table -->
                </div>
                <!-- End Slider -->

            </div>

            <!-- Footer -->
            <?php $this->load->view('/panel/parts/footer'); ?>
            <!-- End Footer -->
        </div>
    </main>
    <!-- Modal1-->
    <div class="modal" id="addslider">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h3 class="modal-title">Add Slider</h3>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="/admin/front_manage/slider/slideradd" enctype="multipart/form-data" method="post">
                        <div class="form-group">
                            <label for="title">Slider Title :</label>
                            <input type="text" class="form-control" id="title" placeholder="Enter Slider Title"
                                name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="simage">Slider Image (1350x590) :</label>
                            <input type="file" id="simage" class="form-control" name="simage">
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
    <?php $s = 1;
    foreach($sd->result() as $row){ 
    ?>
    <div class="modal" id="editslider<?php echo $s; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h3 class="modal-title">Edit Slider</h3>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="/admin/front_manage/slider/sliderupdate" enctype="multipart/form-data" method="post">
                        <div class="form-group">
                            <label for="id">Id :</label>
                            <input type="text" class="form-control" id="id" placeholder="Enter Id" name="id"
                                value="<?php echo $row->psd_id; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="title">Slider Title :</label>
                            <input type="text" class="form-control" id="title" placeholder="Enter Slider Title"
                                name="title" value="<?php echo $row->psd_title?>" required>
                        </div>
                        <div class="form-group">
                            <label for="simage">Slider Image (1350x590) :</label>
                            <input type="file" id="simage" class="form-control" name="simage">
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
    <?php $s++; } ?>
    <!-- End Modal2-->
    <?php $this->load->view('/panel/parts/footermeta'); ?>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
    </script>
    <script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
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