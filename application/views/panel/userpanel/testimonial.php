<?php
defined('BASEPATH') or exit('No direct script access allowed');
$value['testimonial'] = 'active';
$value['heading'] = 'Testimonial';
$ts = $this->db->get_where('pu_testimonial',array('pu_accno'=>$this->session->userdata('pu_accno')));
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
                <!-- Testimonial -->
                <div class="container-fluid bg-white h-100 pt-3 pb-3">
                    <div class="row">
                        <div class="col-md-4">
                        </div>
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
                                data-target="#testadd">
                                Add New</button><br>
                            <!-- End Modal1-->
                        </div>
                    </div>
                    <!-- Data Table -->
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Description</th>
                                <th>Visibility</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                        $t = 1;
                                        foreach($ts->result() as $row)
                                        {
                                        ?>
                            <tr>
                                <td><?php echo $t; ?></td>
                                <td><?php echo $row->put_desc; ?></td>
                                <?php
                                                    if($row->put_flag == 0){
                                                        $flag = '';
                                                    }elseif($row->put_flag == 1){
                                                        $flag = 'checked';
                                                    }
                                                ?>
                                <td>
                                    <label class="align-items-center justify-content-between">
                                        <div class="form-toggle">
                                            <input name="flag"
                                                onchange="itemflag(<?php echo $row->put_id; ?>,'pu_testimonial','put_id','put_flag');"
                                                type="checkbox" <?php echo $flag; ?>>
                                            <div class="form-toggle__item">
                                                <i class="fa" data-check-icon="&#xf00c" data-uncheck-icon="&#xf00d"></i>
                                            </div>
                                        </div>
                                    </label>
                                </td>
                                <td>
                                    <a class="u-link mr-2" data-toggle="modal" href="#testupdate<?php echo $t; ?>">
                                        <i class="fas fa-edit"></i> </a>
                                    <a class="u-link mr-2" href="#"
                                        onclick="itemdelete(<?php echo $row->put_id; ?>,'pu_testimonial','put_id');">
                                        <i class="fas fa-trash"></i> </a>
                                </td>
                            </tr>
                            <?php
                                        $t++;
                                        }
                                        ?>
                        </tbody>
                        <tfoot>
                            <th>#</th>
                            <th>Description</th>
                            <th>Visibility</th>
                            <th>Action</th>
                        </tfoot>
                    </table>
                    <!-- End Data Table -->
                </div>
                <!-- End Testimonial -->

            </div>

            <!-- Footer -->
            <?php $this->load->view('/panel/parts/footer'); ?>
            <!-- End Footer -->
        </div>
    </main>
    <!-- Modal1-->
    <div class="modal" id="testadd">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h3 class="modal-title">Add Testimonial</h3>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="/user/testimonial/testimonialadd" method="post">
                        <div class="form-group">
                            <label for="desc">Description :</label>
                            <textarea class="form-control" rows="3" id="desc" placeholder="Enter About us" name="desc"
                                required></textarea>
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
    $t = 1; 
    foreach($ts->result() as $row)
    { 
    ?>
    <div class="modal" id="testupdate<?php echo $t; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h3 class="modal-title">Edit Testimonial</h3>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form enctype="multipart/form-data" action="/user/testimonial/testimonialupdate"
                        method="post">
                        <div class="form-group">
                            <label for="id">ID:</label>
                            <input type="id" class="form-control" id="id" name="id" value="<?php echo $row->put_id;?>"
                                readonly></div>
                        <div class="form-group">
                            <label for="desc">Description :</label>
                            <textarea class="form-control" rows="3" id="desc" placeholder="Enter About us" name="desc"
                                required><?php echo $row->put_desc;?></textarea>
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
    $t++;
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
            url: '/user/dashboard/flagchangedata',
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
                url: '/user/dashboard/deletedata',
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