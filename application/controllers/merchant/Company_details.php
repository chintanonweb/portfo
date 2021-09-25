<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company_details extends CI_Controller {

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
		$this->load->view('/panel/merchantpanel/company_details');
	}
	public function companydetail()
	{
		$email = $this->input->post('email');
		$company = array('pcd_company_name' => $this->input->post('cname'),
						'pcd_desc' => $this->input->post('desc'),
						'pcd_service' => $this->input->post('sname'),
						'pcd_contact_no' => $this->input->post('contact'),
						'pcd_website' => $this->input->post('cwebsite'),
						'pcd_address' => $this->input->post('address'),
						'pcd_city' => $this->input->post('city'),
						'pcd_pincode' => $this->input->post('pincode'),
						'pcd_state' => $this->input->post('state'),
						'pcd_flag' => $this->input->post('flag'),
						'pcd_email'=>$email);
		
		if($_FILES['clogo']['tmp_name'] !== ''){
			$company['pcd_logo'] = file_get_contents($_FILES['clogo']['tmp_name']); 
		}
		$this->db->where('pu_accno', $this->session->userdata('pu_accno'));
		$com = $this->db->update('p_company_detail',$company);

		if($com){
			$this->pmodel->noerror_message('Company Detail Updated Successfully');
            redirect('/merchant/company_details/', 'refresh');
		}
		else{
			$this->pmodel->error_message('Company Detail is not updated');
			redirect('/merchant/company_details/', 'refresh');
		}
	}
}