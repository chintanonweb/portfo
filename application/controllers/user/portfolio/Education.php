<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Education extends CI_Controller {

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
		$this->load->view('/panel/userpanel/portfolio/education');
	}
	public function educationadd()
	{
		$edu = array(
		'pu_accno'=>$this->session->userdata('pu_accno'),
		'pue_course'=>$this->input->post('course'),
		'pue_university'=>$this->input->post('university'),
		'pue_college'=>$this->input->post('college'),
		'pue_detail'=>$this->input->post('summary'),
		'pue_completion'=>$this->input->post('completion'),
		'pue_flag'=>$this->input->post('flag'));
		$e = $this->db->insert('pu_education',$edu);
		if($e)
		{
			$this->pmodel->noerror_message('Education Added Successfully');
			redirect('/user/portfolio/education/','refresh');
		}
		else
		{
			$this->pmodel->error_message('Something Want To Wrong');
			redirect('/user/portfolio/education/','refresh');
		}
	}
	public function educationupdate()
	{
		$edup = array(
		'pue_course'=>$this->input->post('course'),
		'pue_university'=>$this->input->post('university'),
		'pue_college'=>$this->input->post('college'),
		'pue_detail'=>$this->input->post('summary'),
		'pue_completion'=>$this->input->post('completion'));
		$this->db->where('pue_id',$this->input->post('id'));
		$p = $this->db->update('pu_education',$edup);
		if($p)
		{
			$this->pmodel->noerror_message('Education Updated Successfully');
			redirect('/user/portfolio/education/','refresh');	
		}
		else{
			$this->pmodel->error_message('Something Want To Wrong');
			redirect('/user/portfolio/education/','refresh');
		}
	}
	
}