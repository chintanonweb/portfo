<?php
defined('BASEPATH') or exit('No direct script access allowed');
$value['education'] = 'active';
$value['portfolio'] = 'opened';
$value['heading'] = 'Education';
$equ = $this->db->get_where('pu_education',array('pu_accno'=>$this->session->userdata('pu_accno')));
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
                                data-target="#exampleModal1">
                                Add New</button><br>
                            <!-- End Modal1-->
                        </div>
                    </div>
                    <!-- Data Table -->
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Course</th>
                                <th>University</th>
                                <th>College/School</th>
                                <th>Detail/Summary</th>
                                <th>Completion Year</th>
                                <th>Visibility</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                                $i = 1;
                                                foreach($equ->result() as $row)
                                                {
                                                ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row->pue_course;?></td>
                                <td><?php echo $row->pue_university;?></td>
                                <td><?php echo $row->pue_college;?></td>
                                <td><?php echo $row->pue_detail;?></td>
                                <td><?php echo $row->pue_completion;?></td>
                                <?php
                                            if($row->pue_flag == 0)
                                            {
                                                $flag = '';
                                            }
                                            elseif($row->pue_flag == 1)
                                            {
                                                $flag = 'checked';
                                            }
                                            ?>
                                <td>
                                    <label class="align-items-center justify-content-between">
                                        <div class="form-toggle">
                                            <input name="flag"
                                                onchange="itemflag(<?php echo $row->pue_id; ?>,'pu_education','pue_id','pue_flag');"
                                                type="checkbox" <?php echo $flag; ?>>
                                            <div class="form-toggle__item">
                                                <i class="fa" data-check-icon="&#xf00c" data-uncheck-icon="&#xf00d"></i>
                                            </div>
                                        </div>
                                    </label>
                                </td>
                                <td>
                                    <a class="u-link mr-2" data-toggle="modal" href="#exampleModal2<?php echo $i;?>">
                                        <i class="fas fa-edit"></i> </a>
                                    <a class="u-link mr-2" href="#"
                                        onclick="itemdelete(<?php echo $row->pue_id; ?>,'pu_education','pue_id');">
                                        <i class="fas fa-trash"></i> </a>
                                </td>
                            </tr>
                            <?php
                                                $i++;
                                                }
                                                ?>
                        </tbody>

                        <tfoot>
                            <th>#</th>
                            <th>Course</th>
                            <th>University</th>
                            <th>College/School</th>
                            <th>Detail/Summary</th>
                            <th>Completion Year</th>
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
    <div class="modal" id="exampleModal1">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h3 class="modal-title">Add Education</h3>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="/user/portfolio/education/educationadd" method="post">
                        <div class="form-group">
                            <label for="course">Course:</label>
                            <input type="course" class="form-control" id="course" placeholder="Enter Course Name"
                                name="course" required></div>
                        <div class="form-group">
                            <label for="university">University:</label>
                            <input type="university" class="form-control" id="university"
                                placeholder="Enter University Name" name="university" required></div>
                        <div class="form-group">
                            <label for="college">College/school:</label>
                            <input type="text" class="form-control" id="college" placeholder="Enter City Name"
                                name="college" required></div>
                        <div class="form-group">
                            <label for="summary">Detail/Summary:</label>
                            <input type="summary" class="form-control" id="summary" placeholder="Enter Summary"
                                name="summary" required></div>
                        <div class="form-group">
                            <label for="completion">Completion Year:</label>
                            <input type="completion" class="form-control" id="completion"
                                placeholder="Enter Completion Year" name="completion" required>
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
    foreach($equ->result() as $row)
    {
    ?>
    <div class="modal" id="exampleModal2<?php echo $i;?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h3 class="modal-title">Edit Education</h3>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="/user/portfolio/education/educationupdate" method="post">
                        <div class="form-group">
                            <label for="course">ID:</label>
                            <input type="id" class="form-control" id="id" name="id" value="<?php echo $row->pue_id; ?>"
                                readonly></div>
                        <div class="form-group">
                            <label for="course">Course:</label>
                            <input type="course" class="form-control" id="course" placeholder="Enter Course Name"
                                name="course" value="<?php echo $row->pue_course;?>" required></div>
                        <div class="form-group">
                            <label for="university">University:</label>
                            <input type="university" class="form-control" id="university"
                                placeholder="Enter University Name" name="university"
                                value="<?php echo $row->pue_university;?>" required></div>
                        <div class="form-group">
                            <label for="college">College/school:</label>
                            <input type="college" class="form-control" id="college" placeholder="Enter College Name"
                                name="college" value="<?php echo $row->pue_college;?>" required></div>
                        <div class="form-group">
                            <label for="summary">Detail/Summary:</label>
                            <input type="summary" class="form-control" id="summary" placeholder="Enter Summary"
                                name="summary" value="<?php echo $row->pue_detail;?>" required></div>
                        <div class="form-group">
                            <label for="completion">Completion Year:</label>
                            <input type="completion" class="form-control" id="completion"
                                placeholder="Enter Completion Year" name="completion"
                                value="<?php echo $row->pue_completion;?>" required>
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

    <body>

</html>