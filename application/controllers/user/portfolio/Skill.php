<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skill extends CI_Controller {

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
		$this->load->view('/panel/userpanel/portfolio/skill');
	}
	public function skilladd()
	{
		$skill = array(
			'pu_accno'=>$this->session->userdata('pu_accno'),
			'pus_name'=>$this->input->post('name'),
			'pus_percentage'=>$this->input->post('precentage'),
			'pus_flag'=>$this->input->post('flag')
						
					);
					
		$s = $this->db->insert('pu_skill',$skill);
		
		if($s)
		{
			$this->pmodel->noerror_message('Skill Added Successfully');
			redirect('/user/portfolio/skill/','refresh');
		}
		else
		{
			$this->pmodel->error_message('Something Want To Wrong');
			redirect('/user/portfolio/skill/','refresh');
		}
	}
	public function skillupdate()
	{
		$skillup = array('pus_name'=>$this->input->post('name'),
		'pus_percentage'=>$this->input->post('precentage'));
		$this->db->where('pus_id',$this->input->post('id'));
		$sup = $this->db->update('pu_skill',$skillup);
		if($sup)
		{
			$this->pmodel->noerror_message('Skill Updated Successfully');
			redirect('/user/portfolio/skill/','refresh');	
		}
		else
		{
			$this->pmodel->error_message('Something Want To Wrong');
			redirect('/user/portfolio/skill/','refresh');
		}
	}
	
}