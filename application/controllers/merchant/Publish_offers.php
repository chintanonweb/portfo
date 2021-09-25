<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publish_offers extends CI_Controller {

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
		$this->load->view('/panel/merchantpanel/publish_offers');
	}
	public function addoffers()
	{
		$pc = $this->db->get_where('p_company_detail',array('pu_accno'=>$this->session->userdata('pu_accno')))->row();
		$acc = $pc->pcd_accno;
		$addof = array(	'pcd_accno'=>$acc,
						'ppo_name'=>$this->input->post('pname'),
						'ppo_desc'=>$this->input->post('desc'),
						'ppo_start_date'=>$this->input->post('sdate'),
						'ppo_end_date'=>$this->input->post('edate'),
						'ppo_flag'=>$this->input->post('flag')

		);
		if($_FILES['oimage']['tmp_name'] != '')
						{
							$addof['ppo_image'] = file_get_contents($_FILES['oimage']['tmp_name']);
						}
		$o = $this->db->insert('pc_publish_offer',$addof);

		if($o){
			$this->pmodel->noerror_message('Publish Offer Added Successfully');
			redirect('/merchant/publish_offers','refresh');
		}
		else{
			$this->pmodel->error_message('Something Want To Wrong');
			redirect('/merchant/publish_offers','refresh');
		}
	}
	public function editoffers()
	{
		$editof = array('ppo_name'=>$this->input->post('pname'),
						'ppo_desc'=>$this->input->post('desc'),
						'ppo_start_date'=>$this->input->post('sdate'),
						'ppo_end_date'=>$this->input->post('edate'));
		
						if($_FILES['oimage']['tmp_name'] != '')
						{
							$editof['ppo_image'] = file_get_contents($_FILES['oimage']['tmp_name']);
						}
		$this->db->where('ppo_id',$this->input->post('id'));
		$po = $this->db->update('pc_publish_offer',$editof);

		if($po){
			$this->pmodel->noerror_message('Publish Offer Updated Successfully');
			redirect('/merchant/publish_offers','refresh');
		}
		else{
			$this->pmodel->error_message('Something Want To Wrong');
			redirect('/merchant/publish_offers','refresh');
		}
	}
	
}