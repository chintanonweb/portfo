<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Get_a_link extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

    public function index()
	{
		$this->pmodel->isloggedin();
		$this->load->view('/panel/merchantpanel/reviews/get_a_link');
	}
	public function addlink(){
		$email = $this->input->post('email');
		$a = $this->db->get_where('p_user',array('pu_email'=>$email))->row();
		$ac = $a->pu_accno;
		$p = $this->db->get_where('p_company_detail',array('pu_accno'=>$this->session->userdata('pu_accno')))->row();
		$pc = $p->pcd_accno;
		
		$adlink = array('pu_accno'=>$ac,
						'pcd_accno'=>$pc,
						'pr_email'=>$email);

		$ad = $this->db->insert('p_review',$adlink);

		if($ad){
			$this->pmodel->noerror_message('Review Link is Get');
			redirect('/merchant/reviews/get_a_link','refresh');
		}
		else{
			$this->pmodel->error_message('Something Want To Wrong');
			redirect('/merchant/reviews/get_a_link','refresh');
		}
	}
}