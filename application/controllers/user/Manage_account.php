<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_account extends CI_Controller {

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
		$this->load->view('/panel/userpanel/manage_account');
	}
	public function editlink()
	{
		$edit = array('pu_link'=>$this->input->post('ulink'));
		$this->db->where('pu_accno',$this->session->userdata('pu_accno'));
		$u = $this->db->update('p_user',$edit);

		if($u){
			$this->pmodel->noerror_message('Portfolio Link  Updated Successfully');
			redirect('/user/manage_account/','refresh');
		}
		else{

			$this->pmodel->error_message('Something Want To Wrong');
			redirect('/user/manage_account/','refresh');
		}
	}
	public function editpass()
	{
		$password1 = $this->input->post('password');
		$password2 = $this->input->post('cpassword');

		if($password1 == $password2)
		{
			$epass = array('pu_password'=>$password2);
			$this->db->where('pu_accno',$this->session->userdata('pu_accno'));
			$p = $this->db->update('p_user',$epass);

			if($p)
			{
				$this->pmodel->noerror_message('Password Updated Successfully');
				redirect('/user/manage_account/','refresh');
			}
			else
			{
				$this->pmodel->error_message('Something Want To Wrong');
				redirect('/user/manage_account/','refresh');
			}
		}
	}
}