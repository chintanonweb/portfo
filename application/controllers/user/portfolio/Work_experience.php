<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Work_experience extends CI_Controller {

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
		$this->load->view('/panel/userpanel/portfolio/work_experience');
	}
	public function workadd()
	{
		$work = array('pu_accno'=>$this->session->userdata('pu_accno'),
						'puwe_position'=>$this->input->post('position'),
					  	'puwe_company_name'=>$this->input->post('cname'),
					  	'puwe_summary'=>$this->input->post('summary'),
					  	'puwe_startdate'=>$this->input->post('sdate'),
					  	'puwe_enddate'=>$this->input->post('edate'),
					  	'puwe_flag'=>$this->input->post('flag')
	);
	$w = $this->db->insert('pu_work_experience',$work);
	if($w)
	{
		$this->pmodel->noerror_message('Work Experience Added Successfully');
		redirect('/user/portfolio/work_experience/','refresh');
	}
	else
	{
		$this->pmodel->error_message('Something Want To Wrong');
		redirect('/user/portfolio/work_experience/','refresh');
	}
	}
	public function workupdate()
	{
		$wupdate = array('puwe_position'=>$this->input->post('position'),
		'puwe_company_name'=>$this->input->post('cname'),
		'puwe_summary'=>$this->input->post('summary'),
		'puwe_startdate'=>$this->input->post('sdate'),
		'puwe_enddate'=>$this->input->post('edate'));

		$this->db->where('puwe_id',$this->input->post('id'));
		$w = $this->db->update('pu_work_experience',$wupdate);
		if($w)
		{
			$this->pmodel->noerror_message('Work Experience Updated Successfully');
			redirect('/user/portfolio/work_experience/','refresh');
		}
		else
		{
			$this->pmodel->error_message('Something Want To Wrong');
			redirect('/user/portfolio/work_experience/','refresh');
		}
	}
}