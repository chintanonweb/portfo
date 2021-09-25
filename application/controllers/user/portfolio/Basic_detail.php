<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Basic_detail extends CI_Controller
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
		$this->load->view('/panel/userpanel/portfolio/basic_detail');
	}
	public function basicdetail()
	{
		$email = $this->input->post('email');
		$basic = array(
			'pud_name' => $this->input->post('name'),
			'pud_profession' => $this->input->post('profession'),
			'pud_contact_no' => $this->input->post('mobile'),
			'pud_gender' => $this->input->post('optradio'),
			'pud_dob' => $this->input->post('date'),
			'pud_address' => $this->input->post('address'),
			'pud_city' => $this->input->post('city'),
			'pud_pincode' => $this->input->post('pincode'),
			'pud_state' => $this->input->post('state'),
			'pud_detail' => $this->input->post('about'),
			'pud_website' => $this->input->post('website'),
			'pud_email' => $email
		);
		if ($_FILES['avtar']['tmp_name'] !== '') {
			$basic['pud_image'] = file_get_contents($_FILES['avtar']['tmp_name']);
		}
		$this->db->where('pu_accno', $this->session->userdata('pu_accno'));
		$value1 = $this->db->update('p_user_detail', $basic);

		$e = array('pu_email'=>$email);
		$this->db->where('pu_accno',$this->session->userdata('pu_accno'));
		$ed = $this->db->update('p_user',$e);
		
		if ($value1 && $ed) {
			$this->pmodel->noerror_message('Basic Detail Updated Successfully');
			redirect('/user/portfolio/basic_detail/', 'refresh');
		} else {
			$this->pmodel->error_message('Something Want To Wrong');
			redirect('/user/portfolio/basic_detail/', 'refresh');
		}
	}
}