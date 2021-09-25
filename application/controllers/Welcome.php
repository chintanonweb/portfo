<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
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
		$this->load->view('welcome_message');
	}
	//code for access portfolio using link name
	public function any($i = NULL)
	{
		//$data['username']= $i;
		$link=urldecode($i);
		$query = $this->db->get_where('p_user', array('pu_link' => $link));
		$row = $query->row();
		if ($query->num_rows() > 0) {
			if ($row->pu_role == 'user') {
				$data['accno'] = $row->pu_accno;
				if ($row->pu_theme == '1') {
					$this->load->view('theme1', $data);
				} else if ($row->pu_theme == '2') {
					$this->load->view('theme2', $data);
				} else {
					$this->load->view('error_404notfound');
				}
			}
			else if($row->pu_role == 'merchant'){
				$data['accno'] = $row->pu_accno;
				$this->load->view('companydetail', $data);
			}
			else{
				$this->load->view('error_404notfound');
			}
			}
		 else {
			$this->load->view('error_404notfound');
		}
	}
	//code for access portfolio using link name

}
