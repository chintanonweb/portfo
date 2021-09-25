<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_themes extends CI_Controller
{

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
		$this->load->view('/panel/adminpanel/User_themes');
	}
	public function uthemeadd()
	{
		$utheme = array(
			'put_name' => $this->input->post('thname'),
			'put_flag' => $this->input->post('flag')
		);

		$utheme['put_image'] = file_get_contents($_FILES['fname']['tmp_name']);

		$u = $this->db->insert('pu_theme', $utheme);
		if ($u) {
			$this->pmodel->noerror_message('Theme Added Successfully');
			redirect('/admin/user_themes/','refresh');
		} else {
			$this->pmodel->error_message('Something Want To Wrong');
			redirect('/admin/user_themes/','refresh');
		}
	}
	public function uthemeupdate()
	{
		$utheme1 = array(
			'put_name' => $this->input->post('thname'));
		if ($_FILES['fname']['tmp_name'] != '') {
			$utheme1['put_image'] = file_get_contents($_FILES['fname']['tmp_name']);
		}
		$this->db->where('put_id', $this->input->post('id'));
		$utm = $this->db->update('pu_theme', $utheme1);

		if ($utm) {
			$this->pmodel->noerror_message('Theme Updated Successfully');
			redirect('/admin/user_themes/','refresh');
		} else {
			$this->pmodel->error_message('Something Want To Wrong');
			redirect('/admin/user_themes/','refresh');
		}
	}
}