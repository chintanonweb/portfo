<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Socialmedia extends CI_Controller {

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
		$this->load->view('/panel/userpanel/portfolio/socialmedia');
	}
	public function add()
	{
		$soc = array('pu_accno'=>$this->session->userdata('pu_accno'),
					'pusm_icon'=>$this->input->post('icon'),
					'pusm_link'=>$this->input->post('link'),
					'pusm_flag'=>$this->input->post('flag'));
		$s = $this->db->insert('pu_socialmedia',$soc);

		if($s)
		{
			$this->pmodel->noerror_message('Social Media Added Successfully');
			redirect('/user/portfolio/socialmedia/','refresh');
		}
		else
		{
			$this->pmodel->error_message('Something Want To Wrong');
			redirect('/user/portfolio/socialmedia/','refresh');
		}
	}
	public function edit()
	{
		$soc1 = array('pusm_icon'=>$this->input->post('icon'),
		'pusm_link'=>$this->input->post('link'));

		$this->db->where('pusm_id',$this->input->post('id'));
		$s1 = $this->db->update('pu_socialmedia',$soc1);

		if($s1)
		{
			$this->pmodel->noerror_message('Social Media Updated Successfully');
			redirect('/user/portfolio/socialmedia/','refresh');	
		}
		else
		{
			$this->pmodel->error_message('Something Want To Wrong');
			redirect('/user/portfolio/socialmedia/','refresh');
		}
	}
}