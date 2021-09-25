<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Package extends CI_Controller {

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
		$this->load->view('/panel/adminpanel/package');
	}
	public function addpackage()
	{
		$pacadd = array('pp_name'=>$this->input->post('name'),
						'pp_desc'=>$this->input->post('desc'),
						'pp_price'=>$this->input->post('price'),
						'pp_month'=>$this->input->post('month'),
						'pp_flag'=>$this->input->post('flag'));
		
		$ad = $this->db->insert('p_package',$pacadd);

		if($ad)
		{
			$this->pmodel->noerror_message('Package Added Successfully');
			redirect('/admin/package/','refresh');
		}
		else{
			$this->pmodel->error_message('Something Want To Wrong');
			redirect('/admin/package/','refresh');
		}
	}
	public function editpackage()
	{
		$pacedit = array('pp_name'=>$this->input->post('name'),
		'pp_desc'=>$this->input->post('desc'),
		'pp_price'=>$this->input->post('price'),
		'pp_month'=>$this->input->post('month'));
		
		$this->db->where('pp_id',$this->input->post('id'));
		$ed = $this->db->update('p_package',$pacedit);

		if($ed)
		{
			$this->pmodel->noerror_message('Package Updated Successfully');
			redirect('/admin/package/','refresh');
		}
		else{
			$this->pmodel->error_message('Something Want To Wrong');
			redirect('/admin/package/','refresh');
		}
	}
}