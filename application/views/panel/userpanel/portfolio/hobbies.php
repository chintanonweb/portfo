<?php
defined('BASEPATH') or exit('No direct script access allowed');
$value['hobbies'] = 'active';
$value['portfolio'] = 'opened';
$value['heading'] = 'Hobbies & Interest';
$hob = $this->db->get_where('pu_hobbies',array('pu_accno'=>$this->session->userdata('pu_accno')));
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
                                data-target="#hobbiesadd">
                                Add New</button><br>
                            <!-- End Modal1-->
                        </div>
                    </div>
                    <!-- Data Table-->
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Hobbies & Interest</th>
                                <th>Icon</th>
                                <th>Visibility</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $h = 1;
                            foreach($hob->result() as $row) { ?>
                            <tr>
                                <td><?php echo $h; ?></td>
                                <td><?php echo $row->puh_name; ?></td>
                                <td><i class="<?php echo $row->puh_icon; ?>"></i></td>
                                <?php
                                    if($row->puh_flag == 0){
                                        $flag = '';
                                    }elseif($row->puh_flag == 1){
                                        $flag = 'checked';
                                    }
                                ?>
                                <td><label class="align-items-center justify-content-between">
                                        <div class="form-toggle">
                                            <input name="flag"
                                                onchange="itemflag(<?php echo $row->puh_id; ?>,'pu_hobbies','puh_id','puh_flag');"
                                                type="checkbox" <?php echo $flag; ?>>
                                            <div class="form-toggle__item">
                                                <i class="fa" data-check-icon="&#xf00c" data-uncheck-icon="&#xf00d"></i>
                                            </div>
                                        </div>
                                    </label>
                                </td>

                                <td><a class="u-link mr-2" data-toggle="modal" href="#hobbiesedit<?php echo $h; ?>">
                                        <i class="fas fa-edit"></i> </a>
                                    <a class="u-link mr-2" href=""
                                        onclick="itemdelete(<?php echo $row->puh_id; ?>,'pu_hobbies','puh_id');">
                                        <i class="fas fa-trash"></i> </a>
                                </td>
                            </tr>
                            <?php $h++; } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Hobbies & Interest</th>
                                <th>Icon</th>
                                <th>Visibility</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                    <!-- Data Table-->
                </div>
            </div>
            <!-- Footer -->
            <?php $this->load->view('/panel/parts/footer'); ?>
            <!-- End Footer -->
        </div>
    </main>
    <!-- Modal1-->
    <div class="modal" id="hobbiesadd">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h3 class="modal-title">Add Hobbies & Interest</h3>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="/user/portfolio/hobbies/add" method="post">
                        <div class="form-group">
                            <label for="hobbies">Hobbies & Icon :<span class="required">*</span></label>
                            <div class="input-group">
                                <input id="hobbies" type="text" name="hobbies" class="form-control"
                                    placeholder="Enter Hobbies & Select Icon -->" required>
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
    <?php $h = 1; foreach($hob->result() as $row) { ?>
    <div class="modal" id="hobbiesedit<?php echo $h; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h3 class="modal-title">Edit Hobbies & Interest</h3>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form enctype="multipart/form-data" action="/user/portfolio/hobbies/edit" method="post">
                        <div class="form-group">
                            <label for="id">Id : </label>
                            <input id="id" type="text" name="id" class="form-control" value="<?php echo $row->puh_id; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="hobbies">Hobbies & Icon :<span class="required">*</span></label>
                            <div class="input-group">
                                <input id="hobbies" type="text" name="hobbies" value="<?php echo $row->puh_name; ?>" class="form-control"
                                    placeholder="Enter Hobbies & Select Icon -->" required>
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-outline-secondary" name="icon" data-icon="<?php echo $row->puh_icon; ?>"
                                        role="iconpicker"></button>
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
    <?php $h++; } ?>
    <!-- End Modal2-->
    <?php $this->load->view('/panel/parts/footermeta'); ?>
    <script src="/panelassets/vendor/faiconpicker/js/bootstrap-iconpicker.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
    </script>
</body>

</html>