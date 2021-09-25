<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Achievement extends CI_Controller {

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
		$this->load->view('/panel/userpanel/portfolio/achievement');
	}
	public function achievementadd()
	{
		$ach = array(
			'pu_accno'=>$this->session->userdata('pu_accno'),
			'pua_title'=>$this->input->post('title'),
			'pua_date'=>$this->input->post('adate'),
			'pua_place'=>$this->input->post('place'),
			'pua_summary'=>$this->input->post('summary'),
			'pua_flag'=>$this->input->post('flag'));
		$a = $this->db->insert('pu_achievement',$ach);
		if($a)
		{
			$this->pmodel->noerror_message('Achievement Added Successfully');
			redirect('/user/portfolio/achievement/','refresh');
		}
		else
		{
			$this->pmodel->error_message('Something Want To Wrong');
			redirect('/user/portfolio/achievement/','refresh');
		}
	}
	public function achievementupdate()
	{
		$achupdate = array('pua_title'=>$this->input->post('title'),
		'pua_date'=>$this->input->post('adate'),
		'pua_place'=>$this->input->post('place'),
		'pua_summary'=>$this->input->post('summary'));
		$this->db->where('pua_id',$this->input->post('id'));
		$ah = $this->db->update('pu_achievement',$achupdate);
		if($ah)
		{
			$this->pmodel->noerror_message('Achievement Updated Successfully');
			redirect('/user/portfolio/achievement/','refresh');
		}
		else
		{
			$this->pmodel->error_message('Something Want To Wrong');
			redirect('/user/portfolio/achievement/','refresh');
		}
	}	
}
