<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hobbies extends CI_Controller {

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
		$this->load->view('/panel/userpanel/portfolio/hobbies');
	}
	public function add()
	{
		$hobb = array('pu_accno'=>$this->session->userdata('pu_accno'),
					'puh_name'=>$this->input->post('hobbies'),
					'puh_icon'=>$this->input->post('icon'),
					'puh_flag'=>$this->input->post('flag'));
		$h = $this->db->insert('pu_hobbies',$hobb);

		if($h)
		{
			$this->pmodel->noerror_message('Hobbies & Interest Added Successfully');
			redirect('/user/portfolio/hobbies/','refresh');
		}
		else
		{
			$this->pmodel->error_message('Something Want To Wrong');
			redirect('/user/portfolio/hobbies/','refresh');
		}
	}
	public function edit()
	{
		$hobb1 = array('puh_name'=>$this->input->post('hobbies'),
		'puh_icon'=>$this->input->post('icon'));

		$this->db->where('puh_id',$this->input->post('id'));
		$h1 = $this->db->update('pu_hobbies',$hobb1);

		if($h1)
		{
			$this->pmodel->noerror_message('Hobbies & Interest Updated Successfully');
			redirect('/user/portfolio/hobbies/','refresh');	
		}
		else
		{
			$this->pmodel->error_message('Something Want To Wrong');
			redirect('/user/portfolio/hobbies/','refresh');
		}
	}
}