<?php
defined('BASEPATH') or exit('No direct script access allowed');
$value['socialmedia'] = 'active';
$value['portfolio'] = 'opened';
$value['heading'] = 'Social Media';
$query = $this->db->get_where('pu_socialmedia',array('pu_accno'=>$this->session->userdata('pu_accno')));
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<!-- Head -->

<head>
    <?php $this->load->view('/panel/parts/headermeta',$value); ?>
    <link rel="stylesheet" href="/panelassets/vendor/faiconpicker/css/bootstrap-iconpicker.min.css">
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
                                data-target="#socialmediaadd">
                                Add New</button><br>
                            <!-- End Modal1-->
                        </div>
                    </div>
                    <!-- Data Table-->
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Icon</th>
                                <th>Link</th>
                                <th>Flag</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                                        foreach ($query->result() as $row) {
                                        ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><i class="<?php echo $row->pusm_icon; ?>"></i></td>
                                <td><?php echo $row->pusm_link; ?></td>
                                <?php
                                                    if($row->pusm_flag == 0){
                                                        $flag = '';
                                                    }elseif($row->pusm_flag == 1){
                                                        $flag = 'checked';
                                                    }
                                            ?>
                                <td><label class="align-items-center justify-content-between">
                                        <div class="form-toggle">
                                            <input name="flag"
                                                onchange="itemflag(<?php echo $row->pusm_id; ?>,'pu_socialmedia','pusm_id','pusm_flag');"
                                                type="checkbox" <?php echo $flag; ?>>
                                            <div class="form-toggle__item">
                                                <i class="fa" data-check-icon="&#xf00c" data-uncheck-icon="&#xf00d"></i>
                                            </div>
                                        </div>
                                    </label>
                                </td>

                                <td><a class="u-link mr-2" data-toggle="modal" href="#editsocialmedia<?php echo $i; ?>">
                                        <i class="fas fa-edit"></i> </a>
                                    <a class="u-link mr-2" href=""
                                        onclick="itemdelete(<?php echo $row->pusm_id; ?>,'pu_socialmedia','pusm_id');">
                                        <i class="fas fa-trash"></i> </a>
                                </td>
                            </tr>
                            <?php $i++;
                                                } ?>
                        </tbody>
                        <tfoot>
                            <th>Sr. No.</th>
                            <th>Icon</th>
                            <th>Link</th>
                            <th>Flag</th>
                            <th>Action</th>
                        </tfoot>
                    </table>
                    <!-- Data Table-->
                </div>
                <!-- End Testimonial -->

            </div>

            
            <!-- Footer -->
            <?php $this->load->view('/panel/parts/footer'); ?>
            <!-- End Footer -->
        </div>
    </main>
    <!-- Modal1-->
    <div class="modal" id="socialmediaadd">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h3 class="modal-title">Add Socialmedia</h3>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="/user/portfolio/socialmedia/add" method="post">
                        <div class="form-group">
                            <label for="link">Link & Icon :<span class="required">*</span></label>
                            <div class="input-group">
                                <input id="link" type="text" name="link" class="form-control"
                                    placeholder="Enter Link & Select Icon -->" required>
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-outline-secondary" name="icon"
                                        data-icon="fas fa-home" role="iconpicker"></button>
                                </span>
                            </div>
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
        $i = 1;
        foreach ($query->result() as $row) {
        ?>
    <div class="modal" id="editsocialmedia<?php echo $i; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h3 class="modal-title">Edit Socialmedia</h3>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form enctype="multipart/form-data" action="/user/portfolio/socialmedia/edit" method="post">
                        <div class="form-group">
                            <label for="id<?php echo $i; ?>">Id : </label>
                            <input id="id<?php echo $i; ?>" type="text" name="id" class="form-control"
                                value="<?php echo $row->pusm_id; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="link<?php echo $i; ?>">Link & Icon :<span class="required">*</span></label>
                            <div class="input-group">
                                <input id="link<?php echo $i; ?>" type="text" name="link"
                                    value="<?php echo $row->pusm_link; ?>" class="form-control"
                                    placeholder="Enter Service Name & Select Icon -->" required>
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-outline-secondary" name="icon"
                                        data-icon="<?php echo $row->pusm_icon; ?>" role="iconpicker"></button>
                                </span>
                            </div>
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
            $i++;
        }
        ?>
    <!-- End Modal2-->
    <!-- Footer meta -->
    <?php $this->load->view('/panel/parts/footermeta'); ?>
    <script src="/panelassets/vendor/faiconpicker/js/bootstrap-iconpicker.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
    </script>
    <script>
    $(document).ready(function() {
        $('#socialmediatable').DataTable();
    });
    $('#socialmediaadd').on('shown.bs.modal', function(e) {
        $(document).off('focusin.modal');
    });
    </script>
    <?php
    $i = 1;
    foreach ($query->result() as $row) {
    ?>
    <script>
    $('#editsocialmedia<?php echo $i; ?>').on('shown.bs.modal', function(e) {
        $(document).off('focusin.modal');
    });
    </script>
    <?php
        $i++;
    }
    ?>
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
    <!-- End Footer meta -->
</body>

</html>