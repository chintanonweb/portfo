<?php
defined('BASEPATH') or exit('No direct script access allowed');
$value['skill'] = 'active';
$value['portfolio'] = 'opened';
$value['heading'] = 'Skill';
$sk = $this->db->get_where('pu_skill',array('pu_accno'=>$this->session->userdata('pu_accno')));
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
                                data-target="#skilladd">
                                Add New</button><br>
                            <!-- End Modal1-->
                        </div>
                    </div>
                    <!-- Data Table -->
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Skill Name</th>
                                <th>Percentage</th>
                                <th>Visibility</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                                $k = 1;
                                                foreach($sk->result() as $row)
                                                {
                                                ?>
                            <tr>
                                <td><?php echo $k;?></td>
                                <td><?php echo $row->pus_name;?></td>
                                <td><?php echo $row->pus_percentage?></td>
                                <?php
                                            if($row->pus_flag == 0){
                                                $flag = '';
                                            }elseif($row->pus_flag == 1){
                                                $flag = 'checked';
                                            }
                                            ?>
                                <td>
                                    <label class="align-items-center justify-content-between">
                                        <div class="form-toggle">
                                            <input name="flag"
                                                onchange="itemflag(<?php echo $row->pus_id; ?>,'pu_skill','pus_id','pus_flag');"
                                                type="checkbox" <?php echo $flag; ?>>
                                            <div class="form-toggle__item">
                                                <i class="fa" data-check-icon="&#xf00c" data-uncheck-icon="&#xf00d"></i>
                                            </div>
                                        </div>
                                    </label>
                                </td>
                                <td>
                                    <a class="u-link mr-2" data-toggle="modal" href="#skillupdate<?php echo $k;?>">
                                        <i class="fas fa-edit"></i> </a>
                                    <a class="u-link mr-2" href="#"
                                        onclick="itemdelete(<?php echo $row->pus_id; ?>,'pu_skill','pus_id');">
                                        <i class="fas fa-trash"></i> </a>
                                </td>
                            </tr>
                            <?php
                                                $k++;
                                                }
                                                ?>
                        </tbody>
                        <tfoot>
                            <th>#</th>
                            <th>Skill Name</th>
                            <th>Percentage</th>
                            <th>Visibility</th>
                            <th>Action</th>
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
    <div class="modal" id="skilladd">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h3 class="modal-title">Add Skill</h3>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="/user/portfolio/skill/skilladd" method="post">
                        <div class="form-group">
                            <label for="name">Skill Name :</label>
                            <input type="name" class="form-control" id="name" placeholder="Enter Skill Name" name="name"
                                required></div>
                        <div class="form-group">
                            <label for="precentage">Skill Precentage :</label>
                            <input type="number" class="form-control" id="precentage"
                                placeholder="Enter Skill Percentage" name="precentage" required>
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
    $k = 1;
    foreach($sk->result() as $row)
    {
    ?>
    <div class="modal" id="skillupdate<?php echo $k;?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h3 class="modal-title">Edit Skill</h3>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="/user/portfolio/skill/skillupdate" method="post">
                        <div class="form-group">
                            <label for="id">ID:</label>
                            <input type="id" class="form-control" id="id" placeholder="Enter Skill Name" name="id"
                                value="<?php echo $row->pus_id;?>" readonly></div>
                        <div class="form-group">
                            <label for="name">Skill Name :</label>
                            <input type="name" class="form-control" id="name" placeholder="Enter Skill Name" name="name"
                                value="<?php echo $row->pus_name;?>" required></div>
                        <div class="form-group">
                            <label for="precentage">Skill Precentage :</label>
                            <input type="number" class="form-control" id="precentage"
                                placeholder="Enter Skill Percentage" name="precentage"
                                value="<?php echo $row->pus_percentage;?>" required>
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
                $k++;
                }
                ?>
    <!-- End Modal2-->
    </div>
    <!-- Global Vendor -->
    <?php $this->load->view('/panel/parts/footermeta'); ?>
    <<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js">
        </script>
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