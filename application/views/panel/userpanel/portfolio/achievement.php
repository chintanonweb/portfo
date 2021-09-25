<?php
defined('BASEPATH') or exit('No direct script access allowed');
$value['achievement'] = 'active';
$value['portfolio'] = 'opened';
$value['heading'] = 'Achievement';
$ac = $this->db->get_where('pu_achievement',array('pu_accno'=>$this->session->userdata('pu_accno')));
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
    <?php $this->load->view('/panel/parts/header',$value); ?>
    <!-- End Header (Topbar) -->

    <main class="u-main" role="main">
        <!-- Sidebar -->
        <?php $this->load->view('/panel/userpanel/sidebar',$value); ?>
        <!-- End Sidebar -->

        <div class="u-content">
            <div class="u-body">
                <!-- Achievement -->
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
                                data-target="#achievementadd">
                                Add New</button><br>
                            <!-- End Modal1-->
                        </div>
                    </div>
                    <!-- Data Table -->
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Achievement Title</th>
                                <th>Achievement Date</th>
                                <th>Achievement Place</th>
                                <th>Achievement Summary</th>
                                <th>Visibility</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                                $a = 1;
                                                foreach($ac->result() as $row)
                                                { 
                                                ?>
                            <tr>
                                <td><?php echo $a; ?></td>
                                <td><?php echo $row->pua_title; ?></td>
                                <td><?php echo $row->pua_date; ?></td>
                                <td><?php echo $row->pua_place; ?></td>
                                <td><?php echo $row->pua_summary; ?></td>
                                <?php
                                            if($row->pua_flag == 0){
                                                $flag = '';
                                            }elseif($row->pua_flag == 1){
                                                $flag = 'checked';
                                            }
                                            ?>
                                <td>
                                    <label class="align-items-center justify-content-between">
                                        <div class="form-toggle">
                                            <input name="flag"
                                                onchange="itemflag(<?php echo $row->pua_id; ?>,'pu_achievement','pua_id','pua_flag');"
                                                type="checkbox" <?php echo $flag; ?>>
                                            <div class="form-toggle__item">
                                                <i class="fa" data-check-icon="&#xf00c" data-uncheck-icon="&#xf00d"></i>
                                            </div>
                                        </div>
                                    </label>
                                </td>
                                <td>
                                    <a class="u-link mr-2" data-toggle="modal"
                                        href="#achievementupdate<?php echo $a; ?>">
                                        <i class="fas fa-edit"></i> </a>
                                    <a class="u-link mr-2" href="#"
                                        onclick="itemdelete(<?php echo $row->pua_id; ?>,'pu_achievement','pua_id');">
                                        <i class="fas fa-trash"></i> </a>
                                </td>
                            </tr>
                            <?php
                                                $a++;
                                                 }
                                        ?>
                        </tbody>
                        <tfoot>
                            <th>#</th>
                            <th>Achievement Title</th>
                            <th>Achievement Date</th>
                            <th>Achievement Place</th>
                            <th>Achievement Summary</th>
                            <th>Visibility</th>
                            <th>Action</th>
                        </tfoot>
                    </table>
                    <!-- End Data Table -->
                </div>
                <!-- End Achievement -->

            </div>

            <!-- Footer -->
            <?php $this->load->view('/panel/parts/footer'); ?>
            <!-- End Footer -->
        </div>
    </main>
    <!-- Modal1-->
    <div class="modal" id="achievementadd">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h3 class="modal-title">Add Achievement</h3>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="/user/portfolio/achievement/achievementadd" method="post">
                        <div class="form-group">
                            <label for="title">Achievement Title :</label>
                            <input type="text" class="form-control" id="title" placeholder="Enter Aehievement Title"
                                name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="adate">Achievement Date :</label>
                            <input type="date" class="form-control" id="adate" placeholder="Enter Achievement Date"
                                name="adate" required>
                        </div>
                        <div class="form-group">
                            <label for="place">Achievement Place :</label>
                            <input type="text" class="form-control" id="place" placeholder="Enter Achievement Place"
                                name="place" required>
                        </div>
                        <div class="form-group">
                            <label for="summary">Achievement Summary :</label>
                            <input type="text" class="form-control" id="summary" placeholder="Enter Achievement Summary"
                                name="summary" required>
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
    <?php $a = 1;
foreach($ac->result() as $row)
{ 
?>
    <div class="modal" id="achievementupdate<?php echo $a; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h3 class="modal-title">Edit Achievement</h3>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="/user/portfolio/achievement/achievementupdate" method="post">
                        <div class="form-group">
                            <label for="id">ID:</label>
                            <input type="id" class="form-control" id="id" name="id" value="<?php echo $row->pua_id;?>"
                                readonly></div>
                        <div class="form-group">
                            <label for="title">Achievement Title :</label>
                            <input type="text" class="form-control" id="title" placeholder="Enter Aehievement Title"
                                value="<?php echo $row->pua_title;?>" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="adate">Achievement Date :</label>
                            <input type="date" class="form-control" id="adate" placeholder="Enter Achievement Date"
                                value="<?php echo $row->pua_date;?>" name="adate" required>
                        </div>
                        <div class="form-group">
                            <label for="place">Achievement Place :</label>
                            <input type="text" class="form-control" id="place" placeholder="Enter Achievement Place"
                                value="<?php echo $row->pua_place;?>" name="place" required>
                        </div>
                        <div class="form-group">
                            <label for="summary">Achievement Summary :</label>
                            <input type="text" class="form-control" id="summary" placeholder="Enter Achievement Summary"
                                value="<?php echo $row->pua_summary;?>" name="summary" required>
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
    <?php $a++;  } ?>
    <!-- End Modal2-->
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
</body>

</html>