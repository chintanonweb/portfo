<?php
$data['faqs'] = 'active';
$data['heading'] = 'FAQS';
defined('BASEPATH') or exit('No direct script access allowed');
$fq = $this->db->get('p_faqs');
?>
<!-- Head -->
<?php $this->load->view('parts/headermeta',$data);
?>
<!-- End Head -->

<body>
    <!-- Header -->
    <?php $this->load->view('parts/header',$data);
    ?>
    <!-- End Header -->
    <main class="m-500p">
        <div class="container mb-5 mt-5">
            <blockquote class="blockquote-v1 blockquote-v1--left">
                <h3>Frequently Asked Questions</h3>
            </blockquote>

            <div class="card" id="accordion">
				<?php
				$i = 1;
				foreach($fq->result() as $row){ 
				?>
                <div class="card-header">
                    <a class="card-link" data-toggle="collapse" href="#collapse<?php echo $i; ?>">
                        <?php echo $row->pf_question; ?>
                    </a>
                </div>
                <div id="collapse<?php echo $i; ?>" class="collapse <?php if($i == 1){ echo 'show'; }?>" data-parent="#accordion">
                    <div class="card-body">
					<?php echo $row->pf_answer; ?>
                    </div>
                </div>
				<?php $i++; } ?>
                
            </div>
        </div>
    </main>
    <!-- Footer -->
    <?php
    $this->load->view('parts/footer');
    ?>
    <!-- End Footer -->

    <?php
    $this->load->view('parts/footermeta');
    ?>
</body>
<!-- End Body -->

</html>