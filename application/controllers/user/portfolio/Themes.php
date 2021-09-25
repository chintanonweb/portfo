<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Themes extends CI_Controller
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
		$this->load->view('/panel/userpanel/portfolio/themes');
	}
	public function selecttheme()
	{
		$theme = $this->input->post('theme');
		$accno = $this->session->userdata('pu_accno');
		$query = $this->db->get_where('pu_theme', array('put_name' => $theme))->row();
		$id = $query->put_id;
		$data = array('pu_theme' => $id);
		$query1 = $this->db->where('pu_accno', $accno);
		$query1 = $this->db->update('p_user', $data);
		if ($query1) {
			$this->pmodel->noerror_message('Theme Updated Successfully');
			redirect('/user/portfolio/themes/', 'refresh');
		} else {
			$this->pmodel->error_message('Something Want To Wrong');
			redirect('/user/portfolio/themes/', 'refresh');
		}
	}
}