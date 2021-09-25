<?php
defined('BASEPATH') or exit('No direct script access allowed');
$value['faqs'] = 'active';
$value['manage'] = 'opened';
$value['heading']   = 'FAQs';
$fq = $this->db->get('p_faqs');
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
                <!-- FAQ -->
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
                                data-target="#addfaq">
                                Add New</button><br>
                            <!-- End Modal1-->
                        </div>
                    </div>
                    <!-- Data Table -->
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Ouestion</th>
                                <th>Answer</th>
                                <th>Visibility</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $f = 1;
                            foreach($fq->result() as $row){ 
                            ?>
                            <tr>
                                <td><?php echo $f; ?></td>
                                <td><?php echo $row->pf_question; ?></td>
                                <td><?php echo $row->pf_answer; ?></td>
                                <?php
                                if($row->pf_flag == 0)
                                {
                                    $flag = '';
                                }
                                elseif($row->pf_flag == 1){
                                    $flag = 'checked';
                                }
                                ?>
                                <td>
                                    <label class="align-items-center justify-content-between">
                                        <div class="form-toggle">
                                            <input name="flag"
                                                onchange="itemflag(<?php echo $row->pf_id; ?>,'p_faqs','pf_id','pf_flag');"
                                                type="checkbox" <?php echo $flag; ?>>
                                            <div class="form-toggle__item">
                                                <i class="fa" data-check-icon="&#xf00c" data-uncheck-icon="&#xf00d"></i>
                                            </div>
                                        </div>
                                    </label>
                                </td>
                                <td>
                                    <a class="u-link mr-2" data-toggle="modal" href="#editfaq<?php echo $f; ?>">
                                        <i class="fas fa-edit"></i> </a>
                                    <a class="u-link mr-2" href="#"
                                        onclick="itemdelete(<?php echo $row->pf_id; ?>,'p_faqs','pf_id');">
                                        <i class="fas fa-trash"></i> </a>
                                </td>
                            </tr>
                            <?php 
                            $f++; }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Ouestion</th>
                                <th>Answer</th>
                                <th>Visibility</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                    <!-- End Data Table -->
                </div>
                <!-- End FAQ -->

            </div>

            <!-- Footer -->
            <?php $this->load->view('/panel/parts/footer'); ?>
            <!-- End Footer -->
        </div>
    </main>
    <!-- Modal1-->
    <div class="modal" id="addfaq">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h3 class="modal-title">Add FAQs</h3>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="/admin/front_manage/faqs/faqadd" method="post">
                        <div class="form-group">
                            <label for="queston">Question :</label>
                            <input type="text" class="form-control" id="queston" placeholder="Enter Question"
                                name="queston" required>
                        </div>
                        <div class="form-group">
                            <label for="answer">Answer :</label>
                            <input type="text" class="form-control" id="answer" placeholder="Enter Answer" name="answer"
                                required>
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
    <!-- Modal2 -->
    <?php
        $f = 1;
        foreach($fq->result() as $row){ 
    ?>
    <div class="modal" id="editfaq<?php echo $f; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h3 class="modal-title">Edit FAQs</h3>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="/admin/front_manage/faqs/faqupdate" method="post">
                        <div class="form-group">
                            <label for="id">FAQs Serial No :</label>
                            <input type="id" class="form-control" id="id" placeholder="Enter ID" name="id"
                                value="<?php echo $row->pf_id; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="queston">Question :</label>
                            <input type="text" class="form-control" id="queston" placeholder="Enter Question"
                                name="queston" value="<?php echo $row->pf_question; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="answer">Answer :</label>
                            <input type="text" class="form-control" id="answer" placeholder="Enter Answer" name="answer"
                                value="<?php echo $row->pf_answer; ?>" required>
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
    <?php $f++; } ?>
    <!-- End Modal2 -->
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
</body>

</html>