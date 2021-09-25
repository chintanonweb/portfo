<?php
defined('BASEPATH') or exit('No direct script access allowed');
$value['work_experience'] = 'active';
$value['portfolio'] = 'opened';
$value['heading'] = 'Work Experience';
$wrs = $this->db->get_where('pu_work_experience',array('pu_accno'=>$this->session->userdata('pu_accno')));
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

    <body>
        <main class="u-main" role="main">
            <!-- Sidebar -->
            <?php $this->load->view('/panel/userpanel/sidebar',$value); ?>
            <!-- End Sidebar -->

            <div class="u-content">
                <div class="u-body">
                    <!-- Work Experience -->
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
                                    data-target="#workadd">
                                    Add New</button><br>
                                <!-- End Modal1-->
                            </div>
                        </div>
                        <!-- Data Table -->
                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Position</th>
                                    <th>Company Name</th>
                                    <th>Summary</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Visibility</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                            $we = 1;
                                            foreach($wrs->result() as $row)
                                            {
                                            ?>
                                <tr>
                                    <td><?php echo $we;?></td>
                                    <td><?php echo $row->puwe_position;?></td>
                                    <td><?php echo $row->puwe_company_name;?></td>
                                    <td><?php echo $row->puwe_summary;?></td>
                                    <td><?php echo $row->puwe_startdate;?></td>
                                    <td><?php echo $row->puwe_enddate;?></td>
                                    <?php
                                                    if($row->puwe_flag == 0){
                                                        $flag = '';
                                                    }elseif($row->puwe_flag == 1){
                                                        $flag = 'checked';
                                                    }
                                                ?>
                                    <td>
                                        <label class="align-items-center justify-content-between">
                                            <div class="form-toggle">
                                                <input name="flag"
                                                    onchange="itemflag(<?php echo $row->puwe_id; ?>,'pu_work_experience','puwe_id','puwe_flag');"
                                                    type="checkbox" <?php echo $flag; ?>>
                                                <div class="form-toggle__item">
                                                    <i class="fa" data-check-icon="&#xf00c"
                                                        data-uncheck-icon="&#xf00d"></i>
                                                </div>
                                            </div>
                                        </label>
                                    </td>
                                    <td>
                                        <a class="u-link mr-2" data-toggle="modal" href="#workupdate<?php echo $we; ?>">
                                            <i class="fas fa-edit"></i> </a>
                                        <a class="u-link mr-2" href="#"
                                            onclick="itemdelete(<?php echo $row->puwe_id; ?>,'pu_work_experience','puwe_id');">
                                            <i class="fas fa-trash"></i> </a>
                                    </td>
                                </tr>
                                <?php
                                                $we++;
                                                }
                                                ?>
                            </tbody>
                            <tfoot>
                                <th>#</th>
                                <th>Position</th>
                                <th>Company Name</th>
                                <th>Summary</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Visibility</th>
                                <th>Action</th>
                            </tfoot>
                        </table>
                        <!-- End Data Table -->
                    </div>
                    <!-- End Work Experience -->

                </div>

                <!-- Footer -->
                <?php $this->load->view('/panel/parts/footer'); ?>
                <!-- End Footer -->
            </div>
        </main>
        <!-- Modal1-->
        <div class="modal" id="workadd">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h3 class="modal-title">Add Work Experience</h3>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="/user/portfolio/work_experience/workadd" method="post">
                            <div class="form-group">
                                <label for="position">Position :</label>
                                <input type="text" class="form-control" id="position" placeholder="Enter Position"
                                    name="position" required></div>
                            <div class="form-group">
                                <label for="cname">Company Name :</label>
                                <input type="text" class="form-control" id="cname" placeholder="Enter Company Name"
                                    name="cname" required>
                            </div>
                            <div class="form-group">
                                <label for="summary">Summary :</label>
                                <input type="text" class="form-control" id="summary" placeholder="Enter Summary"
                                    name="summary" required>
                            </div>
                            <div class="form-group">
                                <label for="sdate">Start Date :</label>
                                <input type="date" class="form-control" id="sdate" placeholder="Enter Start Date"
                                    name="sdate" required>
                            </div>
                            <div class="form-group">
                                <label for="edate">End Date :</label>
                                <input type="date" class="form-control" id="edate" placeholder="Enter End Date"
                                    name="edate" required>
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
            $we = 1;
            foreach($wrs->result() as $row)
            { 
        ?>
        <div class="modal" id="workupdate<?php echo $we; ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h3 class="modal-title">Edit Work Experience</h3>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form enctype="multipart/form-data" action="/user/portfolio/work_experience/workupdate"
                            method="post">
                            <div class="form-group">
                                <label for="id">ID:</label>
                                <input type="id" class="form-control" id="id" name="id"
                                    value="<?php echo $row->puwe_id;?>" readonly></div>
                            <div class="form-group">
                                <label for="position">Position :</label>
                                <input type="text" class="form-control" id="position" placeholder="Enter Position"
                                    name="position" value="<?php echo $row->puwe_position;?>" required></div>
                            <div class="form-group">
                                <label for="cname">Company Name :</label>
                                <input type="text" class="form-control" id="cname" placeholder="Enter Company Name"
                                    name="cname" value="<?php echo $row->puwe_company_name;?>" required>
                            </div>
                            <div class="form-group">
                                <label for="summary">Summary :</label>
                                <input type="text" class="form-control" id="summary" placeholder="Enter Summary"
                                    name="summary" value="<?php echo $row->puwe_summary;?>" required>
                            </div>
                            <div class="form-group">
                                <label for="sdate">Start Date :</label>
                                <input type="date" class="form-control" id="sdate" placeholder="Enter Start Date"
                                    name="sdate" value="<?php echo $row->puwe_startdate;?>" required>
                            </div>
                            <div class="form-group">
                                <label for="edate">End Date :</label>
                                <input type="date" class="form-control" id="edate" placeholder="Enter End Date"
                                    name="edate" value="<?php echo $row->puwe_enddate;?>" required>
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
        <?php $we ++; } ?>
        <!-- End Modal2-->

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