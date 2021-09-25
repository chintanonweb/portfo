<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Language extends CI_Controller {

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
		$this->load->view('/panel/userpanel/portfolio/language');
	}
	public function langadd()
	{
		$lang = array(
			'pu_accno'=>$this->session->userdata('pu_accno'),
			'pul_name'=>$this->input->post('name'),
			'pul_level'=>$this->input->post('level'),
			'pul_flag'=>$this->input->post('flag'));
		$l = $this->db->insert('pu_language',$lang);
		if($l)
		{
			$this->pmodel->noerror_message('Language Added Successfully');
			redirect('/user/portfolio/language/','refresh');
		}
		else
		{
			$this->pmodel->error_message('Something Want To Wrong');
			redirect('/user/portfolio/language/','refresh');
		}
	}
	public function langupdate()
	{
		$lgupdate = array('pul_name'=>$this->input->post('name'),
		'pul_level'=>$this->input->post('level'));
		$this->db->where('pul_id',$this->input->post('id'));
		$lu = $this->db->update('pu_language',$lgupdate);
		if($lu)
		{
			$this->pmodel->noerror_message('Language Updated Successfully');
			redirect('/user/portfolio/language/','refresh');
		}
		else
		{
			$this->pmodel->error_message('Something Want To Wrong');
			redirect('/user/portfolio/language/','refresh');
		}
	}
	
}
